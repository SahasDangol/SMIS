<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\Group;
use Modules\Account\Entities\Grouplist;
use Modules\Account\Entities\ListOfLedger;

class ListOfLedgerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $lists = ListOfLedger::select('id', 'name', 'alias', 'under', 'remarks')->where('status', 1)->get();

        $groups = Group::select('id', 'name', 'level', 'parent_id')->where('level', '!=', '0')->where('status', 1)->get();

        return view('account::ledger.list_of_ledger', compact('lists', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('account::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191|unique:list_of_ledgers,name',

            'under' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            if ($request->alias != null)

                $this->validate($request, [
                    'alias' => 'unique:list_of_ledgers,alias',
                ]);

            $listofledger = ListOfLedger::create($input);

            $listofledger->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Ledger Added Successfully");
        return redirect()->route('ledgerlist.index');

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
            $ledger = ListOfLedger::orderBy('id', 'DESC')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('ledgerlist')->withError("List of Ledger with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('ledgerlist')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $lists = ListOfLedger::select('name', 'alias', 'under', 'remarks')->where('status', 1)->get();
        $groups = Group::select('id', 'name', 'level', 'parent_id')->where('level', '!=', '0')->where('status', 1)->get();


        return view('account::ledger.editlist', compact('ledger', 'lists', 'groups'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try{
        $ledger = ListOfLedger::findOrFail($id);

            } catch (ModelNotFoundException $e) {

                return redirect('ledgerlist')->withError("List of Ledger with ID '" . $id . "' not found.");
            } catch (\Exception $ex) {
                return redirect('ledgerlist')->withError("Something went wrong!! Please Contact to Service Provider");
            }
        $this->validate($request, [
            'name' => 'required|string|max:191',

            'under' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $ledger->name = $request->name;
            if ($request->alias != null)

                $this->validate($request, [
                    'alias' => 'unique:list_of_ledgers,alias',
                ]);
            $ledger->alias = $request->alias;
            $ledger->under = $request->under;
            $ledger->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Ledger has been Updated Successfully");
        return redirect()->route('ledgerlist.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $ledger = ListOfLedger::findOrFail($id);

        $ledger->status = 0;
        $ledger->save();
        } catch (ModelNotFoundException $e) {

            return redirect('ledgerlist')->withError("List of Ledger with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('ledgerlist')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Ledger has been Deleted Successfully");
        return redirect()->route('ledgerlist.index');
    }
}
