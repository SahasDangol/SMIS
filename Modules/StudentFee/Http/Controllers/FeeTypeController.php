<?php

namespace Modules\StudentFee\Http\Controllers;

use Carbon\Carbon;
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
use Modules\StudentFee\Entities\FeeType;
use Modules\StudentFee\Entities\FeeTypeStatus;

class FeeTypeController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:studentfee-list');
        $this->middleware('permission:studentfee-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:studentfee-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:studentfee-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $feetypes = FeeType::all();
        $classrooms = Classroom::all();
        return view('studentfee::feetype.index', compact('feetypes', 'classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('studentfee::feetype.index');
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
            'fee_title' => 'required|string|max:50',
            'fee_type' => 'required',
            'classroom_id' => 'required',
            'fee_code' => 'required|max:6',
            'amount' => 'required|max:6'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $months = collect(['Baishak', 'Jestha', 'Ashad', 'Shrawan', 'Bhadra', 'Ashwin',
                'Kartik', 'Mangsir', 'Poush', 'Magh', 'Falgun', 'Chaitra']);
            $quarters = collect(['First', 'Second', 'Third', 'Final']);
            if ($request->fee_type == "monthly") {
                foreach ($months as $month) {
                    $input['fee_title'] = $month . ' ' . $request->fee_title;
                    $input['session_id'] = get_academic_year();
                    $fee_type = FeeType::create($input);
                    FeeTypeStatus::create(
                        [
                            'fee_type_id' => $fee_type->id,
                            'session_id' => get_academic_year(),
                        ]
                    );
                }
            } elseif ($request->fee_type == "quarterly") {
                foreach ($quarters as $quarter) {
                    $input['fee_title'] = $quarter . ' ' . $request->fee_title;
                    $input['session_id'] = get_academic_year();
                    $fee_type = FeeType::create($input);
                    FeeTypeStatus::create(
                        [
                            'fee_type_id' => $fee_type->id,
                            'session_id' => get_academic_year(),
                        ]
                    );
                }
            } else {
                $input['session_id'] = get_academic_year();
                $fee_type = FeeType::create($input);
                FeeTypeStatus::create(
                    [
                        'fee_type_id' => $fee_type->id,
                        'session_id' => get_academic_year(),
                    ]
                );
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Feetype has been Updated Successfully");
        return redirect('feetypes');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('studentfee::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {
            $feetype = FeeType::orderBy('id', 'DESC')->findOrFail($id);

        } catch (ModelNotFoundException $e) {

            return redirect('feetypes')->withError("FeeType with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('feetypes')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $feetypes = FeeType::all();

        return view('studentfee::feetype.edit', compact('feetype', 'feetypes'));
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
            $feetype = FeeType::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('feetypes')->withError("FeeType with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('feetypes')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'fee_type' => 'required|string|max:10',
            'fee_code' => 'required|max:6',
            'amount' => 'required|max:6'
        ]);
        DB::beginTransaction();
        try {
            $feetype->fee_type = $request->fee_type;
            $feetype->amount = $request->amount;
            $feetype->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Feetype has been Updated Successfully");

        return redirect('feetypes');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $feetype = FeeType::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('feetypes')->withError("FeeType with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('feetypes')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $feetype->status = 0;
        $feetype->save();
        Session::flash('type', "danger");
        Session::flash('message', "Feetype has been Deleted Successfully");
        return redirect('feetypes');
    }

    public function get_fee_amount(Request $request)
    {
        $FeeTypeID = $request->feetype_id;
        if ($FeeTypeID > 0) {
            $response = FeeType::select('amount')->where('id', $FeeTypeID)->first();
            return $response->amount;
        }
        return false;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|FeeType[]
     * @throws \Illuminate\Validation\ValidationException
     */
    public function quick(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|string|max:10|unique:fee_types',
            'type' => 'required|string|max:15',
            'amount' => 'required|numeric'
        ]);
        DB::beginTransaction();
        try {
            $fee = new FeeType();
            $fee->fee_code = $request->id;
            $fee->fee_type = $request->type;
            $fee->amount = $request->amount;
            $fee->note = $request->note;
            $fee->save();

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        $fees = FeeType::all();

        return $fees;
    }

    public function getFeeTypes(Request $request)
    {
        $ClassroomID = $request->classroom_id;
//        console.log($ClassroomID);
        if ($ClassroomID > 0) {
            $response = FeeType::whereHas('fee_type_status', function ($query) {
                $query->where('status', '0');
            })->where('classroom_id', $ClassroomID)->get();
            return $response;
        }
        return "no data";
    }
}
