<?php

namespace Modules\Transport\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Staff\Entities\Staff;
use Modules\Transport\Entities\TransportVehicle;

class TransportVehicleController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:vehicle-list');
        $this->middleware('permission:vehicle-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:vehicle-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:vehicle-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $drivers = Staff::select('staffs.id as driver_id', 'first_name', 'middle_name', 'last_name', 'designations.name as designations', 'designations.id as designation_id')
            ->join('designations', 'designations.id', '=', 'staffs.designation_id')
            ->where('designations.name', 'Driver')
            ->get();

        $assigned_driver = TransportVehicle::select('driver_id', 'status')->where('status', 1)->get();

        foreach ($drivers as $check) {
            foreach ($assigned_driver as $check1) {
                if ($check->driver_id == $check1->driver_id) {
                    $drivers = $drivers->filter(function ($item) use ($check1) {
                        return $item->driver_id != $check1->driver_id;
                    });
                }
            }
        }

        $vehicles = TransportVehicle::select('vehicle_name', 'serial_number', 'transport_vehicles.id as vehicle_id', 'staffs.first_name as first_name', 'staffs.middle_name as middle_name', 'staffs.last_name as last_name')
            ->join('staffs', 'staffs.id', '=', 'transport_vehicles.driver_id')
            ->where('transport_vehicles.status', 1)
            ->get();

        return view('transport::vehicle.index', compact('drivers', 'vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('transport::create');
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
            'vehicle_name' => 'required|string',
            'serial_number' => 'required|string|max:15',
            'driver_id' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();


            TransportVehicle::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Transportation Vehicle has been Added Successfully");
        return redirect('transports/vehicles');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('transport::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {
            $drivers = Staff::select('staffs.id as staff_id', 'first_name', 'middle_name', 'last_name', 'designations.name as designations', 'designations.id as designation_id')
                ->join('designations', 'designations.id', '=', 'staffs.designation_id')
                ->where('designations.name', 'Driver')
                ->get();

            $vehicle = TransportVehicle::select('transport_vehicles.driver_id', 'transport_vehicles.vehicle_name', 'transport_vehicles.serial_number', 'transport_vehicles.id as vehicle_id', 'staffs.first_name as first_name', 'staffs.middle_name as middle_name', 'staffs.last_name as last_name')
                ->join('staffs', 'staffs.id', '=', 'transport_vehicles.driver_id')
                ->findOrFail($id);

            $vehicles = TransportVehicle::select('vehicle_name', 'serial_number', 'transport_vehicles.id as vehicle_id', 'staffs.first_name as first_name', 'staffs.middle_name as middle_name', 'staffs.last_name as last_name')
                ->join('staffs', 'staffs.id', '=', 'transport_vehicles.driver_id')
                ->where('transport_vehicles.status', 1)
                ->get();
        } catch (ModelNotFoundException $e) {

            return redirect('transports/vehicles')->withError("Transportation Vehicle with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('transports/vehicles')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('transport::vehicle.edit', compact('drivers', 'vehicle', 'vehicles'));
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
            $vehicle = TransportVehicle::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('transports/vehicles')->withError("Transportation Vehicle with ID '" . $id . "' not found.");
        }
        catch(\Exception $ex){
            return redirect('transports/vehicles')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'vehicle_name' => 'required|string',
            'serial_number' => 'required|string|max:15',
            'driver_id' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $vehicle->fill($request->all());
            $vehicle->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Transportation Vehicle has been Updated Successfully");
        return redirect('transports/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $vehicle = TransportVehicle::findOrFail($id);

        $vehicle->status = 0;
        $vehicle->save();
        } catch (ModelNotFoundException $e) {

            return redirect('transports/vehicles')->withError("Transportation Vehicle with ID '" . $id . "' not found.");
        }
        catch(\Exception $ex){
            return redirect('transports/vehicles')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Transportation Vehicle has been Deleted Successfully");
        return redirect('transports/vehicles');
    }
}
