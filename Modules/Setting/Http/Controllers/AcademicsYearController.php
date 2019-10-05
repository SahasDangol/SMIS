<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\BsdateController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Setting\Entities\AcademicsYear;


class AcademicsYearController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:academics-year-list');
        $this->middleware('permission:academics-year-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:academics-year-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:academics-year-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $details = AcademicsYear::select('id', 'session', 'year', 'remarks')->where('status', 1)->get();
        return view('setting::academics.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::create');
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
            'session' => 'required|string|max:191|unique:academics_years',
            'year' => 'required|string|max:191'
        ]);
        $bsdate = new BsdateController();
        $today = date('Y-m-d');

        $date = AcademicsYear::select('year')->where('working_status', 1)->orderBy('id', 'desc')->first();

        if (empty($date)) {
            $expire_time = strtotime($today) - 1;
        } else {
            $year = $date->year;

            $expire = $year . "-12-" . $bsdate->get_num_of_nepali_days($year, 12);
//                dd($expire);
            $expire = get_english_date($expire);

            $expire_time = strtotime($expire);
        }
        $today_time = strtotime($today);

        if ($expire_time > $today_time) {
            Session::flash('type', "danger");
            Session::flash('message', "Sorry, Academics Year Has not been Closed.");
            return redirect('academics_year');
        }

        DB::beginTransaction();
        try {
            $input = $request->all();
            AcademicsYear::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Session has been Added Successfully");
        return redirect('academics_year');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
//        $detail=AcademicsYear::find($id);
//$all=AcademicsYear::all()->where('status','1');
//        return view('setting::academics.edit',compact('detail','all'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return string
     */
    public function change_session($session_id)
    {
        DB::beginTransaction();
        try {
            DB::table('academics_years')->update(['working_status' => 0]);

            if ($session_id != "") {
                $detail = AcademicsYear::find($session_id);
                $detail->working_status = 1;
                $detail->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Academic Session has been Changed Successfully");
        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
//        $detail = AcademicsYear::find($id);
//        $detail->status = 0;
//        $detail->save();
//        Session::flash('type',"danger");
//        Session::flash('message',"Academics Year has been deleted Successfully");
//        return redirect('academics_year');
    }
}
