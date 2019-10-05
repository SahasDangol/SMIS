<?php

namespace Modules\Routine\Http\Controllers;

use App\Traits\ImageHandler;
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
use Modules\Classroom\Entities\Section;
use Modules\Routine\Entities\Routine;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ImageHandler;

    function __construct()
    {
        $this->middleware('permission:routine-list');
        $this->middleware('permission:routine-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:routine-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:routine-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $classrooms = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $sections = Section::select('id', 'name')->where('status', 1)->get();
        $routine = Routine::select('id', 'classroom_id', 'section_id')->where('status', 1)->get();
        return view('routine::routines.index', compact('routine', 'classrooms', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $classroom = Classroom::select('id', 'class_name')->where('status', 1)->get();
        $section = Section::select('id', 'name')->where('status', 1)->get();
        return view('routine::routines.create')->with('classroom', $classroom)->with('section', $section);
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
            'classroom_id' => 'required',
            'section_id' => 'required',
            'routine_photo' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            if ($request->hasFile('routine_photo')) {
                $original = $request->file('routine_photo');
                $path = $this->compress_and_store($original);
                $input['routine_photo'] = 'public/' . $path;
            }

            Routine::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Routine Added Successfully");

        return redirect()->route('routines.index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $routine = Routine::select('*')->where('routine.id', $id)->first();

        return view('routine::routines.show', compact('routine'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try{

            $classroom = Classroom::select('id', 'class_name')->where('status', 1)->get();


            $routine = Routine::select('id', 'classroom_id', 'section_id', 'routine_photo')->orderBy('id', 'DESC')->where('status', 1)->findOrFail($id);
            $section = Section::select('id', 'name')->where('status', 1)->where('classroom_id', $routine->classroom_id)->get();
        } catch (ModelNotFoundException $e) {

            return redirect('routines')->withError("Routine with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('routines')->withError("Something went wrong!! Please Contact to Service Provider");
        }
            return view('routine::routines.edit', compact('routine', 'classroom', 'section'));



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
        $routine = Routine::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('routines')->withError("Routine with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('routines')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'classroom_id' => 'required',
            'section_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('routine_photo')) {
                $original = $request->file('routine_photo');
                $path = $this->compress_and_store($original);
                $routine->routine_photo = 'public/' . $path;
            }
            $routine->classroom_id = $request->classroom_id;
            $routine->section_id = $request->section_id;
            $routine->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Routine Updated Successfully");
        return redirect('routines');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)

    {
        try{
        $routine = Routine::findOrFail($id);
        $routine->status = 0;
        $routine->save();
        } catch (ModelNotFoundException $e) {

            return redirect('routines')->withError("Routine with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('routines')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return redirect()->back()->with('danger', 'Information has been deleted');
    }
}
