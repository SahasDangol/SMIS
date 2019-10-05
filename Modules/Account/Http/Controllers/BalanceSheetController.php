<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Account\Entities\Group;
use Modules\Setting\Entities\Setting;

class BalanceSheetController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:balance-sheet-list');
        $this->middleware('permission:balance-sheet-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:balance-sheet-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:balance-sheet-delete', ['only' => ['destroy']]);
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

        $assets_id=Group::select('id')->where('status',1)->where('level','0')->where('name','Assets')->first();
        $liabilities_id=Group::select('id')->where('status',1)->where('level','0')->where('name','Liabilities')->first();
        $profit_loss=get_profit_loss($from,$to);
        $net_profit=$profit_loss['net_profit'];

//        dd($net_profit);
        $net_loss=$profit_loss['net_loss'];
        return view('account::balancesheet.index',compact('assets_id','liabilities_id','net_profit','net_loss','from','to'));
    }

}
