<?php

namespace Modules\Account\Http\Controllers;

use App\Http\Controllers\BsdateController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\Group;
use Modules\Account\Entities\ItemOfJournal;
use Modules\Account\Entities\Journal;
use Modules\Account\Entities\Ledger;
use Modules\Account\Entities\ListOfLedger;

class JournalController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:journal-list');
        $this->middleware('permission:journal-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:journal-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:journal-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $bsdate = new BsdateController();
        $from = $request->from;
        $to = $request->to;

        if ($from == "" && $to == "") {
            $from = date('Y-m-d');
            $to = date('Y-m-d');
        } else {
            $from = $bsdate->nep_to_eng($from);
            $to = $bsdate->nep_to_eng($to);
        }
        $journals = Journal::select('id', 'date', 'total_debit', 'total_credit', 'reconciliation', 'fiscal_year_id')->whereBetween('date', [$from, $to])->where('status', 1)->get();


        return view('account::journal.index', compact('journals', 'from', 'to'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $groups = Group::select('id', 'name')->where('level', '!=', '0')->where('status', 1)->get();
        return view('account::journal.create', compact('groups'));
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
        $bsdate = new BsdateController();

        $this->validate($request, [
            'date' => 'required|string|max:10',
            'total_debit' => 'required|numeric',
            'total_credit' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $journal = new Journal();
            $journal->fiscal_year_id = get_fiscal_year();
            $journal->date = $bsdate->nep_to_eng($request->input('date'));
            $journal->narration = $request->input('narration');
            $journal->total_debit = $request->input('total_debit');
            $journal->total_credit = $request->input('total_credit');
            $journal->save();

            //Information of Journal

            //Store Journal Item
            $counter = 0;
            foreach ($request->input("ledger_list") as $ledger_id) {

                if ($request->credit[$counter] == "0" && $request->debit[$counter] == "0") {

                    continue;
                }

                $journalItem = new ItemOfJournal();
                $journalItem->journal_id = $journal->id;
                $journalItem->ledger_id = $ledger_id;
                $journalItem->credit = $request->credit[$counter];
                $journalItem->debit = $request->debit[$counter];
                $journalItem->cr_dr = $request->cr_dr[$counter];
                $journalItem->save();

                $counter = $counter + 1;
            }

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
        Session::flash('message', "New Journal has been Generated Successfully at " . $request->date);

        return redirect('journals');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('account::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {
            $journal = Journal::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('journals')->withError("Journal with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('journals')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        if ($journal->reconciliation == 1) {
            Session::flash('type', "danger");
            Session::flash('message', "Reconciliation of Journal no. " . $id . " has been done. You're not allowed to edit this.");
            return redirect()->back();
        }
        $lists = ListOfLedger::select('id', 'name', 'under')->where('status', 1)->get();
        $journalitems = ItemOfJournal::select('id', 'journal_id', 'ledger_id', 'debit', 'credit', 'cr_dr')->where('status', 1)->where('journal_id', $id)->get();

//        return $journal;

        return view('account::journal.edit', compact('journal', 'journalitems', 'lists'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

        @ini_set('max_execution_time', 0);
        @set_time_limit(0);
        $bsdate = new BsdateController();
        $this->validate($request, [
            'date' => 'required|string|max:10',
            'total_debit' => 'required|numeric',
            'total_credit' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $journal = Journal::where('id', $id)->first();

            if ($journal->reconciliation == 1) {
                Session::flash('type', "danger");
                Session::flash('message', "Reconciliation of Journal no. " . $journal->id . " has been done. You're not allowed to edit this.");
                return redirect('journals');
            }

            $journal->fiscal_year_id = get_fiscal_year();
            $journal->date = $bsdate->nep_to_eng($request->input('date'));
            $journal->narration = $request->input('narration');
            $journal->total_debit = $request->input('total_debit');
            $journal->total_credit = $request->input('total_credit');
            $journal->save();
            //Information of Journal

            $invoiceItem = ItemOfJournal::where("journal_id", $id);
            $invoiceItem->delete();

            //Store Journal Item
            $counter = 0;
            foreach ($request->input("ledger_list") as $ledger_id) {

                if ($request->credit[$counter] == "0" && $request->debit[$counter] == "0") {
                    dd($ledger_id);
                    continue;
                }
                $journalItem = new ItemOfJournal();
                $journalItem->journal_id = $journal->id;
                $journalItem->ledger_id = $ledger_id;
                $journalItem->credit = $request->credit[$counter];
                $journalItem->debit = $request->debit[$counter];
                $journalItem->cr_dr = $request->cr_dr[$counter];
                $journalItem->save();

                $counter = $counter + 1;
            }

            $ledger = Ledger::where("voucher_no", $id);
            $ledger->delete();

            $JournalForLedger = ItemOfJournal::where('journal_id', $journal->id)->get();
            $credit = ItemOfJournal::where('cr_dr', 'cr')->where('journal_id', $journal->id)->first();
            $debit = ItemOfJournal::where('cr_dr', 'dr')->where('journal_id', $journal->id)->first();

            foreach ($JournalForLedger as $data) {
                if ($data->cr_dr == "dr") {
                    $ledger = new Ledger();
                    $ledger->voucher_no = $journal->id;
                    $ledger->ledger_id = $data->ledger_id;
                    $ledger->date = $journal->date;
                    $ledger->description = $credit->ledger_id;
                    $ledger->debit = $data->debit;
                    $ledger->credit = $data->credit;
                    $ledger->save();
                } else {
                    $ledger = new Ledger();
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
        Session::flash('type', "info");
        Session::flash('message', "Journal no. " . $journal->id . " has been Updated Successfully at " . date("Y-m-d"));

        return redirect('journals');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $journal = Journal::findOrFail($id);

            $journal->status = 0;
            $journal->save();
        } catch (ModelNotFoundException $e) {

            return redirect('journals')->withError("Journal with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('journals')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $itemjournal = ItemOfJournal::where('journal_id', $journal->id)->get();
        foreach ($itemjournal as $item) {
            $item->status = 0;
            $item->save();
        }

        $ledgers = Ledger::where('voucher_no', $journal->id)->get();
        foreach ($ledgers as $ledger) {
            $ledger->status = 0;
            $ledger->save();
        }
        Session::flash('type', "danger");
        Session::flash('message', "Journal has been Deleted Successfully");
        return redirect()->route('journals.index');
    }

    public function reconciliation(Request $request)
    {
        $journal_id = $request->journal_id;
        try {
            $journal = Journal::findOrFail($journal_id);
        } catch (ModelNotFoundException $e) {

            return redirect('journals')->withError("Journal with ID '" . $journal_id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('journals')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        if ($journal->reconciliation == 1) {
            $journal->reconciliation = 0;
            $journal->save();

            Session::flash('type', "danger");
            Session::flash('message', "Reconciliation of Journal no. " . $journal_id . " has been turned Off");
        } else {
            $journal->reconciliation = 1;
            $journal->save();

            Session::flash('type', "success");
            Session::flash('message', "Reconciliation of Journal no. " . $journal_id . " has been turned On");
        }
        return "done";
    }

    public function reconciliation_unreconciliation(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $type = $request->type;

        $journals = Journal::select('id', 'date', 'total_debit', 'total_credit', 'reconciliation', 'fiscal_year_id')->whereBetween('date', [$from, $to])->where('status', 1)->get();

        foreach ($journals as $j) {
            $journal = Journal::find($j->id);
            $journal->reconciliation = $type;
            $journal->save();

        }

        if ($type == 0) {
            Session::flash('type', "danger");
            Session::flash('message', "Un-Reconciliation of all Journal has been done");
        } else {
            Session::flash('type', "success");
            Session::flash('message', "Reconciliation of all Journal has been done");
        }

        return "hello";
    }

    public function view_journal($id)
    {
        try {
            $journal = Journal::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('journals')->withError("Journal with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('journals')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        if ($journal->reconciliation == 1) {
            Session::flash('type', "danger");
            Session::flash('message', "Reconciliation of Journal no. " . $id . " has been done. You're not allowed to edit this.");
            return redirect()->back();
        }
        $lists = ListOfLedger::select('id', 'name', 'under')->where('status', 1)->get();
        $journalitems = ItemOfJournal::select('id', 'journal_id', 'ledger_id', 'debit', 'credit', 'cr_dr')->where('status', 1)->where('journal_id', $id)->get();


        return view('account::journal.view_journal', compact('journal', 'journalitems', 'lists'));

    }
}
