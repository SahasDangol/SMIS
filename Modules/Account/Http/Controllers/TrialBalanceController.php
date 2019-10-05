<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\Group;
use Modules\Account\Entities\Journal;
use Modules\Account\Entities\ListOfLedger;

class TrialBalanceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:trial-balance-list');
        $this->middleware('permission:trial-balance-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:trial-balance-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:trial-balance-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
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
        $groups=Group::select('id','name','level','parent_id')->where('level','0')->get();

        return view('account::trialbalance.index',compact('groups','from','to'));
    }

}
