<?php

namespace Modules\Syllabus\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Classroom\Entities\Classroom;
use Modules\Syllabus\Entities\Syllabus;


class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:syllabus-list');
        $this->middleware('permission:syllabus-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:syllabus-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:syllabus-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $syllabus = Syllabus::select('id', 'classroom_id', 'title')->where('status', 1)->get();

        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        return view('syllabus::syllabus.index', compact('syllabus', 'classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $classroom = Classroom::select('id', 'class_name')->where('status', 1)->get();

        return view('syllabus::syllabus.create')->with('classroom', $classroom);
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
            'title' => 'required|string|max:50',
            'classroom_id' => 'required|string|max:10',

            'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            if ($file = $request->file('file')) {
                $path = $request->file->store('public');
                $input['file'] = $path;
            }

            Syllabus::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Syllabus has been Added Successfully");
        return redirect()->route('syllabus.index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $syllabus = Syllabus::select('*')->where('syllabus.id', $id)->first();

        return view('syllabus::syllabus.show', compact('syllabus'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {
            $classroom = Classroom::select('id', 'class_name')->where('status', 1)->get();


            $syllabus = Syllabus::select('id', 'classroom_id', 'title', 'file', 'description')->orderBy('id', 'DESC')
                ->where('status', 1)->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('syllabus')->withError("Syllabus with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('syllabus')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('syllabus::syllabus.edit', compact('syllabus', 'classroom'));


    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try {
            $syllabus = Syllabus::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            return redirect('syllabus')->withError("Syllabus with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('syllabus')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'classroom_id' => 'required|string|max:10',
        ]);
        DB::beginTransaction();
        try {
            $syllabus->title = $request->title;
            $syllabus->classroom_id = $request->classroom_id;
            $syllabus->description = $request->description;
            if ($request->hasFile('file')) {
                $path = $request->file->store('public');
                $syllabus->file = $path;
            }
            $syllabus->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Syllabus has been Updated Successfully");
        return redirect('syllabus');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)

    {
        try {
            $syllabus = Syllabus::findOrFail($id);
            $syllabus->status = 0;
            $syllabus->save();
        } catch (ModelNotFoundException $e) {

            return redirect('syllabus')->withError("Syllabus with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('syllabus')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Syllabus has been Deleted Successfully");
        return redirect('syllabus');
    }
}