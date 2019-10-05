<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Student\Entities\Student;
use Modules\Subject\Entities\OptionalSubjectAssign;
use Modules\Subject\Entities\Subject;


class OptionalSubjectAssignController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:subject-assign-list');
        $this->middleware('permission:subject-assign-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subject-assign-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subject-assign-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subjects = Subject::select('id', 'subject_name')->where('status', 1)->get();
        $students = Student::select('id', 'first_name', 'middle_name', 'last_name', 'roll_no')->where('status', 1)->get();
        $optionals = OptionalSubjectAssign::select('id', 'student_id', 'optional_subject1_id', 'optional_subject2_id')->get();
        return view('subject::subject_assign.index', compact('subjects', 'optionals', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $optional_subjects_1 = [];
        $optional_subjects_2 = [];
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $classroom_id = $request->input('classroom_id');
        $section_id = $request->input('section_id');
        $sections = Section::with('students')->select('id', 'name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        $students = get_student_by_section($section_id);

        $optionals = OptionalSubjectAssign::select('id', 'student_id', 'optional_subject1_id', 'optional_subject2_id')->get();

        $classroom = $classrooms->where('id', $classroom_id)->first();
        if ($classroom) {
            $optional_subjects_1 = $classroom->subjects->where('subject_type', 'optional-1')->where('status', 1);
            $optional_subjects_2 = $classroom->subjects->where('subject_type', 'optional-2')->where('status', 1);
        }
        return view('subject::subject_assign.create', compact('classrooms',
            'classroom_id', 'section_id', 'sections', 'students', 'optional_subjects_1', 'optional_subjects_2', 'optionals'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $students = Section::findOrFail($request->section_id)->students;

        } catch (ModelNotFoundException $e) {

            return redirect('subject_assign')->withError("Section with ID '" . $request->section_id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('subject_assign')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        DB::beginTransaction();
        try {
            $session_id = get_academic_year();
            foreach ($students as $student) {
                $option_subject_assign = OptionalSubjectAssign::where('student_id', $student->id)
                    ->where('session_id', $session_id)->first();
                if (!$option_subject_assign) {
                    $option_subject_assign = new OptionalSubjectAssign();
                    $option_subject_assign->student_id = $student->id;
                    $option_subject_assign->session_id = $session_id;
                }

                if ($request['radio_2_' . $student->id] != "") {
                    $option_subject_assign->optional_subject2_id = $request['radio_2_' . $student->id];
                } else {
                    $option_subject_assign->optional_subject2_id = null;
                }

                $option_subject_assign->optional_subject1_id = $request['radio_1_' . $student->id];
                $option_subject_assign->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Optional Subject has been Added Successfully");
        return redirect(route('subject_assign.index'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('subject::subject.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $classroom_id = $request->input('classroom_id');
        $section_id = $request->input('section_id');
        $sections = Section::with('students')->select('id', 'name')->where('status', 1)->where('classroom_id', $classroom_id)->get();
        return view('subject::subject_assign.edit', compact('classrooms',
            'classroom_id', 'section_id', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        return redirect(route('subject_assign.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $subject = OptionalSubjectAssign::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('subject_assign')->withError("Optional Subject with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('subject_assign')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        DB::beginTransaction();
        try {
            $subject->status = 0;
            $subject->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "danger");
        Session::flash('message', "Assigned Subject has been Removed Successfully");
        return redirect('subject_assign');
    }

    /*getting subject information*/
    public function getSubject(Request $request)
    {

    }
}