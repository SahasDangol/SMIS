<?php

namespace Modules\Others\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Others\Entities\Department;

class DepartmentController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:department-list');
        $this->middleware('permission:department-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:department-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $departments = Department::select('name', 'remarks', 'id')->where('status', 1)->get();
        return view('others::department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('others::create');
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
            'name' => 'required|string|max:191|unique:departments',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            Department::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Department has been Added Successfully");
        return redirect('departments');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('others::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'department' => Department::select('id', 'remarks', 'name')->orderBy('id', 'DESC')->get()->where('id', $id)->first(),
            'departments' => Department::select('id', 'remarks', 'name')->where('status', 1)->get()
        ];
        return view('others::department.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:100|unique:departments'
        ]);
        DB::beginTransaction();
        try {
            $department->name = $request->name;
            $department->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Department has been Updated Successfully");
        return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        $department->status = 0;
        $department->save();

        Session::flash('type', "danger");
        Session::flash('message', "Department has been Deleted Successfully");
        return redirect('departments');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|Department[]
     * @throws \Illuminate\Validation\ValidationException
     */
    public function quick(Request $request)
    {
        $this->validate($request, [
            'department_name' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            $department = new Department();
            $department->name = $request->department_name;
            $department->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        $departments = Department::select('id','remarks','name')->where('status', 1)->get();

        return $departments;
    }
}
