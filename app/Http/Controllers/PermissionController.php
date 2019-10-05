<?php

namespace App\Http\Controllers;

use App\Permission;
use App\PermissionGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list');
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'group' => 'required|unique:permissions,name',
            'guard_name' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $group = new PermissionGroup();
            $group->name = $request->group;
            $group->save();

            $input0 = $request->group;
            $inputs[0] = $input0 . "-list";
            $inputs[1] = $input0 . "-create";
            $inputs[2] = $input0 . "-edit";
            $inputs[3] = $input0 . "-delete";

            for ($i = 0; $i < 4; $i++) {
                $permission = new Permission();
                $permission->name = $inputs[$i];
                $permission->group_id = $group->id;
                $permission->guard_name = "web";
                $permission->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Permission has been added successfully");
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permissions")->where('id', $id)->delete();
        Session::flash('type', "danger");
        Session::flash('message', "Permission deleted successfully");
        return redirect()->route('permissions.index');

    }
}
