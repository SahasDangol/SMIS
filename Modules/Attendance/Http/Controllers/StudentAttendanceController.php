<?php

namespace Modules\Attendance\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Attendance\Entities\StudentAttendance;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Setting\Entities\AcademicsYear;
use Modules\Student\Entities\Student;

class StudentAttendanceController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:student-attendance-list');
        $this->middleware('permission:student-attendance-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-attendance-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:student-attendance-delete', ['only' => ['destroy']]);

//             $this->middleware('permission:student-attendance');
    }

    function fetch(Request $request)
    {
        $ClassroomID = $request->classroom_id;
        if ($ClassroomID > 0) {
            $response = DB::select("SELECT sections.id,sections.name from sections WHERE sections.status=1 and sections.classroom_id = ?", [$ClassroomID]);
            return $response;
        }

    }

    public function student_attendance(Request $request)
    {
        try{

        $roles = Auth::user()->getRoleNames();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        foreach ($roles as $role) {
            if ($role == "Teacher") {
               try{
                $section = Auth::user()->staffs->sections;

                $class_id = $section->classroom_id;
                $section_id = $section->id;

                $date = get_nepali_date(date('Y-m-d'));
               } catch (\Exception $e) {
                   DB::rollback();
                   return back()->withError($e->getMessage())->withInput();
               }
            } elseif ($role == "Admin" || $role == "Principal") {
                try{
                $class_id = $request->class_id;
                $section_id = $request->section_id;
                $date = $request->date;
                } catch (\Exception $e) {
                    DB::rollback();
                    return back()->withError($e->getMessage())->withInput();
                }
            }
        }

        $attendance = 0;
        try{
        $classes = Classroom::select('id', 'class_name')->where('status', 1)->get();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
try{
        $academic_year = AcademicsYear::select('year')
            ->orderBy('id', 'desc')
            ->where('working_status', 1)
            ->first();
} catch (\Exception $e) {
    DB::rollback();
    return back()->withError($e->getMessage())->withInput();
}
try{
        $raw_date = get_nepali_date(date('Y-m-d'));
        $exploded_date = explode("-", $raw_date);
        $date = $academic_year->year . "-" . $exploded_date[1] . "-" . $exploded_date[2];
} catch (\Exception $e) {
    DB::rollback();
    return back()->withError($e->getMessage())->withInput();
}

        if ($class_id == "" || $section_id == "" || $date == "") {
            return view('attendance::student.index', compact('classes', 'attendance', 'date'));
        } else {
           try{
            $attendance = 1;
            $selected_class = Classroom::find($class_id)->class_name;
            $selected_section = Section::find($section_id)->name;
           } catch (\Exception $e) {
               DB::rollback();
               return back()->withError($e->getMessage())->withInput();
           }
try{
            $students = Student::select('students.id as student_id')
                ->join('sections', 'sections.id', '=', 'students.section_id')
                ->where('students.status', 1)
                ->where('students.classroom_id', $class_id)
                ->where('students.section_id', $section_id)
                ->where('students.status', 1)
                ->get();
        } catch (\Exception $e) {
        DB::rollback();
        return back()->withError($e->getMessage())->withInput();
    }
try{
            $check = count(StudentAttendance::select('id')
                ->where('session_id', get_academic_year())
                ->where('status', 1)
                ->where('classroom_id', $class_id)
                ->where('section_id', $section_id)
                ->where('date', get_english_date($date))
                ->get());
} catch (\Exception $e) {
    DB::rollback();
    return back()->withError($e->getMessage())->withInput();
}
//            return $check;
            if ($check < 1) {
//                return $students;
                foreach ($students as $student) {
                    DB::beginTransaction();
                    try {
                        $store = new StudentAttendance();
                        $store->session_id = get_academic_year();
                        $store->student_id = $student->student_id;
                        $store->classroom_id = $class_id;
                        $store->section_id = $section_id;
                        $store->date = get_english_date($date);
                        $store->attendance = 1;
                        $store->save();
                    } catch (\Exception $e) {
                        DB::rollback();
                        return back()->withError($e->getMessage())->withInput();
                    }
                    DB::commit();
                }
            } else {
//                echo "already done";
            }

            $attendances = StudentAttendance::select('student_attendances.id as attendance_id','roll_no','first_name','middle_name','last_name','attendance')
                ->join('students', 'students.id', '=', 'student_attendances.student_id')
                ->where('session_id', get_academic_year())
                ->where('student_attendances.status', 1)
                ->where('student_attendances.classroom_id', $class_id)
                ->where('student_attendances.section_id', $section_id)
                ->where('student_attendances.date', get_english_date($date))
                ->get();

            return view('attendance::student.index', compact('attendances', 'classes', 'attendance', 'class_id', 'section_id', 'date', 'selected_class', 'selected_section'));
        }
    }

    function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $attendance = $request->attendance;
            $id = $request->id;

            $update = StudentAttendance::find($id);

            $update->attendance = $attendance;
            $update->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        return $update->attendance;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('attendance::student.index');
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('attendance::show');
    }


}
