<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\StudentSession;

class SectionSwapController extends Controller
{
    function __construct()
    {
//        $this->middleware('permission:student-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-edit', ['only' => ['section_swap', 'section_swap_store']]);
//        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }

    public function section_swap(Request $request)
    {
        $classes = Classroom::select('id', 'class_name')
            ->where('status', 1)
            ->get();
//        dd($classes);
        $class_id = $request->class_id;

        $status = 0;
        if ($class_id == "") {
            return view('student::section_swap.index', compact('classes', 'status'));
        } else {
            $status = 1;
            $sections = Section::select('id', 'name', 'capacity')
                ->where('status', 1)
                ->where('classroom_id', $class_id)
                ->get();

            return view('student::section_swap.index', compact('classes','sections', 'status', 'class_id'));
        }
    }

    public function section_swap_store(Request $request)
    {
        $class_id = $request->class_id;

        $sections = Section::select('id', 'name')
            ->where('status', 1)
            ->where('classroom_id', $class_id)
            ->get();

        DB::beginTransaction();
        try {

            $old = StudentSession::where("classroom_id", $class_id)
                ->where('session_id', get_academic_year());
            $old->delete();//delete all data of specific class from student session

            Student::where('classroom_id',$class_id)//flush the roll num in specific class
                ->update(['roll_no' => null]);

            $i = 1;
            foreach ($sections as $section) {
                $last_roll = count(Student::select('students.id')
                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                    ->where('student_sessions.classroom_id', $class_id)
                    ->where('student_sessions.section_id', $section->id)
                    ->where('students.status', '1')
                    ->get());

                $name = "section" . $i;
                $data = $request[$name];

                if(empty($data))
                {
                    $i++;
                    continue;
                }

                foreach ($data as $ids) {
                    $student_session = new StudentSession();
                    $student_session->session_id = get_academic_year();

                    $student_id = explode('#', $ids)[1];
                    $student_session->student_id = $student_id;

                    $student_session->classroom_id = $class_id;
                    $student_session->section_id = $section->id;

                    $last_roll = $last_roll + 1;
                    $roll = "stu";
                    $roll = $roll . get_academic_year() . $section->id . "-" . $last_roll;
                    $student_session->roll = $roll;
                    $student_session->save();

                    $student = Student::select('id')
                        ->where('id', $student_session->student_id)
                        ->first();
                    $student->roll_no = $student_session->roll;
                    $student->classroom_id = $student_session->classroom_id;
                    $student->section_id = $student_session->section_id;
                    $student->save();
                }
                $i++;
            }
        } catch (\Exception $e) {

            DB::rollback();
            if ($e->getCode() == 23000) {
                Session::flash('type', 'danger');
                Session::flash('message', "Integrity constraint violation: Duplicate entry of Roll number");
            } else {
                Session::flash('type', 'danger');
                Session::flash('message', $e->getMessage());
            }

            return redirect()->back();
        }

        DB::commit();

        Session::flash('type', 'info');
        Session::flash('message', 'Section has been managed successfully');
        return redirect()->route('student.index');
    }

}
