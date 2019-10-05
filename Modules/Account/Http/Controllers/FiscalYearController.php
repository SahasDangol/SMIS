<?php

namespace Modules\Account\Http\Controllers;

use App\Http\Controllers\BsdateController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\FiscalYear;

class FiscalYearController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:fiscal-year-list');
        $this->middleware('permission:fiscal-year-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fiscal-year-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fiscal-year-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $details = FiscalYear::select('name', 'starting_date', 'ending_date', 'remarks', 'id')->where('working_status', '1')->where('status', 1)->get();
        return view('account::fiscal.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('account::fiscal.create');
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
            'name' => 'required|string|max:191|unique:fiscal_years',
            'starting_date' => 'required|string|max:15',
            'ending_date' => 'required|string|max:15',
        ]);

        $bsdate = new BsdateController();

        $today = date('Y-m-d');

        $date = FiscalYear::select('ending_date')->where('working_status', 1)->orderBy('id', 'desc')->first();

//            $expire_time=null;

        if (empty($date)) {
            $expire_time = strtotime($today) - 1;
        } else {
            $expire = $date->ending_date;

            $expire_time = strtotime($expire);
        }
        $today_time = strtotime($today);

        if ($expire_time > $today_time) {
            Session::flash('type', "danger");
            Session::flash('message', "Sorry, Previous Fiscal Year Has not been Closed.");
            return redirect('fiscal_year');
        }

        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['starting_date'] = get_english_date($request->starting_date);
            $input['ending_date'] = get_english_date($request->ending_date);
            FiscalYear::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Fiscal Year has been Added Successfully");
        return redirect('fiscal_year');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('account::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $details = FiscalYear::select('name', 'starting_date', 'ending_date', 'remarks', 'id')->where('working_status', '1')->where('status', 1)->get();
        try {
            $fiscalyear = FiscalYear::select('name', 'starting_date', 'ending_date', 'remarks', 'id')->where('status', 1)->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('fiscal_year')->withError("Fiscal Year with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('fiscal_year')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('account::fiscal.edit', compact('details', 'fiscalyear'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $today = date('Y-m-d');

            $date = FiscalYear::select('ending_date')->where('working_status', 1)->orderBy('id', 'desc')->first();
            $expire = $date->ending_date;

            $today_time = strtotime($today);
            $expire_time = strtotime($expire);

//        if ($expire_time > $today_time) {
//            Session::flash('type', "danger");
//            Session::flash('message', "Sorry, Previous Fiscal Year Has not been Closed.");
//            return redirect('fiscal_year');
//        }

            $this->validate($request, [
                'name' => 'required|string|max:191',
                'starting_date' => 'required|string|max:15',
                'ending_date' => 'required|string|max:15',
            ]);
            $bsdate = new BsdateController();
            $fiscalyear = FiscalYear::find($id);
            $input = $request->all();
            $input['starting_date'] = $bsdate->nep_to_eng($request->starting_date);
            $input['ending_date'] = $bsdate->nep_to_eng($request->ending_date);
            $fiscalyear->fill($input);
            $fiscalyear->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Fiscal Year has been Updated Successfully");
        return redirect('fiscal_year');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $fiscalyear = FiscalYear::findOrFail($id);

            $fiscalyear->status = 0;
            $fiscalyear->save();
        } catch (ModelNotFoundException $e) {

            return redirect('fiscal_year')->withError("Fiscal Year with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('fiscal_year')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Fiscal Year has been Deleted Successfully");
        return redirect('fiscal_year');
    }
}
