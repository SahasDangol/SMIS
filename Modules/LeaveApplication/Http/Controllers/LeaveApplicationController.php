<?php

namespace Modules\LeaveApplication\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\LeaveApplication\Entities\LeaveApplication;

class LeaveApplicationController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:student-leave-application-list');
        $this->middleware('permission:student-leave-application-create', ['only' => ['create','store']]);
        $this->middleware('permission:student-leave-application-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:student-leave-application-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $applications = LeaveApplication::where('status',1)->get();
        return view('leaveapplication::student.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('leaveapplication::student.create');
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
            'date' => 'required',
            'student_id' => 'required|max:5',
            'subject' => 'required|max:50',
            'content' => 'required',
        ]);
        DB::transaction(function() use($request) {
            $input = $request->all();
            $input['date'] = get_english_date($request->date);
//        return $input;

            LeaveApplication::create($input);
        });
        Session::flash('type', "success");
        Session::flash('message', "Your Leave Application has been sent to your Class Teacher Successfully");
        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        try{
        $application = LeaveApplication::findOrFail($id);
        $application->read_status = 1;
        $application->save();
        } catch (ModelNotFoundException $e) {

            return redirect('students_leave')->withError("Leave Application with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('students_leave')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        return view('leaveapplication::student.show',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('leaveapplication::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
