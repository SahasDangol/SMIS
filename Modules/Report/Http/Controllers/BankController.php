<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\StudentFee\Entities\FeeType;
use Modules\Transaction\Entities\BankAccount;
use Modules\Transaction\Entities\ChartOfAccount;
use Modules\Transaction\Entities\Transaction;

class BankController extends Controller
{
    public function report(Request $request)
    {
        $statements=[];
        $bank_name=[];
        $banks = BankAccount::select('id','bank_name','account_no')->where('status',1)->get();
        $bank_id = $request->bank_id;

        if($bank_id != "")
        {
            $bank_name=BankAccount::select('bank_name','account_no', 'balance')
                ->where('id',$bank_id)
                ->where('status',1)
                ->first();

            $statements=Transaction::select('date','trans_type','amount','chart_of_accounts.name as chart_name', 'payment_methods.name as payment_method')
                ->join('chart_of_accounts', 'chart_of_accounts.id', '=', 'transactions.chart_id')
                ->join('payment_methods', 'payment_methods.id', '=', 'transactions.payment_method_id')
                ->where('transactions.account_id',$bank_id)
                ->where('transactions.status',1)
                ->get();
        }

        $income = $this->income();

//        return $income;


        return view('report::bank.report',compact('banks', 'bank_name','statements','bank_id','income'));
    }

    private function income()
    {
        $income  = "[";
//        $coat = "'";
//        return $coat;
        $amount0 = 0;

        $i=0;
        $types = ChartOfAccount::select('id','name','type')->where('type','expense')->where('status',1)->get();


        foreach ($types as $type)
        {   $amount[$i]=0;
            $transactions = Transaction::select('amount')->where('chart_id',$type->id)->where('status',1)->get();

            foreach($transactions as $transaction)
            {
                $amount[$i] = $amount0+$transaction->amount+$amount[$i];
            }
//            $name=htmlspecialchars($type->name);

            $income .="{value:".$amount[$i]."}, ";

//            $income .='name:\''.$type->name.'\'},';

            $i++;
        }
        return $income."]";
//        return response()->json($income."]");
    }
}
