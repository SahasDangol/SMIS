<?php

namespace Modules\Exam\Http\Controllers;

use App\Traits\ImageHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Exam\Entities\ExamList;
use Modules\Exam\Entities\ExamRoutine;
use Modules\Marksheet\Entities\Mark;

use Modules\Student\Entities\Student;
use Modules\Subject\Entities\OptionalSubjectAssign;
use Modules\Subject\Entities\Subject;

class ExamRoutineController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ImageHandler;

    function __construct()
    {
        $this->middleware('permission:exam-routine-list');
        $this->middleware('permission:exam-routine-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exam-routine-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exam-routine-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $routines = ExamRoutine::with('exam_list:id,name')->select('id', 'exam_id', 'file', 'remarks', 'session_id')->where('status', 1)->get();
        $exams = ExamList::select('id', 'name', 'remarks', 'status')->where('routine_status', 0)->where('status', 1)->where('publish_status', 0)->orderBy('id', 'ASC')->first();
        return view('exam::routine.index', compact('routines', 'exams'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('exam::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'exam_id' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            if ($request->hasFile('file')) {
                $routine = $request->file('file');
                $compressed_routine = $this->compress_and_store($routine);
                $input['file'] = 'public/' . $compressed_routine;
            }
            $input['session_id'] = get_academic_year();
            ExamRoutine::create($input);
            $exam_id = $request->exam_id;
            $examlist = ExamList::findOrFail($exam_id);
            $examlist->routine_status = 1;
            $examlist->save();


            $data = array();
            $session_id = get_academic_year();
            $students = Student::select('id', 'classroom_id', 'section_id')->where('status', 1)->get();
            $subjects = Subject::where('subject_type', '!=', 'optional-1')->where('subject_type', '!=', 'optional-2')->where('status', 1)->get();
            foreach ($students as $student) {
                foreach ($subjects as $subject) {
                    if ($subject->classroom_id == $student->classroom_id) {
                        $data[] = [
                            'session_id' => get_academic_year(),
                            'exam_id' => $exam_id,
                            'student_id' => $student->id,
                            'classroom_id' => $student->classroom_id,
                            'section_id' => $student->section_id,
                            'subject_id' => $subject->id];
                    }
                }
                $assigned_optinal1_subjects = OptionalSubjectAssign::select('optional_subject1_id')
                    ->where('student_id', $student->id)
                    ->where('session_id', $session_id)
                    ->get();
                if ($assigned_optinal1_subjects) {
                    foreach ($assigned_optinal1_subjects as $assigned_optinal1_subject) {
                        $data[] = [
                            'session_id' => get_academic_year(),
                            'exam_id' => $exam_id,
                            'student_id' => $student->id,
                            'classroom_id' => $student->classroom_id,
                            'section_id' => $student->section_id,
                            'subject_id' => $assigned_optinal1_subject->optional_subject1_id];
                    }
                }

                $assigned_optinal2_subjects = OptionalSubjectAssign::select('optional_subject2_id')
                    ->where('student_id', $student->id)
                    ->where('session_id', $session_id)
                    ->get();
//                dd($assigned_optinal2_subjects);
                if (!empty($assigned_optinal2_subjects)) {
                    foreach ($assigned_optinal2_subjects as $assigned_optinal2_subject) {
                        $data[] = [
                            'session_id' => get_academic_year(),
                            'exam_id' => $exam_id,
                            'student_id' => $student->id,
                            'classroom_id' => $student->classroom_id,
                            'section_id' => $student->section_id,
                            'subject_id' => $assigned_optinal2_subject->optional_subject2_id];
                    }
                }
            }
//            dd($data);
            Mark::insert($data);
        } catch (\Exception $e) {
//            dd($e);
            DB::rollback();

            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Exam Routine has been Added Successfully");
        return redirect('exams/routine');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('exam::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $routines = ExamRoutine::with('exam_list:id,name')->select('id', 'exam_id', 'file', 'remarks', 'session_id', 'status')->where('status', 1)->get();
        $exams = ExamList::select('id', 'name', 'remarks', 'status')->where('status', 1)->get();
        try {
            $routine = ExamRoutine::select('id', 'exam_id', 'file', 'remarks', 'session_id', 'status')->orderBy('id', 'DESC')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('exams/routine')->withError("Exam Routine with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('exams/routine')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('exam::routine.edit', compact('exams', 'routines', 'routine'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try {
            $examroutine = ExamRoutine::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('exams/routine')->withError("Exam Routine with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('exams/routine')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        DB::beginTransaction();
        try {

            if ($request->hasFile('file')) {
                $original = $request->file('file');
                $path = $this->compress_and_store($original);
                $examroutine->file = 'public/' . $path;
            }
//        $examroutine->exam_id=$request->exam_id;
            $examroutine->remarks = $request->remarks;
            $examroutine->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Exam Routine has been Updated Successfully");
        return redirect('exams/routine');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $routine = ExamRoutine::findOrFail($id);
            $routine->status = 0;
            $routine->save();
        } catch (ModelNotFoundException $e) {

            return redirect('exams/routine')->withError("Exam Routine with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('exams/routine')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Exam Routine has been Deleted Successfully");
        return redirect('exams/routine');
    }
}
