<?php

namespace Modules\Staff\Http\Controllers;

use App\Exports\HrExport;
use App\Imports\HrImport;
use App\Traits\ImageHandler;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Exam\Entities\MarkGrade;
use Modules\Others\Entities\Department;
use Modules\Others\Entities\Designation;

use Illuminate\Validation\Validator;
use Modules\Staff\Entities\Staff;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ImageHandler;

    function __construct()
    {
        $this->middleware('permission:hr-list');
        $this->middleware('permission:hr-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:hr-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:hr-delete', ['only' => ['destroy']]);
    }

    public function export()
    {
        return Excel::download(new HrExport, 'hr.xlsx');
    }

    public function import_view()
    {
        return view('staff::staff.import');
    }

    public function import(Request $request)
    {


        Excel::import(new HrImport(), request()->file('file'));
        Session::flash('type', 'success');
        Session::flash('message', 'Bulk Staff Record has been Added Successfully');
        return redirect('/staff');
    }

    public function index(Request $request)
    {
//        $staffs = Staff::with('designations:id,name', 'departments:id,name')->select('id', 'personal_photo', 'mobile', 'first_name', 'middle_name', 'last_name',
//            'email', 'blood_group', 'joining_date', 'department_id', 'designation_id','staff_id')->where('status', 1)
//            ->where('is_activated', 1)
//            ->get();

        if (request()->ajax()) {


            return datatables()->of(Staff::with('departments:id,name','designations:id,name')->select('id',
                'personal_photo','staff_id','department_id','first_name','middle_name','last_name',
                'designation_id','mobile','email','blood_group','joining_date')->where('status',1)
                ->where('is_activated',1)->get())

                ->editColumn('full_name', function($row) {
                    return ucfirst($row->first_name) . ' ' . ucfirst($row->middle_name) . ' ' . ucfirst($row->last_name);
                })
                ->editColumn('department', function($row) {
                    return ucfirst($row->departments->name);
                })
                ->editColumn('designation', function($row) {
                    return ucfirst($row->designations->name);

                })


                ->addColumn('action', function ($data) {
                    $button = '<a title="View"
            
            href="' . route('staff.show', $data->id) . '" class="btn btn-link btn-info btn-just-icon like"><i title="Show" class="material-icons">dvr</i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a title="Edit"
            
            href="' . route('staff.edit', $data->id) . '" class="btn btn-link btn-warning btn-just-icon edit"><i title="Edit" class="material-icons">edit</i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '
                   
                     <button  data-token="'. csrf_token().'" data-remote="'. route('staff.destroy', $data->id) .'" class="btn btn-link btn-danger btn-just-icon btn-delete"><i class="material-icons">close</i> </button>   ';

$button .='&nbsp;&nbsp;';
                    return $button;

                })

                ->rawColumns(['action'])
                ->setRowId(function ($data) {
                    return 'row-'. + $data->id;
                })
                ->make(true);



        }
        return view('staff::staff.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $grades = MarkGrade::select('id', 'name')->where('status', 1)->get();
        $designations = Designation::select('id', 'name')->where('status', 1)->get();
        $departments = Department::select('id', 'name')->where('status', 1)->get();
        return view('staff::staff.create', compact('grades', 'designations', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'permanent_address' => 'required|string',
            'nationality' => 'required|string',
            'citizenship_no' => 'required|string',
            'citizenship_photo' => 'required|image|mimes:jpg,jpeg,png',
            'personal_photo' => 'required|image|mimes:jpg,jpeg,png',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:staffs,email',
            'marital_status' => 'required|string',
            'father_first_name' => 'required|string|max:20',
            'father_last_name' => 'required|string|max:20',
            'father_mobile' => 'required|string|max:15',
            'mother_first_name' => 'required|string|max:20',
            'mother_last_name' => 'required|string|max:20',
            'blood_group' => 'required|string|max:10',
            'designation_id' => 'required|string|max:20',
            'department_id' => 'required|string|max:20',
            'higher_education_degree' => 'required|string|max:50',
            'grade' => 'required|string|max:20',
        ]);


        $staff_count = count(Staff::select('id')->get()) + 1;
        $hr_id = "hr" . date("Y") . "-" . $staff_count;
        $date = date("Y-M-d");
        DB::beginTransaction();
        try {

            $input = $request->all();

            $input['staff_id'] = $hr_id;

            $input['dob'] = get_english_date($request->dob);

            $input['joining_date'] = $date;

            if ($request->hasFile('citizenship_photo')) {
                $original = $request->file('citizenship_photo');
                $path = $this->compress_and_store($original);
                $input['citizenship_photo'] = 'public/' . $path;
            }

            if ($request->hasFile('personal_photo')) {
                $original = $request->file('personal_photo');
                $path = $this->compress_and_store($original);
                $input['personal_photo'] = 'public/' . $path;
            }

            //assigning role for new students as Staff
            $user['name'] = $request->first_name . " " . $request->middle_name . " " . $request->last_name;
            $user['email'] = $request->email;
            $user['password'] = Hash::make($hr_id);


            $role_name = Designation::where('id', $request->designation_id)->first();
            $user['user_type'] = $role_name->name;
            $user = User::create($user);
            $user->assignRole($role_name->name);
            $user = $user->toArray();


            $user['link'] = str_random(30);
            DB::table('users_activations')->insert(['id_staff' => $user['id'], 'token' => $user['link']]);


            /* Mail::send('staff::staff.mail.activation', $user, function ($message) use ($user) {
                 $message->to($user['email']);
                $message->subject('SMIS-Activation Code');
             });*/

            $input['user_id'] = $user['id'];
            Staff::create($input);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', 'success');
        Session::flash('message', 'Staff Created Successfully');
//        Session::flash('message', 'We sent activation code, please check your email');

        return redirect()->route('staff.index');


    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        try {
            $staff = Staff::select('*')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('staff')->withError("Staff with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('staff')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('staff::staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {
            $staff = Staff::findOrFail($id);

            $designations = Designation::select('id', 'name')->where('status', 1)->get();
            $departments = Department::select('id', 'name')->where('status', 1)->get();
            $grades = MarkGrade::select('id', 'name')->where('status', 1)->get();
        } catch (ModelNotFoundException $e) {

            return redirect('staff')->withError("Staff with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('staff')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('staff::staff.edit', compact('staff', 'departments', 'designations', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try{
        $staff = Staff::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('staff')->withError("Staff with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('staff')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'dob' => 'required|string',
            'gender' => 'required|string',
            'permanent_address' => 'required|string',
            'nationality' => 'required|string',
            'citizenship_no' => 'required|string',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:staffs,email,' . $staff->id,
            'marital_status' => 'required|string',
            'father_first_name' => 'required|string|max:20',
            'father_last_name' => 'required|string|max:20',
            'father_mobile' => 'required|string|max:15',
            'mother_first_name' => 'required|string|max:20',
            'mother_last_name' => 'required|string|max:20',
            'blood_group' => 'required|string|max:10',
            'designation_id' => 'required|string|max:20',
            'department_id' => 'required|string|max:20',
            'higher_education_degree' => 'required|string|max:50',
            'grade' => 'required|string|max:20',
        ]);
        DB::beginTransaction();
        try {
            if ($file = $request->file('citizenship_photo')) {
                $path = $request->citizenship_photo->store('public');
                $input['citizenship_photo'] = $path;
            } else {
                $input['citizenship_photo'] = $staff->citizenship_photo;
            }
            if ($file = $request->file('personal_photo')) {
                $path1 = $request->personal_photo->store('public');
                $input['personal_photo'] = $path1;
            } else {
                $input['personal_photo'] = $staff->personal_photo;
            }

            $staff->first_name = $request->first_name;
            $staff->middle_name = $request->middle_name;
            $staff->last_name = $request->last_name;
            $staff->dob = get_english_date($request->dob);
            $staff->gender = $request->gender;
            $staff->temporary_address = $request->temporary_address;
            $staff->permanent_address = $request->permanent_address;
            $staff->nationality = $request->nationality;
            $staff->citizenship_no = $request->citizenship_no;

            $staff->phone = $request->phone;
            $staff->mobile = $request->mobile;
            $staff->email = $request->email;
            $staff->marital_status = $request->marital_status;


            $staff->father_first_name = $request->father_first_name;
            $staff->father_middle_name = $request->father_middle_name;
            $staff->father_last_name = $request->father_last_name;
            $staff->father_phone = $request->father_phone;
            $staff->father_mobile = $request->father_mobile;
            $staff->father_occupation = $request->father_occupation;


            $staff->mother_first_name = $request->mother_first_name;
            $staff->mother_middle_name = $request->mother_middle_name;
            $staff->mother_last_name = $request->mother_last_name;
            $staff->mother_phone = $request->mother_phone;
            $staff->mother_mobile = $request->mother_mobile;
            $staff->mother_occupation = $request->mother_occupation;


            $staff->blood_group = $request->blood_group;
            $staff->comments = $request->comments;


            $staff->designation_id = $request->designation_id;
            $staff->department_id = $request->department_id;


            $staff->higher_education_degree = $request->higher_education_degree;
            $staff->grade = $request->grade;
            $staff->institution = $request->institution;
            $staff->institution_address = $request->institution_address;


            $staff->institution_name = $request->institution_name;
            $staff->address = $request->address;
            $staff->work_duration = $request->work_duration;
            $staff->reason_to_leave = $request->reason_to_leave;


            $staff->training_title = $request->training_title;
            $staff->training_duration = $request->training_duration;
            $staff->training_institution_name = $request->training_institution_name;


            if ($request->hasFile('citizenship_photo')) {
                $original = $request->file('citizenship_photo');
                $path = $this->compress_and_store($original);
                $staff->citizenship_photo = 'public/' . $path;
            }
            if ($request->hasFile('personal_photo')) {
                $original = $request->file('personal_photo');
                $path = $this->compress_and_store($original);
                $staff->personal_photo = 'public/' . $path;
            }

            $staff->save();
            //assigning role for new students as Staff
            $user = User::find($staff->user_id);
            $user['name'] = $staff->first_name . " " . $staff->middle_name . " " . $staff->last_name;
            $user['email'] = $staff->email;
            $user['password'] = $user->password;


            $role_name = Designation::where('id', $staff->designation_id)->first();
            $user['user_type'] = $role_name->name;

            $user->fill($user->toArray());


            $user->save();

            $user->assignRole($role_name->name);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', 'success');
        Session::flash('message', 'Information has been updated');
        return redirect('staff');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $staff = Staff::findOrFail($id);
        $staff->status = 0;
        $staff->save();
            $data = array(
                [
                    'success' => true,
                    'message'=> 'Your AJAX processed correctly',
                    'data'=>'Some data'
                ]
            ) ;
//            Session::flash('type', 'danger');
//        Session::flash('message', 'Information has been deleted');
//            return redirect()->back();

            return response()->json(array($data),200);

        } catch (ModelNotFoundException $e) {

            return redirect('staff')->withError("Staff with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('staff')->withError("Something went wrong!! Please Contact to Service Provider");
        }
//        $response = ['status' => 'success', 'msg' => 'Staff Record Deleted!,' .  $staff->first_name . 'Staff Record was successfully deleted.'];
//        Session::flash('type', 'danger');
//        Session::flash('message', 'Information has been deleted');

//        return response()->json($response);

//        return redirect()->back();
    }


    public function userActivation($token)
    {
        $check = DB::table('users_activations')->where('token', $token)->first();

        if (!is_null($check)) {

            $user = Staff::where('user_id', $check->id_staff)->first();

            if ($user->is_activated == 1) {

                Session::flash('type', 'success');
                Session::flash('message', 'User Already Activated');
                return redirect('dashboard');
            }
            $user->update(['is_activated' => 1]);
            DB::table('users_activations')->where('token', $token)->delete();
            Session::flash('type', 'success');
            Session::flash('message', 'User Activated Successfully');
            return redirect('dashboard');

        }
        Session::flash('type', 'warning');
        Session::flash('message', 'Your Token is Invalid');
        return redirect('staff');
    }
}
