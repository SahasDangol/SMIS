<?php

namespace Modules\Attendance\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Attendance\Entities\StaffAttendance;
use Modules\Staff\Entities\Staff;

class StaffAttendanceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:staff-attendance-list');
        $this->middleware('permission:staff-attendance-create',['only' => ['create', 'store']]);
        $this->middleware('permission:staff-attendance-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:staff-attendance-delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('attendance::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $staffs = Staff::where('status',1)->paginate(50);
        $attendance = StaffAttendance::where('date',Carbon::today()->toDateString())->get();
//        dd($attendance);
        return view('attendance::teacher.create',compact('staffs','attendance'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $id = $request['id'];
        $status = $request['status'];
        $date = Carbon::today()->toDateString();
        try{
            $attendance = StaffAttendance::where('staff_id',$id)->where('date',$date)->first();

            if( $attendance){
                if ($attendance->attendance != $status ){
                    $attendance->attendance = $status;
                    $attendance->save();
                }
            }
            else{
                StaffAttendance::create([
                    'session_id'=> get_academic_year(),
                    'staff_id'=>$id,
                    'attendance'=>$status,
                    'date'=>$date,
                ]);
            }
        } catch(\Exception $e){
            return response()->json([
                'success' => 'false',
                'errors'  => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'success'=> 'true'
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('attendance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('attendance::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
