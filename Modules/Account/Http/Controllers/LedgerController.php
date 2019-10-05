<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\Group;
use Modules\Account\Entities\Ledger;
use Modules\Account\Entities\ListOfLedger;


class LedgerController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:ledger-list');
        $this->middleware('permission:ledger-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ledger-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ledger-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
//        $today=$bsdate->eng_to_date(date('Y-m-d'));

        $from = $request->from;
        $to = $request->to;

        if($from=="" && $to=="")
        {
            $from=get_nepali_date(date('Y-m-d'));
            $date=explode('-',$from);
            $from=$date[0]."-01-01";
            $from=get_english_date($from);
            $to=date('Y-m-d');
        }
        else{
            $from=get_english_date($from);
            $to=get_english_date($to);
        }

        $lists=ListOfLedger::select('id','name','alias','under')->where('status',1)->get();

        return view('account::ledger.index',compact('lists','from','to'));
    }

    public function specific(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $lists=[];

        if($from=="" && $to=="")
        {
            $from=get_nepali_date(date('Y-m-d'));
            $date=explode('-',$from);
            $from=$date[0]."-01-01";
            $from=get_english_date($from);

            $to=date('Y-m-d');
        }
        else{
            $from=get_english_date($from);
            $to=get_english_date($to);
        }
        if($request->ledger_list)
        {
            foreach ($request->ledger_list as $ledger_id)
            {
                $lists=ListOfLedger::select('id','name','alias','under')->where('id',$ledger_id)->where('status',1)->get();
            }
            return view('account::ledger.index',compact('lists','from','to'));
        }

        $lists=ListOfLedger::select('id','name','alias','under')->where('status',1)->get();

        return view('account::ledger.index',compact('lists','from','to'));
    }

    public function quick(Request $request)
    {
        DB::beginTransaction();
        try {
        $name = $request->name;
        $alias=$request->alias;
        $group = $request->group;

        $ledger=new ListOfLedger();
        $ledger->name=$name;
        $ledger->alias=$alias;
        $ledger->under=$group;
        $ledger->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
//        $ledgers=ListOfLedger::where('status',1)->get();
        return $ledger;
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
    public function edit()
    {
        return view('account::edit');
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

    public function view_ledger($id)
    {
        $list=ListOfLedger::select('id','name','alias','under')->where('id',$id)->where('status',1)->first();
        return view('account::ledger.view_ledger',compact('list'));

    }

}