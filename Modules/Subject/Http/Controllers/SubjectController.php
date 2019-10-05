<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Classroom\Entities\Classroom;
use Modules\Subject\Entities\Subject;


class SubjectController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:subject-list');
        $this->middleware('permission:subject-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subject-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subject-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subjects = Subject::select('id','subject_name','subject_code','subject_type','classroom_id','credit_hour','full_mark','pass_mark')->where('status',1)->get();
        return view('subject::subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        return view('subject::subject.create', compact('classrooms'));
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
            'subject_name' => 'required|string|max:191',
            'subject_code' => 'required|max:10|unique:subjects',
            'subject_type' => 'required',
            'classroom_id' => 'required',
            'credit_hour' => 'required',
            'full_mark' => 'required|integer|max:200',
            'pass_mark' => 'required|integer|max:200',
            'th_full_mark' => 'required|integer|max:200',
            'th_pass_mark' => 'required|integer|max:200',

        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();

            Subject::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Subject has been Added Successfully");
        return redirect(route('subject.index'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('subject::subject.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try{
        $subject = Subject::with('classrooms')->findOrFail($id);
        $classrooms = Classroom::select('id','class_name')->where('status',1)->get();
        } catch (ModelNotFoundException $e) {

            return redirect('subject')->withError("Subject with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('subject')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('subject::subject.edit', compact('classrooms', 'subject'));
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
        $subject = Subject::findOrFail($id);
} catch (ModelNotFoundException $e) {

    return redirect('subject')->withError("Subject with ID '" . $id . "' not found.");
} catch (\Exception $ex) {
    return redirect('subject')->withError("Something went wrong!! Please Contact to Service Provider");
}
        $this->validate($request, [
            'subject_name' => 'required|string|max:191',
            'subject_code' => 'required|max:10|unique:subjects,subject_code,' . $subject->id,
            'subject_type' => 'required',
            'classroom_id' => 'required',
            'credit_hour' => 'required',
            'full_mark' => 'required|integer|max:200',
            'pass_mark' => 'required|integer|max:200'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $subject->fill($input)->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Subject has been Updated Successfully");
        return redirect(route('subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {try{
        $subject = Subject::findOrFail($id);

        $subject->status = 0;
        $subject->save();
    } catch (ModelNotFoundException $e) {

        return redirect('subject')->withError("Subject with ID '" . $id . "' not found.");
    } catch (\Exception $ex) {
        return redirect('subject')->withError("Something went wrong!! Please Contact to Service Provider");
    }

        Session::flash('type', "danger");
        Session::flash('message', "Subject has been Deleted Successfully");
        return redirect('subject');
    }

    /*getting subject information*/
    public function getSubject(Request $request)
    {
        $user=Auth::user();
        $ClassroomID = $request->classroom_id;

            if($user->hasrole("Admin"))
            {
                $response = Subject::where('classroom_id', $ClassroomID)->where('status',1)->get();
                return $response;
            }
            elseif($user->hasrole("Teacher"))
            {
                $response = Subject::select('subjects.id','subjects.subject_name')
                    ->join('subject_teachers','subject_teachers.subject_id','=','subjects.id')
                    ->join('staffs','staffs.id','=','subject_teachers.teacher_id')
                    ->where('subjects.classroom_id', $ClassroomID)
                    ->where('subject_teachers.teacher_id',$user->staffs->id)
                    ->where('subjects.status',1)
                    ->get();

                return $response;
            }
//            return "null";

    }
}