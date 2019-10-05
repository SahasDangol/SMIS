<?php

namespace Modules\Marksheet\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Exam\Entities\ExamList;
use Modules\Exam\Entities\MarkGrade;
use Modules\Marksheet\Entities\ExamResult;
use Modules\Marksheet\Entities\Mark;
use Modules\Staff\Entities\Staff;
use Modules\Student\Entities\Student;
use Modules\Subject\Entities\Subject;


class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     * @throws Exception
     */
    public function index()
    {
        $exam = ExamList::select('id','final_term_contribution')->where('routine_status', 1)->where('publish_status', 0)->first();
        if (!$exam) {
            $current_exam = ExamList::orderBy('created_at', 'DESC')->first();
            Session::flash('type', "info");
            Session::flash('message', ucfirst($current_exam->name) . " Result has already been published");
            return redirect()->back();
        } else {
            $ratio = $exam->final_term_contribution/100;
            $sections = collect();
            $session_id = get_academic_year();
            if (Auth::user()->hasRole('Teacher')) {
                $sections->push(Auth::user()->staffs->section);
                if (!$sections) {
                    Session::flash('type', "info");
                    Session::flash('message', "You are not assigned to any Sections");
                    return redirect()->back();
                }
            } elseif (Auth::user()->hasRole('Admin')) {
                $sections = Section::where('session_id', $session_id)->get();
            } else {
                Session::flash('type', "info");
                Session::flash('message', "You can't publish result");
                return redirect()->back();
            }
            $grades = MarkGrade::all();
            DB::beginTransaction();
            try {
                foreach ($sections as $section) {
                    $final_results = collect();
                    $students = get_student_by_section($section->id);
                    $subjects = $section->classrooms->subjects;
                    foreach ($students as $student) {
                        if (count($student->marks)) {
                            if ($result = ExamResult::where('session_id', $session_id)->where('student_id', $student->id)->where('exam_id', $exam->id)->first()) {
                                $exam_result = $result;

                            }
                            else {
                                $exam_result = new ExamResult();
                                $exam_result['session_id'] = $session_id;
                                $exam_result['exam_id'] = $exam->id;
                                $exam_result['student_id'] = $student->id;
                                $exam_result['classroom_id'] = $section->classroom_id;
                                $exam_result['section_id'] = $section->id;
                            }

                            $totalFullMarks = 0;
                            foreach ($subjects as $subject) {
                                if ($subject->subject_type == 'regular' || $subject->id == ($student->optional_subjects->optional_subject1_id ?? null) || $subject->id == ($student->optional_subjects->optional_subject2_id ?? null)) {
                                    $totalFullMarks += $subject->full_mark*$ratio;
                                }
                            }
                            $all_grades = collect();
                            $totalObtained = 0;
                            foreach ($student->marks->load('subject:id,subject_type,credit_hour')->where('exam_id', $exam->id) as $mark) {
                                if ($mark->subject->subject_type != 'additional') {
                                    $totalObtained += $mark->marks;
                                    if ($mark->result == 0) {
                                        $all_grades->push(['grade' => 0,  'credit_hour' => $mark->subject->credit_hour]);
                                    } else {
                                        $all_grades->push(['grade' => calculate_grade_point($mark->marks/$ratio, $grades), 'credit_hour' => $mark->subject->credit_hour]);
                                    }
                                }
                            }
                            $exam_result['full_mark'] = $totalFullMarks;
                            $exam_result['obtained_mark'] = $totalObtained;
                            $percentage = round(($totalObtained / $totalFullMarks) * 100, 2) ?? null;
                            $aggregate = getGrade($all_grades);
                            $exam_result['grade'] = $grades->where('grade_from', '<=', $aggregate)->where('grade_upto', '>', $aggregate)->first()->name ?? 'A+';
                            if ($exam_result['grade'] == 'N') {
                                $exam_result['percentage'] = 0;
                            } else {
                                $exam_result['percentage'] = $percentage;
                            }
                            $final_results->push($exam_result);
                        }

                    }
                    $counter = 1;
                    foreach ($final_results->sortByDesc('percentage') as $final_result) {
                        $final_result['rank'] = $counter++;
                        $final_result->save();
                    }

                }
                if (DB::table('marks')->where('exam_id', $exam->id)->distinct('student_id')->count('student_id') == DB::table('exam_results')->where('exam_id', $exam->id)->count()) {
                    $exam->publish_status = 1;
                    $exam->save();
                }
            } catch (Exception $e) {
                dd($e);
                DB::rollback();
                return back()->withError($e->getMessage())->withInput();
            }
            DB::commit();
            Session::flash('type', "success");
            Session::flash('message', "Results has been published successfully");
            return back();
        }
    }


}
