<?php

namespace Modules\Account\Http\Controllers;

use App\Http\Controllers\BsdateController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Account\Entities\Journal;

class DayBookController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:day-book-list');
        $this->middleware('permission:day-book-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:day-book-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:day-book-delete', ['only' => ['destroy']]);
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

        if($from=="" && $to=="")
        {
            $from=date('Y-m-d');
            $to=date('Y-m-d');
        }else{
            $from=$bsdate->nep_to_eng($from);
            $to=$bsdate->nep_to_eng($to);
        }

        $daybooks = Journal::select('id','date','narration','total_debit')->whereBetween('date', [$from, $to])->where('status', 1)->get();
//        $daybooks = DB::select("SELECT 'id','date','narration','total_debit' FROM journals WHERE date between '$from' AND '$to' ");
        return view('account::daybook.index',compact('daybooks','from','to'));

    }

}
