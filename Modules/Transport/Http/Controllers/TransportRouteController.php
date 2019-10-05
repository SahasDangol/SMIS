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
use Modules\Transport\Entities\TransportRoute;
use Modules\Transport\Entities\TransportVehicle;

class TransportRouteController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:route-list');
        $this->middleware('permission:route-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:route-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:route-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $vehicles = TransportVehicle::select('id', 'serial_number', 'vehicle_name')->where('status', 1)->get();

        $routes = TransportRoute::select('route_name', 'route_fare', 'transport_routes.remarks as remarks', 'transport_routes.id as route_id', 'transport_vehicles.vehicle_name as vehicle_name', 'transport_vehicles.serial_number as number_plate')
            ->join('transport_vehicles', 'transport_vehicles.id', '=', 'transport_routes.vehicle_id')
            ->where('transport_routes.status', 1)
            ->get();
        return view('transport::route.index', compact('vehicles', 'routes'));
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
            'route_name' => 'required|string|max:100',
            'route_fare' => 'required|string|max:4',
            'vehicle_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            TransportRoute::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Transportation Route has been Added Successfully");
        return redirect('transports/routes');
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
            $vehicles = TransportVehicle::select('id', 'serial_number', 'vehicle_name')->where('status', 1)->get();
            $route = TransportRoute::select('route_name', 'route_fare', 'transport_routes.remarks as remarks', 'transport_routes.id as route_id', 'transport_vehicles.vehicle_name as vehicle_name', 'transport_vehicles.serial_number as number_plate')
                ->join('transport_vehicles', 'transport_vehicles.id', '=', 'transport_routes.vehicle_id')
                ->where('transport_routes.id', $id)
                ->where('transport_routes.status', 1)
                ->findOrFail($id);
            $routes = TransportRoute::select('route_name', 'route_fare', 'transport_routes.remarks as remarks', 'transport_routes.id as route_id', 'transport_vehicles.vehicle_name as vehicle_name', 'transport_vehicles.serial_number as number_plate')
                ->join('transport_vehicles', 'transport_vehicles.id', '=', 'transport_routes.vehicle_id')
                ->where('transport_routes.status', 1)
                ->get();
        } catch (ModelNotFoundException $e) {

            return redirect('transports/routes')->withError("Transportation Route with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('transports/routes')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('transport::route.edit', compact('vehicles', 'route', 'routes'));
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
            $route = TransportRoute::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            return redirect('transports/routes')->withError("Transport Route with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('transports/routes')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'route_name' => 'required|string|max:15',
            'route_fare' => 'required|string|max:15',
            'vehicle_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $route->route_name = $request->route_name;
            $route->route_fare = $request->route_fare;
            $route->remarks = $request->remarks;
            $route->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();


        Session::flash('type', "info");
        Session::flash('message', "Transportation Route has been Updated Successfully");
        return redirect('transports/routes');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $route = TransportRoute::findOrFail($id);

            $route->status = 0;
            $route->save();
        } catch (ModelNotFoundException $e) {

            return redirect('transports/routes')->withError("Transportation Route with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('transports/routes')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Transportation Route has been Deleted Successfully");
        return redirect('transports/routes');
    }
}
