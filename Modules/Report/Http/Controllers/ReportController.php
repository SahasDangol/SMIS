<?php

namespace Modules\Report\Http\Controllers;

use App\Http\Controllers\BsdateController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Account\Entities\Journal;

use Modules\Attendance\Entities\StudentAttendance;

use Modules\Exam\Entities\ExamList;
use Modules\Exam\Entities\ExamRoutine;
use Modules\Routine\Entities\Routine;
use Modules\Setting\Entities\AcademicsYear;
use Modules\Student\Entities\Student;
use Modules\Transport\Entities\TransportRoute;
use Modules\Transport\Entities\TransportVehicle;

use Illuminate\Support\Facades\DB;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\StudentFee\Entities\FeeType;


class ReportController extends Controller
{
    public function transaction_report(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $transactions = [];

        if ($from != "" && $to != "") {
            $transactions = DB::select("SELECT * FROM transactions WHERE date between '$from' AND '$to' ");
        }

        return view('report::transaction.report', compact('transactions', 'to', 'from'));

    }

    public function fee_report(Request $request)
    {
        $fees = [];
        $classrooms = Classroom::select('id','class_name')->where('status', 1)->get();
        $classroom_id = $request->input('classroom_id');
        $sections = Section::select('id','name')->where('status',1)->where('classroom_id', $classroom_id)->get();
        $section_id = $request->input('section_id');


        if ($classroom_id != "" && $section_id != "") {
            $fees = FeeType::select('id','fee_code','fee_title','fee_type','classroom_id','amount','remarks')->where('classroom_id', $classroom_id)->where('status', 1)->get();
        }


        return view('report::fee.report', compact('classrooms', 'classroom_id', 'sections', 'section_id', 'fees'));

    }


    public function guardianindex()
    {
        $guardians = Student::select('id', 'first_name', 'middle_name', 'last_name', 'guardian_id', 'relation')
            ->where('status',1)->get();
        return view('report::guardians.index', compact('guardians'));
    }

    public function guardianprofile($id)
    {
        $guardian = Student::select('id','first_name','middle_name','last_name','personal_photo','guardian_first_name', 'guardian_middle_name', 'guardian_last_name', 'guardian_phone',
            'guardian_mobile', 'guardian_occupation', 'guardian_photo','guardian_relation', 'guardian_temporary_address',
            'guardian_permanent_address', 'guardian_email')->where('id',$id)->first();



        return view('report::guardians.profile', compact('guardian'));
    }

    public function classroutineindex(Request $request)
    {
        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        $sections = Section::select('id','name')->where('status',1)->get();
        $class_id = $request->classroom_id;
        $section_id = $request->section_id;
        $routine = Routine::where('class', $class_id)->where('section', $section_id)->first();
        return view('report::classroutines.index', compact('classrooms', 'sections', 'routine'));
    }


    /**
     * @param Request $request
     * @param string $view
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function studentattendance(Request $request, $view = "")
    {
        $num_of_days = 0;
        $selected_classroom = "";
        $selected_section = "";
        $bsdate = new BsdateController();
        $today = get_nepali_date(date('Y-m-d'));
        $date = explode("-", $today);

        $month = $request->month;
        $class_id = $request->class_id;
        $section_id = $request->section_id;

        $report_data = array();
        $students = array();

        if ($month == "" || $class_id == "" || $section_id == "") {
            $month = $date[1];
        } else {
            $selected_classroom = $request->class_id;
            $selected_section = $request->section_id;
            $academic_year = AcademicsYear::select('year')
                ->orderBy('id', 'desc')
                ->where('working_status',1)
                ->first();
            $year=$academic_year->year;
            $month = $request->month;
            $num_of_days = $bsdate->get_num_of_nepali_days($year, $month);
            $from = $year . "-" . $month . "-01";
            $from = get_english_date($from);

            $to = $year . "-" . $month . "-" . $num_of_days;
            $month=explode("-", $to);
            $to = get_english_date($to);

            $query = StudentAttendance::select('date','student_id','attendance')->whereBetween('date', [$from, $to])->where('status', 1)
                ->where('session_id',get_academic_year())
                ->get();

            $query1 = Student::select('students.roll_no','students.first_name','students.middle_name','students.last_name','student_sessions.student_id')
                ->join("student_sessions", "students.id", "=", "student_sessions.student_id")
                ->where("student_sessions.classroom_id", $selected_classroom)
                ->where("student_sessions.section_id", $selected_section)
                ->where('students.status',1)
                ->orderBy('students.id', 'asc')
                ->get();



            for($i = 1; $i<=$num_of_days; $i++){
                $date = $month[0]."-".$month[1]."-".$i;
                $date = get_english_date($date);
                $attendance_value = array("0"=>"-","1"=>"P","2"=>"A","3"=>"L","4"=>"H");
                foreach($query as $data){
                    if($date == $data->date){
                        $report_data[$data->student_id][$date] = $attendance_value[$data->attendance];
                    }else{
                        if(! isset($report_data[$data->student_id][$date])){
                            $report_data[$data->student_id][$date] = $attendance_value[0];
                        }
                    }
                }
            }

            foreach($query1 as $student){
                $students[$student->student_id] = $student;
            }
        }
        $m=$request->month;
        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        $sections=Section::select('id','name')->where('status',1)->get();
        return view('report::studentattendance.index', compact('m','sections','section_id','class_id','classrooms', 'selected_classroom', 'selected_section', 'num_of_days', 'month','students','report_data'));
    }

    public function transportationreport()
    {
        $transportroutes = TransportVehicle::select('route_name','route_fare','vehicle_name','serial_number','first_name','middle_name','last_name')
            ->join('transport_routes', 'transport_routes.vehicle_id', '=', 'transport_vehicles.id')
            ->join('staffs', 'staffs.id', '=', 'transport_vehicles.driver_id')
            ->where('transport_vehicles.status', 1)
            ->get();

        return view('report::transportations.index', compact('transportroutes'));
    }

    public function transportationprofile($id)
    {
        $transport = TransportVehicle::select('route_name','route_fare','personal_photo','vehicle_name','serial_number',
            'driver_id','first_name','middle_name','last_name','transport_routes.remarks as remarks')
            ->join('transport_routes', 'transport_routes.vehicle_id', '=', 'transport_vehicles.id')
            ->join('staffs', 'staffs.id', '=', 'transport_vehicles.driver_id')
            ->where('transport_vehicles.status', 1)
            ->where('transport_vehicles.id', $id)
            ->first();

        return view('report::transportations.profile', compact('transport'));
    }

    public function examroutineindex(Request $request)
    {
        $exam_routines = ExamRoutine::select('id','exam_id','file','remarks')->where('status',1)->get();
        $exam_id = $request->input('exam_id');
        $exams = ExamList::select('id','name')->where('status',1)->get();
        $exam_routine = ExamRoutine::where('exam_id', $exam_id)->where('status', 1)->first();
        return view('report::examroutines.report', compact('exams', 'exam_routine', 'exam_routines','exam_id'));

    }

    public function studentreport(Request $request)
    {
        $classrooms = Classroom::select('id','class_name')->where('status', 1)->get();
        $classroom_id = $request->input('classroom_id');
        $sections = Section::select('id','name')->where('status',1)->where('classroom_id', $classroom_id)->get();
        $section_id = $request->input('section_id');
        $student_id = $request->student_id;

        $students = Student::where('classroom_id', $classroom_id)->where('section_id', $section_id)->where('status', 1)
            ->where('id', $student_id)->first();

        $payments_history = "";
        $invoices = [];
        if ($students) {
            $invoices = $students->invoices;

            foreach ($invoices as $invoice)
            {
                $payments_history = get_payment_history($invoice->id);
            }
        }

//                return $request;
        $student_profile = Student::where('id', $student_id)->where('status', 1)->first();
        return view('report::students.report', compact('classrooms', 'students', 'sections', 'student_profile', 'payments_history', 'invoices'));

    }


}
