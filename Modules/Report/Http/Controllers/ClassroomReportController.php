<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Student\Entities\StudentSession;
use Modules\StudentFee\Entities\FeeType;
use Modules\Subject\Entities\Subject;

class ClassroomReportController extends Controller
{
    public function report(Request $request)
    {

        $class_teacher=[];
        $students=[];
        $subjects=[];
        $fee_types=[];
        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        $classroom_id = $request->input('classroom_id');
        $sections = Section::select('id','name','capacity')->where('status',1)->where('classroom_id',$classroom_id)->get();
        $section_id = $request->input('section_id');
        $classname=Classroom::where('id',$classroom_id)->first();


        $sectionname=Section::where('id',$section_id)->first();

        if($classroom_id != "" && $section_id != "") {
            $students= count(StudentSession::select('id')
                ->where('classroom_id',$classroom_id)
                ->where('section_id',$section_id)->get());

            $class_teacher = Section::select('classrooms.class_name as class_name', 'sections.name as section_name',
                'staffs.staff_id','staffs.first_name','staffs.middle_name','staffs.last_name','staffs.mobile','staffs.email','staffs.permanent_address')
                ->join('staffs', 'staffs.id', '=', 'sections.class_teacher_id')
                ->join('classrooms', 'classrooms.id', '=', 'sections.classroom_id')
                ->where('sections.status',1)
                ->where('sections.id',$section_id)
                ->where('sections.status',1)
                ->first();

//dd($class_teacher);
            $subjects=Subject::select('subject_code','subject_name','credit_hour','subject_type')->where('classroom_id',$classroom_id)->where('status',1)->get();

            $fee_types = FeeType::select('fee_code','fee_type')->where('classroom_id',$classroom_id)->where('status',1)->get();
        }

        return view('report::classroom.index',compact('classname','sectionname','classrooms','classroom_id', 'sections', 'section_id',
            'students','class_teacher','subjects','fee_types'));

    }
}
