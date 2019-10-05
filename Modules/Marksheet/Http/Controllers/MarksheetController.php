<?php

namespace Modules\Marksheet\Http\Controllers;

use App\Exceptions\CustomException;

use App\Exports\BulkMarksExport;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Exam\Entities\ExamList;
use Modules\Exam\Entities\MarkGrade;
use Modules\Marksheet\Entities\ExamResult;
use Modules\Marksheet\Entities\Mark;
use Modules\Student\Entities\Student;
use Modules\Subject\Entities\Subject;

class MarksheetController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:marksheet-list');
        $this->middleware('permission:marksheet-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:marksheet-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:marksheet-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function export(Request $request)
    {

        $classroom_id = $request->classroom_id;
        $section_id = $request->section_id;
        $exam_id = $request->exam_id;

        $class = Classroom::where('id', $classroom_id)->first();
        $export_marks = Student::where('section_id', $section_id)
            ->get();

        foreach ($export_marks as $export_mark) {

            $student_data = array($export_mark->id, $export_mark->first_name . ' ' . $export_mark->last_name, $export_mark->roll_no);

            foreach ($export_mark->marks as $mark) {
                if ($mark->exam_id == $exam_id) {
                    foreach ($class->subjects as $subject) {


                        if ($mark->subject_id == $subject->id) {


                            array_push($student_data, $mark->th_marks);


                            if ($subject->pr_full_mark) {


                                array_push($student_data, $mark->pr_marks);
                            }


                        } else {
//                        array_push($student_data,null);
                        }

                    }
                }
            }
            $all_students[] = $student_data;
        }


        Excel::create('users', function ($excel) use ($all_students, $class) {


            $head = array('id', 'name', 'roll_no');


            foreach ($class->subjects as $subject) {
                array_push($head, strtolower($subject->subject_name) . '_theory');
//                    array_push($head, $subject->id);
                if ($subject->pr_full_mark) {
                    array_push($head, strtolower($subject->subject_name) . '_practical');
//                        array_push($head, $subject->id);
                }
            }


            // Build the spreadsheet, passing in the users array


            $excel->sheet('sheet1', function ($sheet) use ($head, $all_students) {

                $sheet->fromArray($head, null, 'A1', false, false);

                $sheet->data = [];

                $sheet->fromArray($all_students, null, 'A2', false, false);

            });

        })->download('xlsx');




    }

    public function import(Request $request)
    {

        DB::beginTransaction();


        try {
//            DB::connection()->disableQueryLog();
            Excel::load(/**
             * @param $rows
             */
                $request->file('file'), function ($rows) {
                $exam = ExamList::where('status', 1)->where('routine_status', 1)->where('publish_status', 0)->first();
                $rows = $rows->toArray();
                $ratio = $exam->final_term_contribution / 100;
                foreach ($rows as $row) {
                    $student = Student::where('roll_no', $row['roll_no'])->first();
                    $class = $student->classrooms->id;
                    $subjects = Subject::where('classroom_id', $class)->orderBy('id', 'ASC')->get();
                    $marks = Mark::where('student_id', $student->id)->where('exam_id', $exam->id)->orderBy('subject_id', 'ASC')->get();
                    foreach ($marks as $mark) {
                        foreach ($subjects as $subject) {
                            if ($mark->subject_id == $subject->id) {
                                $mark->th_marks = $row[strtolower($subject->subject_name) . '_theory'];
                                $th_full_marks = $subject->th_full_mark * $ratio;

                                if ($mark->th_marks > $th_full_marks) {

                                    throw new CustomException('The obtained theory marks should not be greater than full marks');

                                }
                                $mark->marks = $mark->th_marks + $mark->pr_marks;
                                $th_pass_marks = $subject->th_pass_mark * $ratio;
                                if ($mark->th_marks >= $th_pass_marks) {
                                    $mark->th_result = 1;
                                    $mark->result = 1;
                                } else {
                                    $mark->th_result = 0;
                                    $mark->result = 0;
                                }
                                if ($subject->pr_full_mark) {
                                    $mark->pr_marks = $row[strtolower($subject->subject_name) . '_practical'];
                                    $pr_full_marks = $subject->pr_full_mark * $ratio;

                                    if ($mark->pr_marks > $pr_full_marks) {
                                        throw new CustomException('The obtained practical marks should not be greater than full marks');

                                    }
                                    $pr_pass_marks = $subject->pr_pass_mark * $ratio;
                                    if ($mark->pr_marks >= $pr_pass_marks) {
                                        $mark->pr_result = 1;
                                    } else {
                                        $mark->pr_result = 0;
                                        $mark->result = 0;
                                    }
                                }
                                $mark->save();
                            }
                        }
                    }


                }


            });
        } catch (CustomException $e) {


            DB::rollback();

            Session::flash('type', 'danger');
            Session::flash('message', $e->getMessage());
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('type', 'danger');
            Session::flash('message', 'Error occured while uploading!! Check your file or contact service provider.');
            return redirect()->back();
        }
        DB::commit();
        Session::flash('type', 'info');
        Session::flash('message', 'Marks have been updated successfully');
        return redirect('marksheet/bulkinsert');
    }

    public
    function index(Request $request)
    {

        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $exams = ExamList::select('id', 'name')->where('routine_status', 1)->where('status', 1)->get();


        $marks = [];
        $classroom_id = $request->input('classroom_id');
        $section_id = $request->input('section_id');
        $exam_id = $request->input('exam_id');
        $subject_id = $request->input('subject_id');


        $sections = Section::select('id', 'name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        $subjects = Subject::select('id', 'subject_name')->where('classroom_id', $classroom_id)->where('status', 1)->get();


        if ($classroom_id != "" && $section_id != "" && $subject_id != "" && $exam_id != "") {
            $marks = Mark::with('students:id,roll_no,first_name,middle_name,last_name')
                ->select('id', 'th_marks', 'pr_marks', 'result', 'student_id')
                ->where('classroom_id', $classroom_id)
                ->where('section_id', $section_id)
                ->where('subject_id', $subject_id)
                ->where('exam_id', $exam_id)->get();
            if (!count($marks)) {
                $marks = [];
            }
        }

        return view('marksheet::marks.index', compact('classrooms',
            'classroom_id',
            'section_id',
            'subject_id',
            'exam_id',
            'sections',
            'subjects',
            'marks',
            'exams'));

    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return Response
     */
    public
    function create(Request $request)
    {

        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $exams = ExamList::select('id', 'name', 'final_term_contribution')->where('routine_status', 1)->where('publish_status', 0)->where('status', 1)->get();

        $marks = [];
        $subjects = [];
        $classroom_id = $request->input('classroom_id');
        $section_id = $request->input('section_id');
        $exam_id = $request->input('exam_id');
        $subject_id = $request->input('subject_id');

        $sections = Section::select('id', 'name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        $user = Auth::user();
        if ($user->hasrole("Admin")) {
            $subjects = Subject::select('id', 'subject_name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        } elseif ($user->hasrole("Teacher")) {
            $subjects = Subject::select('subjects.id', 'subjects.subject_name')
                ->join('subject_teachers', 'subject_teachers.subject_id', '=', 'subjects.id')
                ->join('staffs', 'staffs.id', '=', 'subject_teachers.teacher_id')
                ->where('subjects.classroom_id', $classroom_id)
                ->where('subject_teachers.teacher_id', $user->staffs->id)
                ->where('subjects.status', 1)
                ->get();
        }
        $subject_info = Subject::where('id', $subject_id)->first();

        if ($classroom_id != "" && $section_id != "" && $subject_id != "" && $exam_id != "") {
            $marks = Mark::with('students:id,first_name,last_name,roll_no')
                ->select('exam_id', 'subject_id', 'id', 'student_id', 'result', 'classroom_id', 'section_id', 'marks', 'th_marks', 'pr_marks')
                ->where('classroom_id', $classroom_id)
                ->where('section_id', $section_id)
                ->where('subject_id', $subject_id)
                ->where('exam_id', $exam_id)
                ->where('status', 1)
                ->get();

            if (!count($marks)) {
                $marks = [];
            }
        }

        return view('marksheet::marks.create', compact('classrooms',
            'classroom_id',
            'section_id',
            'subject_id',
            'exam_id',
            'sections',
            'subjects',
            'marks',
            'exams',
            'subject_info'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public
    function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $mark = Mark::with('exam:id,final_term_contribution', 'subject:id,th_pass_mark,pr_pass_mark')->where('id', $request->id)->first();
            if ($request->th_marks) {
                $th_pass_marks = $mark->subject->th_pass_mark * $mark->exam->final_term_contribution / 100;
                $mark->th_marks = $request->th_marks;
                $mark->marks = $request->th_marks + $mark->pr_marks;
                if ($mark->th_marks < $th_pass_marks) {
                    $mark->th_result = 0;
                    $mark->result = 0;
                } else {
                    $mark->th_result = 1;
                    if ($mark->subject->pr_pass_mark) {
                        if ($mark->pr_result) {
                            $mark->result = 1;
                        }
                    } else {
                        $mark->result = 1;
                    }
                }
            }


            if ($request->pr_marks) {
                $pr_pass_marks = $mark->subject->pr_pass_mark * $mark->exam->final_term_contribution / 100;
                $mark->pr_marks = $request->pr_marks;
                $mark->marks = $request->pr_marks + $mark->th_marks;
                if ($mark->pr_marks < $pr_pass_marks) {
                    $mark->pr_result = 0;
                    $mark->result = 0;
                } else {
                    $mark->pr_result = 1;
                    if ($mark->th_result) {
                        $mark->result = 1;
                    }
                }
            }
            $mark->save();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'result' => "false",
                'message' => $e->getMessage()], 500);
        }
        DB::commit();
        return response()->json([
            'result' => $mark->result]);
    }

    /**
     * Show the specified resource.
     * @param string $student_id
     * @param string $exam_id
     * @return Response
     */
    public
    function show($student_id = '', $exam_id = '')
    {

        $session_id = get_academic_year();
        $marks = Mark::with('subject:id,subject_name,subject_type,credit_hour,full_mark,pass_mark,th_pass_mark,pr_pass_mark')
            ->select('id', 'subject_id', 'marks', 'th_marks', 'pr_marks', 'th_result', 'pr_result', 'result')
            ->where('student_id', $student_id)
            ->where('session_id', $session_id)
            ->where('exam_id', $exam_id)->get();
        if (!count($marks)) {
            $marks = [];
        }
        $exam = ExamList::select('id', 'name', 'final_term_contribution')->where('id', $exam_id)->where('status', 1)->first();
        $student = Student::with('classrooms:id,class_name', 'sections:id,name')
            ->select('id', 'first_name', 'middle_name', 'last_name', 'roll_no', 'classroom_id', 'section_id')
            ->find($student_id);
        $exam_result = ExamResult::select('id', 'student_id', 'full_mark', 'obtained_mark', 'grade', 'percentage', 'rank')
            ->where('exam_id', $exam_id)
            ->where('session_id', $session_id)
            ->where('student_id', $student_id)
            ->where('status', 1)->first();
        $grades = MarkGrade::select('id', 'from', 'upto', 'name')->where('status', 1)->get();
        $ratio = $exam->final_term_contribution / 100;
        return view('marksheet::marks.show', compact('marks', 'exam', 'exam_result', 'student', 'grades', 'ratio'));

    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public
    function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public
    function update(Request $request, $mark_id)
    {
        try {
            $mark = Mark::findOrFail($mark_id);
        } catch (ModelNotFoundException $e) {

            return redirect('marksheet')->withError("Marksheet with ID '" . $mark_id . "' not found.");
        } catch (Exception $ex) {
            return redirect('marksheet')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        DB::beginTransaction();
        try {
            $mark->th_marks = $request->th_marks;
            $mark->pr_marks = $request->pr_marks;
            $mark->save();
        } catch (Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        return redirect()->route('marksheet.index')->with('success', 'Information successfully added');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public
    function destroy()
    {
    }

    public
    function overall(Request $request)
    {
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $exams = ExamList::select('id', 'name')->where('routine_status', 1)->where('status', 1)->get();

        $students = [];
        $classroom_id = $request->input('classroom_id');
        $section_id = $request->input('section_id');
        $exam_id = $request->input('exam_id');
        $sections = Section::select('id', 'name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        $subjects = Subject::select('id', 'subject_name', 'subject_type', 'full_mark', 'pass_mark')->where('status', 1)
            ->where('classroom_id', $classroom_id)->get();
        if ($classroom_id != "" && $section_id != "" && $exam_id != "") {
            $students = Student::with('marks:id,student_id,subject_id,marks,exam_id')
                ->select('id', 'roll_no', 'first_name', 'middle_name', 'last_name')
                ->where('classroom_id', $classroom_id)
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->get();
            if (!count($students)) {
                $students = [];
            }
        }
        $session_id = get_academic_year();
        $exam_results = ExamResult::select('id', 'student_id', 'full_mark', 'obtained_mark', 'grade', 'percentage', 'rank')
            ->where('exam_id', $exam_id)
            ->where('section_id', $section_id)
            ->where('session_id', $session_id)->where('status', 1)->get();
        return view('marksheet::marks.overall', compact(
            'classrooms',
            'classroom_id',
            'section_id',
            'exam_id',
            'sections',
            'subjects',
            'students',
            'exams',
            'exam_results'));
    }

    public
    function multipleshow(Request $request)
    {
        $session_id = get_academic_year();
        $checkedstudent = $request->input('checkbox');
        $exam_id = $request->input('exam_id');
        $marks = Mark::with('subjects:id,subject_name,subject_type,credit_hour,full_mark,pass_mark,th_pass_mark,pr_pass_mark')->where('exam_id', $exam_id)
            ->whereIn('student_id', $checkedstudent)->get();
        if (!count($marks)) {
            $marks = [];
        }
        $exam = ExamList::Select('id', 'name', 'final_term_contribution')->where('id', $exam_id)->first();
        $students = Student::with('classrooms:id,class_name', 'sections:id,name')->find($checkedstudent);
        $grades = MarkGrade::all();
        $exam_results = ExamResult::select('id', 'student_id', 'full_mark', 'obtained_mark', 'grade', 'percentage', 'rank')
            ->where('exam_id', $exam_id)
            ->where('session_id', $session_id)
            ->where('status', 1)->first();
        $ratio = $exam->final_term_contribution / 100;
        return view('marksheet::marks.multipleshow', compact('students', 'marks', 'exam', 'checkedstudent', 'grades', 'exam_results'));
    }

    public
    function bulkinsert(Request $request)
    {
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $exams = ExamList::select('id', 'name', 'final_term_contribution')->where('routine_status', 1)->where('publish_status', 0)->where('status', 1)->get();

        $marks = [];
        $subjects = [];
        $classroom_id = $request->input('classroom_id');
        $section_id = $request->input('section_id');
        $exam_id = $request->input('exam_id');
        $subject_id = $request->input('subject_id');

        $sections = Section::select('id', 'name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        $user = Auth::user();
        if ($user->hasrole("Admin")) {
            $subjects = Subject::select('id', 'subject_name')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        } elseif ($user->hasrole("Teacher")) {
            $subjects = Subject::select('subjects.id', 'subjects.subject_name')
                ->join('subject_teachers', 'subject_teachers.subject_id', '=', 'subjects.id')
                ->join('staffs', 'staffs.id', '=', 'subject_teachers.teacher_id')
                ->where('subjects.classroom_id', $classroom_id)
                ->where('subject_teachers.teacher_id', $user->staffs->id)
                ->where('subjects.status', 1)
                ->get();
        }
        $subject_info = Subject::where('id', $subject_id)->first();

        if ($classroom_id != "" && $section_id != "" && $subject_id != "" && $exam_id != "") {
            $marks = Mark::with('students:id,first_name,last_name,roll_no')
                ->select('exam_id', 'subject_id', 'id', 'student_id', 'result', 'classroom_id', 'section_id', 'marks', 'th_marks', 'pr_marks')
                ->where('classroom_id', $classroom_id)
                ->where('section_id', $section_id)
                ->where('subject_id', $subject_id)
                ->where('exam_id', $exam_id)
                ->where('status', 1)
                ->get();

            if (!count($marks)) {
                $marks = [];
            }
        }

        return view('marksheet::marks.bulkinsert', compact('classrooms',
            'classroom_id',
            'section_id',
            'subject_id',
            'exam_id',
            'sections',
            'subjects',
            'marks',
            'exams',
            'subject_info'));

    }
}
