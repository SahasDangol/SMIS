<?php

namespace Modules\Student\Http\Controllers;


use App\Imports\GuardiansImport;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Student\Entities\Guardian;

class GuardianController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    function __construct()
    {
        $this->middleware('permission:guardian-list');
        $this->middleware('permission:guardian-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:guardian-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:guardian-delete', ['only' => ['destroy']]);
    }

    public function import_view()
    {
        return view('student::guardian.import');
    }

    public function import(Request $request)
    {
        Excel::import(new GuardiansImport(), request()->file('file'));
        Session::flash('type', 'success');
        Session::flash('message', 'Bulk Guardian Record has been Added Successfully');
        return redirect('/guardian');
    }

    public function index()
    {
        if (request()->ajax()) {

            $guardians = Guardian::select('id', 'guardian_first_name', 'guardian_middle_name', 'guardian_last_name',

                'guardian_mobile', 'guardian_permanent_address'
            )->where('status', 1)->get();

            return datatables()->of($guardians)
                ->editColumn('id', function ($row) {
                    return $row->id;
                })
                ->editColumn('full_name', function ($row) {
                    return ucfirst($row->guardian_first_name) . ' ' . ucfirst($row->guardian_middle_name) . ' ' . ucfirst($row->guardian_last_name);
                })
                ->editColumn('guardian_mobile', function ($row) {
                    return $row->guardian_mobile;
                })
                ->editColumn('guardian_permanent_address', function ($row) {
                    return ucfirst($row->guardian_permanent_address);
                })
                ->addColumn('action', function ($data) {

                    $button = '<a title="View"

            href="' . route('guardian.show', $data->id) . '" class="btn btn-link btn-info btn-just-icon like"><i title="Show" class="material-icons">dvr</i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a title="Edit"

            href="' . route('guardian.edit', $data->id) . '" class="btn btn-link btn-warning btn-just-icon edit"><i title="Edit" class="material-icons">edit</i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '

                    <button  data-token="' . csrf_token() . '" data-remote="' . route('guardian.destroy', $data->id) . '" class="btn btn-link btn-danger btn-just-icon btn-delete"><i class="material-icons">close</i> </button>   ';
                    $button .= '&nbsp;&nbsp;';


                    return $button;

                })
                ->rawColumns(['action'])
                ->make(true);


        }


        return view('student::guardian.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('student::guardian.create');
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
            //guardian detail

            'guardian_first_name' => 'required|string|max:20',
            'guardian_last_name' => 'required|string|max:20',
            'guardian_mobile' => 'required|max:15|unique:guardians,guardian_mobile',
            'guardian_permanent_address' => 'required|max:50',


        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            //assigning role for new students as Student
            $user['name'] = $request->guardian_first_name . " " . $request->guardian_middle_name . " " . $request->guardian_last_name;
            $user['email'] = $request->guardian_mobile;
            $user['password'] = Hash::make('password');
            $user['user_type'] = "Guardian";

            $users = User::create($user);
            $users->assignRole('Student');
            //assigning role for new students as Student

            $input['user_id'] = $users->id;

            $guardian = Guardian::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', 'success');
        Session::flash('message', 'New Guardian has been added successfully');
        return redirect()->route('guardian.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $guardian = Guardian::findOrFail($id);
            $childrens = $guardian->students;

        } catch (ModelNotFoundException $e) {
            return redirect('guardian')->withError("Guardian with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('guardian')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        return view('student::guardian.show', compact('guardian', 'childrens'));

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $guardian = Guardian::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            return redirect('guardian')->withError("Guardian with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('guardian')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        return view('student::guardian.edit', compact('guardian'));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public
    function update(Request $request, $id)
    {
        try{
        $guardian = Guardian::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('guardian')->withError("Guardian with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('guardian')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        $this->validate($request, [
            //guardian detail
            'guardian_first_name' => 'required|string|max:20',
            'guardian_last_name' => 'required|string|max:20',

            'guardian_mobile' => 'required|max:15|unique:guardians,guardian_mobile' . $guardian->id,

            'guardian_permanent_address' => 'required|max:50',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();


            $guardian->fill($input);
            $guardian->save();

            $user = User::where('id', $guardian->user_id)->first();
            $user->email = $request->guardian_mobile;
            $user->save();


        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('guardian')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        DB::commit();
        Session::flash('type', 'success');
        Session::flash('message', 'Guardian has been updated successfully');
        return redirect()->route('guardian.index');

    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        DB::beginTransaction();

        try {
            $guardian = Guardian::findOrFail($id);
            $guardian->status = 0;
            $guardian->save();

            $students = $guardian->students;
            foreach ($students as $student) {
                $student->status = 0;
                $student->save();
            }
            $user = User::where('id', $guardian->user_id)->first();
            $user->status = 0;
            $user->save();

        } catch (ModelNotFoundException $e) {
            DB::rollback();
            return redirect('guardian')->withError("Guardian with ID '" . $id . "' not found . ");
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect('guardian')->withError("Something went wrong!!Please Contact to Service Provider");
        }
        DB::commit();


        Session::flash('type', 'success');
        Session::flash('message', 'Guardian and Student has been deleted successfully');

        return redirect()->back();
    }


    public function quick(Request $request)
    {
        try {
            $this->validate($request, [
//                'guardian_first_name' => 'required|string|max:20',
//                'guardian_last_name' => 'required|string|max:20',
                'guardian_mobile' => 'required|max:15|unique:guardians,guardian_mobile',
//                'guardian_permanent_address' => 'required|max:50',
            ]);
        } catch (ValidationException $e) {

            $datas = [
                'message' => "The Number " . $request->guardian_mobile . " has been already used by Other Guardian",
            ];
            return response()->json($datas,500);
        }


        DB::beginTransaction();
        try {
            //assigning role for new students as Student
            $user['name'] = $request->guardian_first_name . " " . $request->guardian_middle_name . " " . $request->guardian_last_name;
            $user['email'] = $request->guardian_mobile;
            $user['password'] = Hash::make("password");

            $users = User::create($user);
            $users->assignRole('Student');

            $guardian = new Guardian();
            $guardian->guardian_first_name = $request->guardian_first_name;
            $guardian->guardian_middle_name = $request->guardian_middle_name;
            $guardian->guardian_last_name = $request->guardian_last_name;
            $guardian->guardian_email = $request->guardian_email;
            $guardian->guardian_phone = $request->guardian_phone;
            $guardian->guardian_mobile = $request->guardian_mobile;
            $guardian->guardian_temporary_address = $request->guardian_temporary_address;
            $guardian->guardian_permanent_address = $request->guardian_permanent_address;
            $guardian->guardian_occupation = $request->guardian_occupation;
            $guardian->user_id = $users->id;
            $guardian->save();

        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
                'message' => "Something went wrong!!Please Contact to Service Provider",
            ],500);

        }
        DB::commit();
        return response()->json([
            'guardian_id' => $guardian->id,
        ],200);
    }
}
