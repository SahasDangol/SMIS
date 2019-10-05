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
use Modules\Others\Entities\Designation;

class DesignationController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:designation-list');
        $this->middleware('permission:designation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:designation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:designation-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $designations = Designation::select('name', 'id')->where('status', 1)->get();
        return view('others::designation.index', compact('designations'));
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
            'name' => 'required|string|max:191|unique:designations',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            Designation::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Nes Designation has been Updated Successfully");
        return redirect('designations');
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
            'designation' => Designation::select('name', 'id')->orderBy('id', 'DESC')->get()->where('id', $id)->first(),
            'designations' => Designation::select('name', 'id')->where('status', 1)->get()
            ];
        return view('others::designation.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $designation = Designation::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:100|unique:departments'
        ]);
        DB::beginTransaction();
        try {
            $designation->name = $request->name;
            $designation->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Designation has been Updated Successfully");
        return redirect('designations');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $designation = Designation::find($id);

        $designation->status = 0;
        $designation->save();

        Session::flash('type', "danger");
        Session::flash('message', "Department has been Deleted Successfully");
        return redirect('designations');
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function quick(Request $request)
    {
        $this->validate($request, [
            'designation_name' => 'required|string|unique:designations',
        ]);
        DB::beginTransaction();
        try {
            $designation = new Designation();
            $designation->name = $request->designation_name;
            $designation->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        $designations = Designation::select('id', 'name')->where('status', 1)->get();

        return $designations;
    }
}
