<?php

namespace Modules\StudentFee\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\ItemOfJournal;
use Modules\Account\Entities\Journal;
use Modules\Account\Entities\Ledger;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\StudentSession;
use Modules\StudentFee\Entities\CopyOfInvoice;
use Modules\StudentFee\Entities\FeeType;
use Modules\StudentFee\Entities\FeeTypeStatus;
use Modules\StudentFee\Entities\Invoice;
use Modules\StudentFee\Entities\InvoiceItem;

class InvoiceController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:invoice-list');
        $this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $invoices = Invoice::with('students.classrooms')->paginate(20);

        return view('studentfee::invoice.index', compact('invoices'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $classrooms = Classroom::all()->where('status', 1);
        $fee_types = FeeType::where('session_id',get_academic_year())->whereHas('fee_type_status', function ($query) {
            $query->where('status', '0')->where('session_id',get_academic_year());
        })->get();
        return view('studentfee::invoice.create', compact('classrooms', 'fee_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);

        $this->validate($request, [
        'student_id' => 'required|string|max:10',
        'classroom_id' => 'required|string|max:10',
        'fee_type_id' => 'required',
    ]);

        $total_fee_amount = 0;

        //detail from invoice
        $session_id = get_academic_year();
        $request['session_id'] = $session_id;
        $print_invoices = collect([]);

        if ($request->student_id == 'all') {
            DB::beginTransaction();
            try {
                $classroom_id = $request->classroom_id;
                // students of selected classroom in Current Session
                $students = Student::whereHas('student_sessions', function ($query) use ($classroom_id, $session_id) {
                    $query->where('classroom_id', $classroom_id)
                        ->where('session_id', $session_id);
                    })
                ->get();

                //Iterating students to generate Invoices
                foreach ($students as $student) {
                    $fee_types = FeeType::find($request->fee_type_id);
                    $invoices = $student->invoices->load('invoice_items');

                    //if this student already has some fee types previously invoiced remove those fee types collection
                    foreach ($invoices as $invoice) {
                        foreach ($invoice->invoice_items as $invoice_item) {
                            foreach ($fee_types as $fee_type) {
                                if ($fee_type->id == $invoice_item->fee_type_id) {
                                    $fee_types = $fee_types->except($fee_type->id);
                                }
                            }
                        }
                    }

                    if (count($fee_types)) {
                        $total_fee = 0;
                        $previous_dues = 0;
                        $scholarship_amount=0;
                        $transport_fee = 0;
                        /*
                         * check if this student has previous dues
                         */
                        $previous_invoice = Invoice::where('student_id', $student->id)->where('status', '0')->orderBy('created_at', 'desc')->first();
                        if ($previous_invoice) {
                            $previous_dues = $previous_invoice->balance + $previous_invoice->previous_dues;
                        }

                        foreach ($fee_types as $fee_type) {
                            /*
                             * check if the fee type is monthly fee
                             * if yes check if student has route selected some route
                             * if yes then get the route price add it to total fee and create an ad hoc invoice item for it
                             */
                            if (strpos(strtolower($fee_type->fee_title), 'monthly fee') !== false) {
                                if($student->route)
                                {
                                    $transport_fee=$student->route->route_fare;
                                }
                            }
                            $total_fee+=$transport_fee + $fee_type->amount;
                            /*
                             * check scholarship on this fee type if this student has one
                             */

                            $scholarship_percentage = $student->scholarships->where('fee_type_id',$fee_type->id)->first()->percentage ?? null;
                            $scholarship_amount +=$fee_type->amount/100*$scholarship_percentage;
                        }
                        $balance = $total_fee - $scholarship_amount;
                        $total_fee_amount += $balance;

                        /*
                         * saving invoice information
                         */
                        $invoice = new Invoice();
                        $invoice->student_id = $student->id;
                        $invoice->session_id = $session_id;
                        $invoice->date = date('Y-m-d');
                        $invoice->description = $request->description;
                        $invoice->total = $total_fee;
                        $invoice->discount = $scholarship_amount;
                        $invoice->balance = $balance;
                        $invoice->previous_dues = $previous_dues;
                        $invoice->static_previous_dues = $previous_dues;
                        $invoice->previous_invoice_id = $previous_invoice->id ?? null;
                        $invoice->save();

                        /*
                         * adding created invoice to print queue
                         */
                        $print_invoices->push($invoice);

                        //saving information in invoice items
                        foreach ($fee_types as $fee_type) {
                            $invoice_item = new InvoiceItem();
                            $invoice_item->invoice_id = $invoice->id;
                            $invoice_item->fee_type_id = $fee_type->id;
                            $invoice_item->total = $fee_type->amount;
                            $invoice_item->title = $fee_type->fee_title;
                            $invoice_item->save();
                            if (strpos(strtolower($fee_type->fee_title), 'monthly fee') !== false) {
                                if($student->route)
                                {
                                    $invoice_item = new InvoiceItem();
                                    $invoice_item->invoice_id = $invoice->id;
                                    $invoice_item->total = $student->route->route_fare;
                                    $invoice_item->title = "Transport Fee";
                                    $invoice_item->save();
                                }
                            }
                        }
                        //saving information in invoice items
                    }
                }

                foreach ($fee_types as $fee_type) {
                    $fee_type_status = FeeTypeStatus::where('fee_type_id', $fee_type->id)->where('session_id', $session_id)->first();
                    $fee_type_status->status = 1;
                    $fee_type_status->save();
                }
                $journal = new Journal();
                $journal->fiscal_year_id = get_fiscal_year();
                $journal->date = date('Y-m-d');
                $journal->narration = "Invoices of Class" . $request->classroom_id . " has been Generated ";
                $journal->total_debit = $total_fee_amount;
                $journal->total_credit = $total_fee_amount;
                $journal->save();

                $journalItem = new ItemOfJournal();
                $journalItem->journal_id = $journal->id;
                $journalItem->ledger_id = 2;
                $journalItem->credit = 0;
                $journalItem->debit = $total_fee_amount;
                $journalItem->cr_dr = "dr";
                $journalItem->save();

                $journalItem = new ItemOfJournal();
                $journalItem->journal_id = $journal->id;
                $journalItem->ledger_id = 3;
                $journalItem->credit = $total_fee_amount;
                $journalItem->debit = 0;
                $journalItem->cr_dr = "cr";
                $journalItem->save();

                $JournalForLedger = ItemOfJournal::where('journal_id', $journal->id)->get();
                $credit = ItemOfJournal::where('cr_dr', 'cr')->where('journal_id', $journal->id)->first();
                $debit = ItemOfJournal::where('cr_dr', 'dr')->where('journal_id', $journal->id)->first();

                foreach ($JournalForLedger as $data) {
                    $ledger = new Ledger();
                    if ($data->cr_dr == "dr") {
                        $ledger->voucher_no = $journal->id;
                        $ledger->ledger_id = $data->ledger_id;
                        $ledger->date = $journal->date;
                        $ledger->description = $credit->ledger_id;
                        $ledger->debit = $data->debit;
                        $ledger->credit = $data->credit;
                        $ledger->save();
                    } else {
                        $ledger->voucher_no = $journal->id;
                        $ledger->ledger_id = $data->ledger_id;
                        $ledger->date = $journal->date;
                        $ledger->description = $debit->ledger_id;
                        $ledger->debit = $data->debit;
                        $ledger->credit = $data->credit;
                        $ledger->save();
                    }
                }
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withError($e->getMessage())->withInput();
            }
            DB::commit();
            Session::flash('type', "success");
            Session::flash('message', "Bulk Invoices had been Added Successfully");

            return view('studentfee::invoice.multiple', compact('print_invoices'));
        }
        /***********
         * if individual student is selected
         */
        else {
            DB::beginTransaction();
            try {
                $previous_dues = 0;
                $total_fee = 0;
                $scholarship_amount = 0;
                $transport_fee = 0;
                $fee_types = FeeType::find($request->fee_type_id);

                /*  $scholarship = 0;
                  $yearly_scholarship=0;
                  $monthly_scholarship=0;
                  $quarterly_scholarship=0;
                  if ($student->percentage != "") {
                      $scholarship = floatval($student->percentage) / 100;
                      $yearly_scholarship = floatval($student->percentage) / 100;
                      $monthly_scholarship = floatval($student->percentage) / 100;
                      $quarterly_scholarship = floatval($student->percentage) / 100;
                  }*/
                $student = Student::with('invoices.invoice_items')->find($request->student_id);

                foreach ($student->invoices as $invoice) {
                    foreach ($invoice->invoice_items as $invoice_item) {
                        foreach ($fee_types as $fee_type) {
                            if ($fee_type->id == $invoice_item->fee_type_id) {
                                $fee_types = $fee_types->except($fee_type->id);
                            }
                        }
                    }
                }

                if (count($fee_types)) {

                    $previous_invoice = Invoice::where('student_id', $student->id)->where('status', '0')->orderBy('created_at', 'desc')->first();
                    if ($previous_invoice) {
                        $previous_dues = $previous_invoice->balance + $previous_invoice->previous_dues;
                    }
                    /*$yearly_total_fee = 0;
                    $monthly_total_fee = 0;
                    $quarterly_total_fee = 0;*/


                    foreach ($fee_types as $fee_type) {

                        /*
                         * check if the fee type is monthly fee
                         * if yes check if student has route id
                         * if yes then get the route price add it to total fee and create an ad hoc invoice item for it
                         */
                        if (strpos(strtolower($fee_type->fee_title), 'monthly fee') !== false) {
                            if ($student->route) {
                                $transport_fee = $student->route->route_fare;
                            }
                        }
                        $scholarship_percentage=$student->scholarships->where('fee_type_id',$fee_type->id)->first()->percentage ?? null;
                        $scholarship_amount +=$fee_type->amount/100*$scholarship_percentage;
                        $total_fee += $transport_fee+$fee_type->amount;
                        /*if($fee_type->fee_type=="yearly")
                        {
                            $yearly_total_fee += $fee_type->amount;
                        }
                        elseif($fee_type->fee_type=="monthly")
                        {
                            $monthly_total_fee += $fee_type->amount;
                        }
                        elseif($fee_type->fee_type=="quarterly")
                        {
                            $quarterly_total_fee += $fee_type->amount;
                        }*/
                    }

                    /*
                     * Work for scholarship
                     */
                    $balance = $total_fee - $scholarship_amount;

                    $total_fee_amount += $balance;

                    $invoice = new Invoice();
                    $invoice->student_id = $student->id;
                    $invoice->session_id = $session_id;
                    $invoice->date = date('Y-m-d');
                    $invoice->description = $request->description;
                    $invoice->total = $total_fee;
                    $invoice->discount = $scholarship_amount;
                    $invoice->balance = $balance;
                    $invoice->previous_dues = $previous_dues;
                    $invoice->static_previous_dues = $previous_dues;
                    $invoice->previous_invoice_id = $previous_invoice->id ?? null;
                    $invoice->save();
                    $print_invoices->push($invoice);
//                $invoice_id = $invoice->id;

                    foreach ($fee_types as $fee_type) {
                        $invoice_item = new InvoiceItem();
                        $invoice_item->invoice_id = $invoice->id;
                        $invoice_item->fee_type_id = $fee_type->id;
                        $invoice_item->total = $fee_type->amount;
                        $invoice_item->title = $fee_type->fee_title;
                        $invoice_item->save();
                        if (strpos(strtolower($fee_type->fee_title), 'monthly fee') !== false) {
                            if ($student->route) {
                                $invoice_item = new InvoiceItem();
                                $invoice_item->invoice_id = $invoice->id;
                                $invoice_item->total = $student->route->route_fare;
                                $invoice_item->title = "Transport Fee";
                                $invoice_item->save();
                            }
                        }
                    }


                    /* if($student->scholarship_in=="yearly")
                     {
                         $scholarship_amount = $scholarship_amount+($yearly_total_fee * $yearly_scholarship);
                     }
                     elseif($student->scholarship_in=="monthly")
                     {
                         $scholarship_amount = $scholarship_amount+($monthly_total_fee * $monthly_scholarship);
                     }
                     elseif($student->scholarship_in=="quarterly")
                     {
                         $scholarship_amount = $scholarship_amount+($quarterly_total_fee * $quarterly_scholarship);
                     }
                     else
                     {
                         $scholarship_amount = $scholarship_amount+($total_fee * $scholarship);
                     }*/

                    $journal = new Journal();
                    $journal->fiscal_year_id = get_fiscal_year();
                    $journal->date = date('Y-m-d');
                    $journal->narration = "Invoices of Class" . $request->classroom_id . " has been Generated ";
                    $journal->total_debit = $total_fee_amount;
                    $journal->total_credit = $total_fee_amount;
                    $journal->save();

                    $journalItem = new ItemOfJournal();
                    $journalItem->journal_id = $journal->id;
                    $journalItem->ledger_id = 2;
                    $journalItem->credit = 0;
                    $journalItem->debit = $total_fee_amount;
                    $journalItem->cr_dr = "dr";
                    $journalItem->save();

                    $journalItem = new ItemOfJournal();
                    $journalItem->journal_id = $journal->id;
                    $journalItem->ledger_id = 3;
                    $journalItem->credit = $total_fee_amount;
                    $journalItem->debit = 0;
                    $journalItem->cr_dr = "cr";
                    $journalItem->save();

                    $JournalForLedger = ItemOfJournal::where('journal_id', $journal->id)->get();
                    $credit = ItemOfJournal::where('cr_dr', 'cr')->where('journal_id', $journal->id)->first();
                    $debit = ItemOfJournal::where('cr_dr', 'dr')->where('journal_id', $journal->id)->first();


                    foreach ($JournalForLedger as $data) {
                        $ledger = new Ledger();
                        if ($data->cr_dr == "dr") {
                            $ledger->voucher_no = $journal->id;
                            $ledger->ledger_id = $data->ledger_id;
                            $ledger->date = $journal->date;
                            $ledger->description = $credit->ledger_id;
                            $ledger->debit = $data->debit;
                            $ledger->credit = $data->credit;
                            $ledger->save();
                        } else {
                            $ledger->voucher_no = $journal->id;
                            $ledger->ledger_id = $data->ledger_id;
                            $ledger->date = $journal->date;
                            $ledger->description = $debit->ledger_id;
                            $ledger->debit = $data->debit;
                            $ledger->credit = $data->credit;
                            $ledger->save();
                        }

                    }
                }

            }
            catch (\Exception $e) {
                DB::rollback();
                return back()->withError($e->getMessage())->withInput();
            }
            DB::commit();
            if (count($print_invoices)){
                Session::flash('type', "success");
                Session::flash('message', "New Invoices had been Generated Successfully");
                return view('studentfee::invoice.multiple', compact('print_invoices'));
            }
            else{
                Session::flash('type', "success");
                Session::flash('message', "Selected Invoices has already been Generated for ".$student->first_name." ".$student->last_name);
                return back();
            }
            
        }

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        try{
        $invoice = Invoice::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('invoices')->withError("Invoice with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('invoices')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('studentfee::invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $invoice = Invoice::findOrFail($id);
        $invoice->status = 0;
        $invoice->save();
        } catch (ModelNotFoundException $e) {

            return redirect('invoices')->withError("Invoice with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('invoices')->withError("Something went wrong!! Please Contact to Service Provider");
        }
try{
        $invoiceItem = InvoiceItem::findOrFail($id);
        $invoiceItem->status = 0;
        $invoiceItem->save();
} catch (ModelNotFoundException $e) {

    return redirect('invoices')->withError("Invoice Item with ID '" . $id . "' not found.");
} catch (\Exception $ex) {
    return redirect('invoices')->withError("Something went wrong!! Please Contact to Service Provider");
}

//        $invoice = Invoice::find($id);
//        $invoice->delete();
//
//        $invoiceItem = InvoiceItem::where("invoice_id",$id);
//        $invoiceItem->delete();


        Session::flash('type', "danger");
        Session::flash('message', "Invoice has been Deleted Successfully");

        return redirect('/invoices');

    }

    public function set_id(Request $request)
    {
        $id = $request->type_id;

        Session::put('Type_Id', $id);

        return Session::get('Type_Id');
    }
}
