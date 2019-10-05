<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Staff\Entities\Staff;
use Modules\Subject\Entities\Subject;
use Modules\Subject\Entities\SubjectTeacher;

class SubjectTeacherController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    function __construct()
    {
        $this->middleware('permission:subjectteacher-list');
        $this->middleware('permission:subjectteacher-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subjectteacher-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subjectteacher-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subjectteachers = SubjectTeacher::select('id', 'classroom_id', 'section_id', 'teacher_id', 'subject_id')->where('status', 1)->get();
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $sections = Section::select('id', 'name')->where('status', 1)->get();
        $subjects = Subject::select('id', 'subject_name')->where('status', 1)->get();
        $teachers = Staff::select('id', 'first_name', 'middle_name', 'last_name')->where('designation_id', 2)->where('status', 1)->get();

        return view('subject::subjectteacher.index', compact('sections', 'teachers', 'classrooms', 'subjectteachers', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $subjects = [];
        $teachers = [];
        $subject_teachers = [];

        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $classroom_id = $request->input('classroom_id');
        $sections = Section::select('id', 'name', 'capacity')->where('status', 1)->where('classroom_id', $classroom_id)->get();
        $section_id = $request->input('section_id');

        if ($classroom_id != "" && $section_id != "") {
            $subjects = Subject::select('id', 'subject_name')->where('classroom_id', $classroom_id)->where('status', 1)->get();

            $teachers = Staff::select('first_name', 'middle_name', 'last_name', 'id', 'staff_id')
                ->where('status', 1)
                ->whereHas('designations', function ($query) {
                    $query->where('name', 'teacher')->where('status', 1)->orWhere('name', 'Teacher');
                })
                ->get();

            $subject_teachers = SubjectTeacher::select('teacher_id', 'subject_id')
                ->where('classroom_id', $classroom_id)
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->get();

            if (count($subject_teachers) < 1) {
                $subject_teachers = [];
            }
        }

        return view('subject::subjectteacher.create', compact('classrooms', 'classroom_id', 'sections', 'section_id',
            'teachers', 'subjects', 'subject_teachers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $classroom_id = $request->classroom_id;
        $section_id = $request->section_id;

        $subjects = Subject::select('id', 'subject_name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        DB::beginTransaction();
        try {

            //Remove All Items
            $lists = SubjectTeacher::select('id')
                ->where('classroom_id', $classroom_id)
                ->where('section_id', $section_id)
                ->where('session_id', get_academic_year());
            $lists->delete();
            //Remove All Items

            $main_array = array();
            foreach ($subjects as $subject) {
                if ($request['select_' . $subject->id] == "") {
                    continue;
                } else {
                    $sub_array = array(
                        "session_id" => get_academic_year(),
                        "teacher_id" => $request['select_' . $subject->id],
                        "classroom_id" => $classroom_id,
                        "section_id" => $section_id,
                        "subject_id" => $subject->id
                    );
                    array_push($main_array, $sub_array);
                }

            }

            SubjectTeacher::insert($main_array);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Subject Teachers has been Updated Successfully");
        return redirect('subject_teacher');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */

}
