<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\BsdateController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Account\Entities\FiscalYear;
use Modules\Setting\Entities\IncomeExpense;
use Modules\Setting\Entities\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
//        $setting = Setting::select('id','name','value')->first();
        return view('setting::index');
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
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('logo')) {
                $path = $request->logo->store('public');
                $data = ['name' => 'logo', 'value' => $path];
                if (Setting::where('name', 'logo')->exists()) {
                    Setting::where('name', '=', 'logo')->update($data);
                } else {


                    Setting::create($data);
                }
            }
            foreach ($_POST as $key => $value) {
                if ($key == "_token") {
                    continue;
                }

                $data = array();
                $data['value'] = $value;
                $data['updated_at'] = Carbon::now();
                if (Setting::where('name', $key)->exists()) {
                    Setting::where('name', '=', $key)->update($data);
                } else {
                    $data['name'] = $key;
                    $data['created_at'] = Carbon::now();
                    Setting::insert($data);
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "Information has been updated successfully");
        return redirect('/setting');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function data_color(Request $request)
    {
        DB::beginTransaction();
        try {
            $data_color = $request->data_color;
            Setting::where('name', 'data_color')->update(['value' => $data_color]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
    }

    public function data_background_color(Request $request)
    {
        DB::beginTransaction();
        try {
            $data_background_color = $request->data_background_color;
            Setting::where('name', 'data_background_color')->update(['value' => $data_background_color]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
    }

    public function background_image(Request $request)
    {
        DB::beginTransaction();
        try {
            $background_image = $request->background_image;
            Setting::where('name', 'background_image')->update(['value' => $background_image]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
    }

    public function refresh_graph(Request $request)
    {
        DB::beginTransaction();
        try {
            $date_range=FiscalYear::select('starting_date','ending_date')->where('working_status',1)->orderBy('id','desc')->first();
            $year1=explode('-',get_nepali_date($date_range->starting_date))[0];
            $year2=explode('-',get_nepali_date($date_range->ending_date))[0];

            $bsdate = new BsdateController();
            $profit=array();
            $loss=array();
            $info=array();

            for($i=1;$i<=12;$i++)
            {
                if($i<10)
                {
                    $i="0".$i;
                }
                $j=intval($i);
                if($i<4)
                {
                    $num_of_days= $bsdate->get_num_of_nepali_days($year2, $i);
                    $from=$year2."-".$i."-01";
                    $from=get_english_date($from);
                    $to=$year2."-".$i."-".$num_of_days;
                    $to=get_english_date($to);
                    $profit_loss=get_income_expense($from,$to);
                    $profit[$j]=$profit_loss['net_income'];
                    $loss[$j]=$profit_loss['net_expense'];
                }
                else
                {
                    $num_of_days= $bsdate->get_num_of_nepali_days($year1, $i);
                    $from=$year1."-".$i."-01";
                    $from=get_english_date($from);
                    $to=$year1."-".$i."-".$num_of_days;
                    $to=get_english_date($to);
                    $profit_loss=get_income_expense($from,$to);
                    $profit[$j]=$profit_loss['net_income'];
                    $loss[$j]=$profit_loss['net_expense'];
                }
            }

            for($i=4;$i<=12;$i++)
            {
                IncomeExpense::where('id', $i)->update(['income' => $profit[$i],'expense'=>$loss[$i]]);
            }
            for($i=1;$i<=3;$i++)
            {
                IncomeExpense::where('id', $i)->update(['income' => $profit[$i],'expense'=>$loss[$i]]);
            }

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();

        return redirect('/dashboard');
    }
}
