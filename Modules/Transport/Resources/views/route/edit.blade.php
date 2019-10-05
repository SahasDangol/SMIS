@extends('master')

@section('title', get_school_info('site_title').' | Route Update')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('route-edit')
            <div class="col-md-4">
                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/transports/routes/'.$route->route_id)}}" method="post">
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Update Route</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Route Name</label>
                                        <input class="form-control" value="{{$route->route_name}}" type="text" maxlength="100" name="route_name" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Route Fare</label>
                                        <input class="form-control" value="{{$route->route_fare}}" type="text" maxlength="15" name="route_fare" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Vehicle Detail</label>
                                        <select class="select2" data-size="7" name="vehicle_id" data-style="select-with-transition" title="{{old('vehicle_id')}}" required="true">
                                            @foreach($vehicles as $vehicle)
                                                <option value="{{$vehicle->id}}">{{$vehicle->vehicle_name." (".$vehicle->serial_number.")"}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Remarks</label>
                                        <input class="form-control" value="{{$route->remarks}}" type="text" name="remarks" />
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-5 col-form-label"></label>
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    Update Route
                                </button>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
            <div class="col-md-8">
                @endcan
                @cannot('route-edit')
                    <div class="col-md-12">
                    @endcan
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Route Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Route Name</th>
                                    <th>Route Fare</th>
                                    <th>Vehicle Type</th>
                                    <th>Number Plate</th>
                                    <th>Stations</th>
                                    @can('route-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('route-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Route Name</th>
                                    <th>Route Fare</th>
                                    <th>Vehicle Type</th>
                                    <th>Number Plate</th>
                                    <th>Stations</th>
                                    @can('route-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('route-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($routes as $route)

                                        <tr>
                                            <td>{{$route->route_name}}</td>
                                            <td>{{$route->route_fare}}</td>
                                            <td>{{$route->vehicle_name}}</td>
                                            <td>{{$route->number_plate}}</td>
                                            @if($route->remarks!=null)
                                                <td>{{$route->remarks}}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif
                                            <td class="text-right">
                                                @can('route-edit')
                                                <a href="{{url('/transports/routes/'.$route->route_id.'/edit')}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('route-delete')
                                                <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$route->route_id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                </a>
                                                <form method="post" action="{{route('routes.destroy',$route->route_id)}} " id="delete-form-{{$route->route_id}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
                @include('includes.advancedOption')
    </div>
@stop

