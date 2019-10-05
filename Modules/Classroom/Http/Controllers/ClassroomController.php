<?php

namespace Modules\Classroom\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Compilers\Concerns\CompilesLayouts;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Staff\Entities\Staff;
use App\Traits\StatusResponse;

class ClassroomController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, StatusResponse;

    function __construct()
    {
        $this->middleware('permission:classroom-list');
        $this->middleware('permission:classroom-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:classroom-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:classroom-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $classrooms = Classroom::select('id', 'class_name', 'remarks')->with('students')->where('status', 1)->get();
        return view('classroom::classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('classroom::classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $status = 0;
        $this->validate($request, [
            'class_name' => 'required|string|max:191|unique:classrooms,class_name,' . $status . ',status',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $classroom = Classroom::where(ucfirst('class_name'), ucfirst($request->class_name))->first();
            if ($classroom) {
                $input['status'] = 1;
                $abc = $classroom->fill($input)->save();
                if(count($classroom->sections)){
                    if ($request->section_status != 1) {
                        if($classroom->sections->where('name','Default')->first()){
                            $this->turnStatusOn($classroom->sections->where('name','Default')->first());
                        }
                        else{
                            $section = new Section();
                            $section->session_id = get_academic_year();
                            $section->classroom_id = $classroom->id;
                            $section->name = "Default";
                            $section->capacity = $request->capacity;
                            $section->remarks = $request->remarks;
                            $section->save();
                        }
                    }
                }
                else{
                    if ($request->section_status != 1) {
                        $section = new Section();
                        $section->session_id = get_academic_year();
                        $section->classroom_id = $classroom->id;
                        $section->name = "Default";
                        $section->capacity = $request->capacity;
                        $section->remarks = $request->remarks;
                        $section->save();
                    }
                }
                
            } else {
                $classroom_id = Classroom::create($input);
                if ($request->section_status != 1) {
                    $section = new Section();
                    $section->session_id = get_academic_year();
                    $section->classroom_id = $classroom_id->id;
                    $section->name = "Default";
                    $section->capacity = $request->capacity;
                    $section->remarks = $request->remarks;
                    $section->save();
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Classroom Added Successfully");
        return redirect('classrooms');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('classroom::classroom.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $classrooms = Classroom::select('id', 'class_name', 'remarks', 'section_status')->where('status', 1)->get();
        try {
            $classroom = Classroom::select('id', 'class_name', 'remarks', 'section_status')->where('status', 1)
                ->orderBy('id', 'DESC')->findOrFail($id);
        } catch (\Exception $ex) {
            return redirect('classrooms')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        try {
            $no_section = Section::select('id', 'name', 'classroom_id', 'session_id', 'class_teacher_id', 'capacity')
                ->where('classroom_id', $id)->where('status', 1)->firstOrFail();
        } catch (ModelNotFoundException $e) {

            return redirect('classrooms')->withError("Section with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('classrooms')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('classroom::classroom.edit', compact('classroom', 'classrooms', 'no_section'));

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
            $classroom = Classroom::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('classrooms')->withError("Classroom with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('classrooms')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'class_name' => 'required|string|max:100'
        ]);
        DB::beginTransaction();
        try {
            $classroom->class_name = $request->class_name;
            $classroom->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Classroom has been Updated Successfully");
        return redirect('classrooms');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $classroom = Classroom::findOrFail($id);
            $this->turnStatusOff($classroom);
            foreach ($classroom->sections as $section) {
                $this->turnStatusOff($section);
                foreach($section->students as $student){
                    $this->turnStatusOff($student);
                }
            }
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect('classrooms')->withError("Classroom with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('classrooms')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        DB::commit();
        Session::flash('type', "danger");
        Session::flash('message', "Classroom has been Deleted Successfully");
        return redirect('classrooms');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function quick(Request $request)
    {

        $this->validate($request, [
            'classroom_name' => 'required|string|max:100'
        ]);
        DB::beginTransaction();
        try {
            $class = new Classroom();
            $class->class_name = $request->classroom_name;
            $class->remarks = $request->remarks;
            $class->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();

        $classes = Classroom::select('id', 'class_name', 'remarks', 'section_status')->get();

        return $classes;
    }
}
