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

class ManageRollController extends Controller
{
    function __construct()
    {
//        $this->middleware('permission:student-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-edit', ['only' => ['section_choose', 'manage_roll_no_store']]);
//        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }
    public function section_choose(Request $request)
    {
        $classes = Classroom::select('id', 'class_name')
            ->where('status', 1)
            ->get();
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $status = 0;
        if ($class_id == "" || $section_id == "") {
            return view('student::roll_manage.index', compact('classes', 'status'));
        } else {
            $status = 1;

            $students=StudentSession::select('id','student_id','roll')
                ->with('students:id,first_name,middle_name,last_name')
                ->orderBy('id', 'asc')
                ->where('classroom_id',$class_id)
                ->where('section_id',$section_id)
                ->where('session_id',get_academic_year())
                ->get();

            return view('student::roll_manage.index', compact('students', 'status', 'class_id','section_id'));
        }
    }

    public function manage_roll_no_store(Request $request)
    {
        $class_id = $request->class_id;
        $section_id = $request->section_id;

        $old = StudentSession::where("section_id", $section_id)
            ->where('session_id',get_academic_year());

        $old->delete();

        Student::where('section_id',$section_id)//flush the roll num in specific class
        ->update(['roll_no' => null]);


        $last_roll = count(Student::select('students.id')
            ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
            ->where('student_sessions.classroom_id', $class_id)
            ->where('student_sessions.section_id', $section_id)
            ->where('students.status', '1')
            ->get());

        DB::beginTransaction();
        try {
            foreach ($request->section as $student) {

                $student_session = new StudentSession();
                $student_session->session_id = get_academic_year();

                $student_session->student_id = $student;

                $student_session->classroom_id = $class_id;
                $student_session->section_id = $section_id;

                $last_roll = $last_roll + 1;
                $roll = "stu";
                $roll = $roll . get_academic_year() . $section_id . "-" . $last_roll;
                $student_session->roll = $roll;
                $student_session->save();

                Student::where('id',$student)
                ->update(['roll_no' => $roll]);
            }
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }

        DB::commit();


        Session::flash('type', 'info');
        Session::flash('message', 'Roll number has been managed successfully');
        return redirect()->route('student.index');
    }

}
