<?php

namespace Modules\Student\Http\Controllers;

use App\Exceptions\CustomException;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Traits\ImageHandler;

use App\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Attendance\Entities\StudentAttendance;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Exam\Entities\MarkGrade;
use Modules\Student\Entities\Guardian;
use Modules\Student\Entities\ScholarshipItem;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\StudentSession;
use Modules\StudentFee\Entities\FeeType;
use Modules\Transport\Entities\TransportRoute;

use function MongoDB\BSON\toJSON;
use Yajra\DataTables\Facades\DataTables;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     *
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ImageHandler;


    function __construct()
    {
        $this->middleware('permission:student-list');
        $this->middleware('permission:student-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function import_view()
    {
        return view('student::student.import');
    }

    public function import(Request $request)
    {
        DB::beginTransaction();


        try {
        Excel::load(/**
         * @param $rows
         */
            $request->file('file'), function ($rows) {
            $rows = $rows->toArray();

            foreach ($rows as $row) {

//            $row['classroom_id'] = Classroom::select('id')->whereRaw('lower(class_name) like (?)', strtolower($row['classroom_id']))->first()->id;

                $class_name = Classroom::find($row['classroom_id']);

                /*retrieving section id*/
                if ($row['section_id']) {
                    $section = $row['section_id'];
                } else {
                    $section = 'default';
                }
//            $section_id = Section::select('id')->where('classroom_id', $row['classroom_id'])->where('name', $section)->first()->id;

                /*generating roll number*/
                $last_roll = count(Student::join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                    ->join('classrooms', 'classrooms.id', '=', 'students.classroom_id')
                    ->where('class_name', $class_name->class_name)
                    ->join('sections', 'sections.id', '=', 'students.section_id')
//                ->where('sections.id', $section_id)
                    ->where('sections.id', $row['section_id'])
                    ->get());
                $last_roll = $last_roll + 1;
                $roll = "stu";
//            $roll = $roll . date("Y") . $section_id . "-" . $last_roll;
                $roll = $roll . date("Y") . $row['section_id'] . "-" . $last_roll;

                /*Registering Guardian*/
                $guardian = Guardian::select('id')->where('guardian_mobile', $row['guardian_mobile'])->first();
                if (!$guardian) {
                    $users = User::create([
                        'name' => $row['guardian_first_name'] . " " . $row['guardian_middle_name'] . " " . $row['guardian_last_name'],
                        'email' => $row['guardian_mobile'],
                        'password' => Hash::make("password"),
                        'user_type' => 'Guardian',
                    ]);

                    $save = $users->assignRole('Student');
                    $guardian = new Guardian([
                        'guardian_first_name' => $row['guardian_first_name'],
                        'guardian_middle_name' => $row['guardian_middle_name'],
                        'guardian_last_name' => $row['guardian_last_name'],
                        'guardian_email' => $row['guardian_email'],
                        'guardian_phone' => $row['guardian_phone'],
                        'guardian_mobile' => $row['guardian_mobile'],
                        'guardian_temporary_address' => $row['guardian_temporary_address'],
                        'guardian_permanent_address' => $row['guardian_permanent_address'],
                        'guardian_occupation' => $row['guardian_occupation'],
                        'user_id' => $users->id,
                    ]);

                    $guardian->save();
                }

                /*registering students*/
                $student = new Student([
                    'first_name' => $row['first_name'],
                    'middle_name' => $row['middle_name'],
                    'last_name' => $row['last_name'],
//                'dob' => get_english_date($row['dob']),
                    'dob' => $row['dob'],
                    'gender' => $row['gender'],
                    'temporary_address' => $row['temporary_address'],
                    'permanent_address' => $row['permanent_address'],
                    'nationality' => $row['nationality'],
                    'religion' => $row['religion'],
                    'personal_photo' => $row['personal_photo'],
                    'blood_group' => $row['blood_group'],
                    'comments' => $row['comments'],
                    'height' => $row['height'],
                    'weight' => $row['weight'],
                    'guardian_id' => $guardian->id,
                    'relation' => $row['relation'],
                    'previous_school_name' => $row['previous_school_name'],
                    'previous_class' => $row['previous_class'],
                    'grade' => $row['grade'],
                    'file' => $row['file'],
                    'previous_school_address' => $row['previous_school_address'],
                    'previous_school_phone' => $row['previous_school_phone'],
                    'previous_school_email' => $row['previous_school_email'],
                    'route_id' => $row['route'],
                    'percentage' => $row['scholarship_percentage'],
                    'reason' => $row['reason_for_scholarship'],
                    'admission_id' => $row['admission_id'],
                    'admission_date' => $row['admission_date'],
                    'roll_no' => $roll,
                    'house_id' => $row['house_id'],
//                'section_id' => $section_id,
                    'section_id' => $row['section_id'],
                    'classroom_id' => $row['classroom_id'],
                ]);
                $student->save();

                $studentSession = new StudentSession([
                    'session_id' => get_academic_year(),
                    'student_id' => $student->id,
                    'classroom_id' => $row['classroom_id'],
//                'section_id' => $section_id,
                    'section_id' => $row['section_id'],
                    'roll' => $roll
                ]);
                $studentSession->save();
            }

        }
        );
//        } catch (CustomException $e) {
//
//
//            DB::rollback();
//
//            Session::flash('type', 'danger');
//            Session::flash('message', $e->getMessage());
//            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('type', 'danger');
            Session::flash('message', 'Error occured while uploading!! Check your file or contact service provider.');
            return redirect()->back();
        }
        DB::commit();
        Session::flash('type', 'info');
        Session::flash('message', 'Students have been imported successfully');
        return redirect('dashboard');

//
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $session_id = get_academic_year();
            $students = Student::with('student_sessions:id,student_id,roll','guardians:id,guardian_first_name,guardian_middle_name,guardian_last_name,guardian_mobile', 'classrooms:id,class_name', 'sections:id,name')
                ->whereHas('student_sessions',function ($q)use($session_id){
                    $q->where('session_id',$session_id);
                })
                ->select('id', 'classroom_id', 'section_id', 'guardian_id', 'first_name', 'middle_name', 'last_name',
                    'permanent_address', 'roll_no')->where('status', 1)->get();


            return datatables()->of($students)
                ->editColumn('roll_no', function ($row)use($session_id){
                    return $row->student_sessions->first()->roll;
                })
                ->editColumn('guardian_name', function ($row) {
                    return ucfirst($row->guardians->guardian_first_name) . ' ' . ucfirst($row->guardians->guardian_middle_name) . ' ' . ucfirst($row->guardians->guardian_last_name);
                })
                ->editColumn('full_name', function ($row) {
                    return ucfirst($row->first_name) . ' ' . ucfirst($row->middle_name) . ' ' . ucfirst($row->last_name);
                })
                ->editColumn('classroom_id', function ($row) {
                    return $row->classrooms->class_name;

                })
                ->editColumn('section_id', function ($row) {
                    return ucfirst($row->sections->name);
                })
                ->editColumn('permanent_address', function ($row) {
                    return ucfirst($row->permanent_address);
                })
                ->editColumn('guardian_mobile', function ($row) {
                    return ucfirst($row->guardians->guardian_mobile);
                })
                ->addColumn('action', function ($data) {

                    $button = '<a title="View"
            
            href="' . route('student.show', $data->id) . '" class="btn btn-link btn-info btn-just-icon like"><i title="Show" class="material-icons">dvr</i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a title="Edit"
            
            href="' . route('student.edit', $data->id) . '" class="btn btn-link btn-warning btn-just-icon edit"><i title="Edit" class="material-icons">edit</i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '

                    <button  data-token="' . csrf_token() . '" data-remote="' . route('student.destroy', $data->id) . '" class="btn btn-link btn-danger btn-just-icon btn-delete"><i class="material-icons">close</i> </button>   ';
                    $button .= '&nbsp;&nbsp;';


                    return $button;

                })
                ->rawColumns(['action'])
                ->make(true);


        }

        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        $classroom_id = $request->input('classroom_id');
        $sections = Section::select('id','name','capacity')->where('status',1)->where('classroom_id',$classroom_id)->get();
        $section_id = $request->input('section_id');
        $sections = Section::select('name', 'id', 'classroom_id')->get();
//$classes=Classroom::all();
        return view('student::student.index', compact('sections','classrooms','sections','section_id'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $sections = Section::select('id', 'name', 'capacity')->where('status', 1)->get();
        foreach ($sections as $section) {
            $students = Student::where('section_id', $section->id)->get();
        }

        foreach ($sections as $section) {
            if ($section->capacity == count($students)) {
                $sections = $sections->filter(function ($item) use ($section) {
                    return $item->id != $section->id;
                });
            }
        }

        $guardians = Guardian::select('id', 'guardian_first_name', 'guardian_middle_name', 'guardian_last_name', 'guardian_mobile')->where('status', 1)->get();
        $students = Student::select('id', 'first_name', 'middle_name', 'last_name')->where('status', 1)->get();
        $grades = MarkGrade::select('name', 'id')->where('status', 1)->get();
        $transports = TransportRoute::select('id', 'route_name')->where('status', 1)->get();
        return view('student::student.create', compact('classrooms', 'guardians', 'sections', 'transports', 'students', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //personal detail
            'personal_photo' => 'mimes:jpg,jpeg,png',
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string|max:20',
            'permanent_address' => 'required|string',
            'nationality' => 'required|string',

            //Guardian Details
            'guardian_id' => 'required',
            'relation' => 'required',

            //Health Details
            'blood_group' => 'required|string|max:10',

            //Previous School Information
            'file' => 'mimes:pdf,png,jpg,jpeg',
            'previous_school_name' => 'string|max:100',
            'previous_school_address' => 'string|max:100',
            'grade' => 'string|max:10',
            'previous_class' => 'string|max:10',

            //Official Details
            'classroom_id' => 'required|string|max:10',
            'section_id' => 'required|string|max:10',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['dob'] = get_english_date($request->dob);

            //roll number generation
            $last_roll = count(Student::select('students.id')
                ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                ->where('student_sessions.classroom_id', $request->classroom_id)
                ->where('student_sessions.section_id', $request->section_id)
                ->where('students.status', '1')
                ->get());

            $last_roll = $last_roll + 1;
            $roll = $this->makeroll($request->section_id,$last_roll);
            $input['roll_no'] = $roll;
            //roll number generation


            if ($request->hasFile('personal_photo')) {
                $original = $request->file('personal_photo');
                $path = $this->compress_and_store($original);
                $input['personal_photo'] = 'public/' . $path;
            }

            if ($file = $request->file('file')) {
                $path1 = $request->file->store('public');
                $input['file'] = $path1;
            }

            $student = Student::create($input);

            //data store in Student Session
            $this->save_student_session($student->id,$request->classroom_id,$request->section_id,$roll);

            //if any scholarship is there
            if ($request->fee_type_id != "") {
                $fee_type_ids = $request->fee_type_id;
                foreach ($fee_type_ids as $fee_type_id) {
                    $scholarship_item = new ScholarshipItem();
                    $scholarship_item->session_id = get_academic_year();
                    $scholarship_item->student_id = $student->id;
                    $scholarship_item->fee_type_id = $fee_type_id;
                    $scholarship_item->percentage = $request->percentage;
                    $scholarship_item->save();
                }
            }

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', 'success');
        Session::flash('message', 'New Student has been added successfully');
        return redirect()->route('student.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        try {
            $student = Student::findOrFail($id);
            $payments_history = collect();
            $invoices = $student->invoices;
            foreach ($invoices as $invoice) {
                foreach (get_payment_history($invoice->id) as $invoice) {
                    $payments_history->push($invoice);
                }
            }
        } catch (ModelNotFoundException $e) {
            return redirect('student')->withError("Student with id " . $id . " is not found . ");
        } catch (\Exception $ex) {
            return redirect('student')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        return view('student::student.show', compact('student', 'invoices', 'payments_history'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {
            $student = Student::findOrFail($id);

            $fee_types = FeeType::select('id', 'fee_title')->where('status', 1)->get();

            $selected_fee_types = FeeType::select('fee_types.id', 'fee_types.fee_title')
                ->join('scholarship_items', 'scholarship_items.fee_type_id', '=', 'fee_types.id')
                ->where('scholarship_items.student_id', $id)
                ->get();

            $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
            $sections = Section::select('id', 'name', 'capacity')->where('status', 1)->get();
            $guardians = Guardian::select('id', 'guardian_first_name', 'guardian_middle_name', 'guardian_last_name', 'guardian_mobile')->where('status', 1)->get();
            $students = Student::select('id', 'first_name', 'middle_name', 'last_name')->where('status', 1)->get();
            $grades = MarkGrade::select('name', 'id')->where('status', 1)->get();
            $transports = TransportRoute::select('id', 'route_name')->where('status', 1)->get();
        } catch (ModelNotFoundException $e) {
            return redirect('student')->withError("Student with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('student')->withError("Something went wrong!!Please Contact to Service Provider");
        }

        return view('student::student.edit', compact('fee_types', 'guardians', 'selected_fee_types', 'student', 'classrooms', 'sections', 'students', 'transports', 'grades'));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try {
            $student = Student::findOrFail($id);

            $old_roll=$student->roll_no;
            $old_section=$student->section_id;

            $session_id = get_academic_year();

        } catch (ModelNotFoundException $e) {

            return redirect('student')->withError("Student with ID '" . $id . "' not found . ");
        } catch (\Exception $ex) {

            return redirect('student')->withError("Something went wrong!!Please Contact to Service Provider");
        }

        $this->validate($request, [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'permanent_address' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string|max:20',
            //Guardian Details
            'guardian_id' => 'required',
            'relation' => 'required',
            //Health Details
            'blood_group' => 'required',
            //Official Details
            'file' => 'mimes:pdf,doc,docx',
        ]);
        DB::beginTransaction();
        try {
            if ($student->classroom_id != $request->classroom_id) {
                $old = StudentSession::where('student_id',$id)
                    ->where("section_id", $old_section)
                    ->where('session_id', get_academic_year());
                $old->delete();//delete all data of specific class from student session

                Student::where('id',$id)
                    ->update(['roll_no' => null]);

                $last_roll = count(Student::select('students.id')
                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                    ->where('student_sessions.classroom_id', $student->classroom_id)
                    ->where('student_sessions.section_id', $old_section)
                    ->where('student_sessions.session_id',get_academic_year())
                    ->where('students.status', '1')
                    ->get());

                $initial_roll=explode('-',$old_roll)[1];

                $this->student_roll_update($initial_roll,$last_roll,$old_section);

                $last_roll = count(Student::select('students.id')
                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                    ->where('student_sessions.classroom_id', $request->classroom_id)
                    ->where('student_sessions.section_id', $request->section_id)
                    ->where('student_sessions.session_id',get_academic_year())
                    ->where('students.status', '1')
                    ->get());

                $last_roll = $last_roll + 1;
                $roll = $this->makeroll($request->section_id,$last_roll);

                $this->save_student_session($id,$request->classroom_id,$request->section_id,$roll);

                $request['roll_no'] = $roll;
            }
            elseif ($student->section_id != $request->section_id)
            {
                $old = StudentSession::where('student_id',$id)
                    ->where("section_id", $old_section)
                    ->where('session_id', get_academic_year());
                $old->delete();//delete all data of specific class from student session

                Student::where('id',$id)
                    ->update(['roll_no' => null]);

                $last_roll = count(Student::select('students.id')
                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
//                    ->where('student_sessions.classroom_id', $student->classroom_id)
                    ->where('student_sessions.section_id', $old_section)
                    ->where('student_sessions.session_id',get_academic_year())
                    ->where('students.status', '1')
                    ->get());

                $initial_roll=explode('-',$old_roll)[1];

                $this->student_roll_update($initial_roll,$last_roll,$old_section);

                $last_roll = count(Student::select('students.id')
                    ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                    ->where('student_sessions.classroom_id', $request->classroom_id)
                    ->where('student_sessions.section_id', $request->section_id)
                    ->where('student_sessions.session_id',get_academic_year())
                    ->where('students.status', '1')
                    ->get());

                $last_roll = $last_roll + 1;
                $roll = $this->makeroll($request->section_id,$last_roll);

                $this->save_student_session($id,$request->classroom_id,$request->section_id,$roll);

                $request['roll_no'] = $roll;

            }

            $student->section_id = $request->section_id;
            $student->classroom_id = $request->classroom_id;
            $student->roll_no=$request->roll_no;

            $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;
            $student->dob = get_english_date($request->dob);
            $student->gender = $request->gender;
            $student->temporary_address = $request->temporary_address;
            $student->permanent_address = $request->permanent_address;
            $student->nationality = $request->nationality;
            $student->religion = $request->religion;


            $student->blood_group = $request->blood_group;
            $student->comments = $request->comments;
            $student->height = $request->height;
            $student->weight = $request->weight;

            $student->guardian_id = $request->guardian_id;
            $student->relation = $request->relation;

            $student->previous_school_name = $request->previous_school_name;
            $student->previous_class = $request->previous_class;
            $student->grade = $request->grade;
            $student->previous_school_address = $request->previous_school_address;
            $student->previous_school_phone = $request->previous_school_phone;
            $student->previous_school_email = $request->previous_school_email;

            $student->route_id = $request->route_id;
            $student->percentage = $request->percentage;
            $student->reason = $request->reason;
            $student->admission_id = $request->admission_id;
            $student->admission_date = $request->admission_date;

            $student->house_id = $request->house_id;

            $student->guardian_id = $request->guardian_id;
            $student->relation = $request->relation;
            if ($request->hasFile('personal_photo')) {
                $original = $request->file('personal_photo');
                $path = $this->compress_and_store($original);
                $student->personal_photo = 'public/' . $path;
            }

            if ($request->hasFile('file')) {
                $path = $request->file->store('public');
                $student->file = $path;
            }

            if(!$student->isDirty())
            {
                Session::flash('type', 'info');
                Session::flash('message', 'You need to specify a different value to update');
                return redirect()->back();
            }

            $student->save();

            $scholarshipItem = ScholarshipItem::where("student_id", $id);
            $scholarshipItem->delete();

            if ($request->fee_type_id != "") {
                $fee_type_ids = $request->fee_type_id;
                foreach ($fee_type_ids as $fee_type_id) {
                    $scholarship_item = new ScholarshipItem();
                    $scholarship_item->session_id = get_academic_year();
                    $scholarship_item->student_id = $student->id;
                    $scholarship_item->fee_type_id = $fee_type_id;
                    $scholarship_item->percentage = $request->percentage;
                    $scholarship_item->save();
                }
            }

//            dd($student);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();

//            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', 'info');

        Session::flash('message', 'Student Information has been updated');
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);

            $old_roll=$student->roll_no;
            $old_section=$student->section_id;

            $old = StudentSession::where('student_id',$id)
//                ->where("section_id", $old_section)
                ->where('session_id', get_academic_year());
            $old->delete();//delete all data of specific class from student session


            $student=Student::where('id',$id)
                ->update(['roll_no' => null,
                    'status'=>0]);

            $last_roll = count(Student::select('students.id')
                ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
//                    ->where('student_sessions.classroom_id', $student->classroom_id)
                ->where('student_sessions.section_id', $old_section)
                ->where('student_sessions.session_id',get_academic_year())
                ->where('students.status', '1')
                ->get());

//
            $initial_roll=explode('-',$old_roll)[1];
//
            $this->student_roll_update($initial_roll,$last_roll,$old_section);

//die(var_dump($last_roll));

            $student = Student::findOrFail($id);
            $student->status = 0;
            $student->save();
        } catch (ModelNotFoundException $e) {

            return redirect('student')->withError("Student with ID '" . $id . "' not found . ");
        } catch (\Exception $ex) {

            return redirect('student')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        $attendances = StudentAttendance::where('student_id', $id)->get();
        foreach ($attendances as $attendance) {
            $attendance->status = 0;
            $attendance->save();
        }
//dd($student);
        return redirect()->back()->with('danger', 'Information has been deleted');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function history()
    {
        $student = Student::select('id', 'roll_no', 'first_name', 'middle_name', 'last_name', 'classroom_id', 'grade', 'previous_school_name'
            , 'previous_class')->where('status', 1)->get();
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $grades = MarkGrade::select('id', 'name')->where('status', 1)->get();
        return view('student::student.history', compact('student', 'classrooms', 'grades'));
    }

    public function getStudent(Request $request)
    {
        $SectionID = $request->section_id;
        if ($SectionID > 0) {
            $response = Student::where('section_id', $SectionID)->get();
            return $response;
        }
        return false;
    }

    public function getInvoiceStudent(Request $request)
    {
        $classroom_id = $request->classroom_id;
        if ($classroom_id > 0) {
            $students = Student::select('students.id', 'students.first_name', 'students.middle_name', 'students.last_name', 'sections.name as section_name')
                ->join('student_sessions', 'student_sessions.student_id', '=', 'students.id')
                ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
                ->where('student_sessions.classroom_id', $classroom_id)
                ->where('student_sessions.session_id', get_academic_year())
                ->get();

            return $students;
        }
        return "false";
    }

    private function student_roll_update($from,$to,$section)
    {
        for($i=$from;$i<=$to;$i++)
        {
            $roll=$this->makeroll($section,$i+1);
            $latest_roll=$this->makeroll($section,$i);

            $stu_old = StudentSession::where('roll',$roll)
                ->where('session_id', get_academic_year())->first();

            $stu_old->update(['roll' => $latest_roll]);

            $student1 = Student::select('id')
                ->where('id', $stu_old->student_id)
                ->first();
            $student1->update(['roll_no' => null]);
            $student1->update(['roll_no' => $latest_roll]);

        }
        return true;
    }

    private function save_student_session($id, $classroom_id, $section_id, $roll)
    {
        //data store in Student Session
        $studentSession = new StudentSession();
        $studentSession->session_id = get_academic_year();
        $studentSession->student_id = $id;
        $studentSession->classroom_id = $classroom_id;
        $studentSession->section_id = $section_id;
        $studentSession->roll = $roll;
        $studentSession->save();
    }

    private function makeroll($section,$roll_no)
    {
        $roll = "stu";
        $roll = $roll . get_academic_year() . $section . "-" . $roll_no;
        return $roll;
    }

}
