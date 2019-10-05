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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\ItemOfJournal;
use Modules\Account\Entities\Journal;
use Modules\Account\Entities\Ledger;
use Modules\Classroom\Entities\Classroom;
use Modules\Student\Entities\Student;
use Modules\StudentFee\Entities\CopyOfInvoice;
use Modules\StudentFee\Entities\Invoice;
use Modules\StudentFee\Entities\PaymentHistory;
use Modules\StudentFee\Entities\StudentPayment;

class StudentPaymentController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:student-payment-list');
        $this->middleware('permission:student-payment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-payment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:student-payment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $history = StudentPayment::where('status', 1)->get();
        return view('studentfee::history.index', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('studentfee::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'invoice_id' => 'required|string|max:10',
            'date' => 'required|string|max:10',
            'amount' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {

            $studentpayment = new StudentPayment();
            $studentpayment->invoice_id = $request->input('invoice_id');
            $studentpayment->date = $request->input('date');
            $studentpayment->amount = $request->input('amount');
            $studentpayment->remarks = $request->input('remarks');

            $studentpayment->save();


            //Update Invoice
            $invoice = Invoice::find($studentpayment->invoice_id);
            if (($invoice->paid_amount + $studentpayment->amount) >= $invoice->total) {
                $invoice->paid = "1";
            }
            $invoice->paid_amount = $invoice->paid_amount + $studentpayment->amount;
            $invoice->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Student Fees had been Collected Successfully");

        return redirect('invoices');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        try {
            $student = Student::findOrFail($id);
            $last_payment = $student->payment_history->last()->total;
            $amount = $last_payment;
            $invoices = $student->invoices;
            $paid_invoices = collect();
            foreach ($invoices as $invoice) {
                if ($invoice->paid) {
                    $last_payment -= $invoice->paid;
                    $paid_invoices->push($invoice);
                }
                if ($last_payment < 0) {
                    break;
                }
            }
            $invoices = $paid_invoices->sortByDESC('created_at');
        } catch (ModelNotFoundException $e) {

            return redirect('student_payments')->withError("Student  with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return redirect('student_payments')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('studentfee::receipt.show', compact('invoices', 'amount', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('studentfee::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function specific_student(Request $request)
    {
        try {
            $student_id = $request['student_id'];
            $roll_no = Student::findOrFail($student_id)->roll_no;
        } catch (ModelNotFoundException $e) {
            return redirect('payment/student/roll')->withError("Student with id '" . $student_id . "' is not found.");
        }

        if ($student_id) {
            $invoices = Invoice::select('invoices.*', 'invoices.id as invoice_id', 'invoices.status as paid_status', 'students.first_name', 'students.middle_name', 'students.last_name')
                ->join('students', 'invoices.student_id', '=', 'students.id')
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->where('student_sessions.session_id', get_academic_year())
                ->where('invoices.status', 0)
                ->where('invoices.student_id', $student_id)
                ->orderBy('invoices.id', 'DESC')
                ->get();

            if ($invoices) {
                return view('studentfee::invoice.specific_student', compact('invoices', 'student_id', 'roll_no'));
            } else {
                return "No Payment is Remaining";
            }
        } else {
            return "No Roll_no Exist";
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function specific_student_payment(Request $request, $id)
    {

        $this->validate($request, [
            'date' => 'required|string|max:10',
            'due' => 'required|numeric',
            'received' => 'required|numeric',
        ]);
        try {
            $student = Student::select('id', 'classroom_id', 'section_id', 'first_name', 'middle_name', 'last_name')
                ->with('invoices', 'classrooms:id,class_name', 'sections:id,name')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('payment/student')->withError("Student with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('payment/student')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $class = $student->classrooms;
        $section = $student->sections->name;
        $student_name = $student->first_name . " " . $student->middle_name . " " . $student->last_name;
        $invoice = collect();
        $date = $request->date;
        $remaining = $request->due;
        $paid_amount = $request->received;
        $remarks = $request->remarks;
        $original_paid_amount = $paid_amount;
        if (floatval($paid_amount) > floatval($remaining)) {

            Session::flash('type', "danger");
            Session::flash('message', "You Enter a Fees Greater than Remaining Fees. Please check.");
            return back();
        }
        DB::beginTransaction();
        try {
            $invoices = $student->invoices->where('status', 0);
            $due = 0.00;
            foreach ($invoices as $invoice) {
                if ($paid_amount >= $invoice->balance) {
                    $studentpayment = new StudentPayment();
                    $studentpayment->invoice_id = $invoice->id;
                    $studentpayment->date = $date;
                    $studentpayment->amount = $invoice->balance;
                    $studentpayment->remarks = $remarks;
                    $studentpayment->save();

                    $invoice->previous_dues = 0.00;
                    $paid_amount -= $invoice->balance;
                    $invoice->paid += $invoice->balance;
                    $invoice->balance = 0.00;
                    $invoice->status = 1;
                    $invoice->save();
                } elseif ($paid_amount > 0) {
                    $studentpayment = new StudentPayment();
                    $studentpayment->invoice_id = $invoice->id;
                    $studentpayment->date = $request->input('date');
                    $studentpayment->amount = $paid_amount;
                    $studentpayment->remarks = $request->input('remarks');
                    $studentpayment->save();

                    $invoice->previous_dues = 0.00;
                    $invoice->paid = $invoice->paid + $paid_amount;
                    $invoice->balance -= $paid_amount;
                    $invoice->save();
                    $paid_amount = 0.00;
                    $due = $invoice->balance;
                } else {
                    $invoice->previous_dues = $due;
                    $invoice->save();
                    $due += $invoice->balance;
                }
            }


            PaymentHistory::create([
                'student_id' => $id,
                'total' => $request->received
            ]);

            $journal = new Journal();
            $journal->fiscal_year_id = get_fiscal_year();
            $journal->date = $request->input('date');
            $journal->narration = ucfirst($student_name) . "  of Class " . ucfirst($class->class_name) . ",Section " . $section . " had paid Fees of amount " . $original_paid_amount;
            $journal->total_debit = $original_paid_amount;
            $journal->total_credit = $original_paid_amount;
            $journal->save();

            $journalItem = new ItemOfJournal();
            $journalItem->journal_id = $journal->id;
            $journalItem->ledger_id = 1;
            $journalItem->credit = 0;
            $journalItem->debit = $original_paid_amount;
            $journalItem->cr_dr = "dr";
            $journalItem->save();

            $journalItem = new ItemOfJournal();
            $journalItem->journal_id = $journal->id;
            $journalItem->ledger_id = 2;
            $journalItem->credit = $original_paid_amount;
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
            DB::rollBack();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Student Fees had been Collected Successfully");

        return redirect(url('student_payments/' . $id));
    }

    public function search_roll()
    {
        $classrooms = Classroom::all();
        return view('studentfee::invoice.specific_student_search', compact('classrooms'));
    }
}
