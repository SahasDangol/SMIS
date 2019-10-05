<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\StudentFee\Entities\Invoice;

class PaymentHistoryController extends Controller
{
    public function report(Request $request)
    {
        $history=[];
        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        $classroom_id = $request->input('classroom_id');
        $sections = Section::select('id','name')->where('status',1)->where('classroom_id',$classroom_id)->get();
        $section_id = $request->input('section_id');

        if($classroom_id != "" && $section_id != "")
        {
            $history=Invoice::select('*','invoices.id as invoice_id')
                ->join('students', 'students.id', '=', 'invoices.student_id')
                ->where('invoices.classroom_id',$classroom_id)
                ->where('invoices.status',1)
                ->get();
        }
        return view('report::payment_history.report',compact('classrooms', 'classroom_id', 'sections', 'section_id', 'history'));
    }
}
