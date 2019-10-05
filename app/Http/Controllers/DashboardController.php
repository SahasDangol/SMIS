<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Account\Entities\FiscalYear;
use Modules\Setting\Entities\IncomeExpense;
use Modules\StudentFee\Entities\StudentPayment;
use Modules\Transaction\Entities\Transaction;
use Modules\Visitor\Entities\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $month = date('m');
        $year = date('Y');

        $data = array();

        $data['visitors'] = count(Visitor::select('id')->where('status',1)->get());

        $data['student_payments'] = StudentPayment::selectRaw("IFNULL(SUM(amount),0) as total")
            ->whereMonth("date",$month)
            ->whereYear("date",$year)
            ->first()->total;

        $data['fiscal_year']=FiscalYear::select('name')->where('working_status',1)->orderBy('id','desc')->first()->name;


        $profit_loss=$this->yearly_income();
        $data['yearly_income'] = $profit_loss['income'];
        $data['yearly_expense'] = $profit_loss['expense'];
        return view('dashboard',$data);
    }

    private function yearly_income(){

        $income_expense=IncomeExpense::select('income','expense')->get();

        $income  = "[";
        $expense  = "[";
        for($i=3;$i<=11;$i++)
        {
            $income .=$income_expense[$i]->income.",";
            $expense .=$income_expense[$i]->expense.",";
        }
        for($i=0;$i<=2;$i++)
        {
            $income .=$income_expense[$i]->income.",";
            $expense .=$income_expense[$i]->expense.",";
        }
        $income.="]";
        $expense.="]";

        $info['income']=$income;
        $info['expense']=$expense;

        return $info;

    }
}
