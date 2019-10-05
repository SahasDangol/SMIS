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
use Illuminate\Validation\Rule;
use Modules\Classroom\Entities\Classroom;
use Modules\Classroom\Entities\Section;
use Modules\Staff\Entities\Staff;
use Modules\Subject\Entities\OptionalSubjectAssign;

class SectionController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:section-list');
        $this->middleware('permission:section-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:section-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:section-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $classrooms =Classroom::select('id','class_name')->where('section_status',1)->where('status',1)->get();

        $sections = Section::where('sections.status',1)->with('classrooms','class_teachers')
            ->get();

        return view('classroom::section.index',compact('sections','classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('classroom::create');
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
            'name' => ['required',
                Rule::unique('sections')->where(function ($query) use ($request) {
                    $query->where('classroom_id', $request->classroom_id);
                }),
            ],
            'capacity' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['session_id'] = get_academic_year();
            Section::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Section has been Added Successfully");
        return redirect('sections');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('classroom::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
//        try{

            $section =Section::select('*','sections.id as section_id','classrooms.id as classroom_id')
                ->join('classrooms', 'classrooms.id', '=', 'sections.classroom_id')

                ->where('sections.status',1)
                ->findOrFail($id);
//        } catch (ModelNotFoundException $e) {
//
//            return redirect('sections')->withError("Section with ID '" . $id . "' not found.");
//        } catch (\Exception $ex) {
//            return redirect('sections')->withError("Something went wrong!! Please Contact to Service Provider");
//        }
            $classrooms = Classroom::select('id','class_name')->where('section_status',1)->where('status',1)->get();
            $sections = Section::select('class_name','sections.name as name','sections.remarks as remarks','capacity',
                'sections.id AS id',
                'staffs.first_name','staffs.middle_name','staffs.last_name','sections.id AS id')
                ->join('classrooms','classrooms.id','=','sections.classroom_id')
                ->join('staffs','staffs.id','=','sections.class_teacher_id')
                ->where('sections.status',1)
                ->get();

        return view('classroom::section.edit',compact('section','classrooms','sections'));
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
        $section = Section::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('sections')->withError("Section with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('sections')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'classroom_id' => 'required',
            'name' => 'required|string|max:15',
        ]);
        DB::beginTransaction();
        try {
            $section->classroom_id = $request->classroom_id;
            $section->session_id = get_academic_year();
            $section->name = $request->name;
            $section->capacity = $request->capacity;
            $section->class_teacher_id = $request->class_teacher_id;
            $section->save();

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();


        Session::flash('type',"info");
        Session::flash('message',"Section has been Updated Successfully");

        return redirect('sections');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $section = Section::findOrFail($id);

        $section->status = 0;
        $section->save();
        } catch (ModelNotFoundException $e) {

            return redirect('sections')->withError("Section with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('sections')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type',"info");
        Session::flash('message',"Section has been Deleted Successfully");

        return redirect('sections');
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function assignClassTeacher()
    {
        $sections = Section::with('class_teachers:id,staff_id,first_name,middle_name,last_name')->select('id','name','class_teacher_id','classroom_id')
            ->with(['classrooms' => function($query) {
                $query->select('id','class_name');
            }])
            ->where('session_id',get_academic_year())
            ->where('status',1)
            ->get();

        $teachers = Staff::select('first_name','middle_name','last_name','id','staff_id')
            ->where('status',1)
            ->whereHas('designations',function($query){
                $query->where('name','teacher')->where('status',1)->orWhere('name','Teacher');
            })
            ->get();

        $assigned_teachers=Staff::select('staffs.first_name','staffs.middle_name','staffs.last_name','staffs.id as staff_id','sections.id')
            ->join('sections','sections.class_teacher_id','=','staffs.id')
            ->where('staffs.status',1)
            ->get();

        foreach ($teachers as $check)
        {
            foreach($sections as $check1) {
                if ($check1->class_teacher_id == $check->id) {
                    $teachers = $teachers->filter(function ($item) use ($check1) {
                        return $item->id != $check1->class_teacher_id;
                    });
                }
            }
        }

        return view('classroom::assign_class_teacher.index', compact('sections','teachers','assigned_teachers'));
    }

    /**
     * Update class teacher for each section.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeClassTeacher(Request $request)
    {

        $sections = Section::select('id','classroom_id','session_id','class_teacher_id','capacity','name','status')->where('session_id',get_academic_year())->get();
//        DB::beginTransaction();
//        try {
            $i=1;
//            dd($request->all());
            foreach ($sections as $section){
//dd($request['select_'.$i]);
                if($request['select_'.$i]==null)
                {

                    $section->class_teacher_id=null;
                    $section->save();
                }
                else{

                    $id=explode('-',$request['select_'.$i])[1];

                    if ($section->class_teacher_id==$id){
                        echo "\nalready assign bhai sakyo ";
                    }
                    else{
                        $section->class_teacher_id=$id;

                        $section->save();

                    }
                }
                $i++;
            }


//        } catch (\Exception $e) {
//dd($e->getMessage());
//            DB::rollback();
//            return back()->withError($e->getMessage())->withInput();
//        }
//        DB::commit();

        Session::flash('type',"info");
        Session::flash('message',"Class Teachers has been Updated Successfully");
        return redirect('sections');
    }


    /*getting section information*/
    public function getSection(Request $request)
    {
        $ClassroomID = $request->classroom_id;
        if ($ClassroomID > 0) {
            $response = Section::select('id','classroom_id','session_id','class_teacher_id','capacity','name','status')->where('classroom_id',$ClassroomID)->get();

            return $response;
        }
        return false;
    }
    public function getUnassignedSection(Request $request)
    {
        $ClassroomID = $request->classroom_id;
        if ($ClassroomID > 0) {
            $sections = Section::select('id','classroom_id','session_id','class_teacher_id','capacity','name','status')->where('classroom_id',$ClassroomID)->get();
            foreach ($sections as $section){
                if ($section->students->first()){
                    if (OptionalSubjectAssign::where('student_id',$section->students->first()->id)->first()){
                        $sections = $sections->filter(function($item) use($section){
                            return $item->id != $section->id;
                        });
                    }
                }
            }
            return $sections;
        }
        return false;
    }
}
