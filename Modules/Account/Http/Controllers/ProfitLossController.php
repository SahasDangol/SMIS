<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\Group;

class ProfitLossController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:profit-loss-list');
        $this->middleware('permission:profit-loss-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:profit-loss-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:profit-loss-delete', ['only' => ['destroy']]);
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
        $income_id=Group::select('id')->where('status',1)->where('level','0')->where('name','Income')->first();
        $expense_id=Group::select('id')->where('status',1)->where('level','0')->where('name','Expenses')->first();
        return view('account::profitloss.index',compact('income_id','expense_id','from','to'));
    }

}
