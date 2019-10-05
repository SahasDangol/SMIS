@extends('master')

@section('title', get_school_info('site_title').' | Vehicle Detail')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('vehicle-create')
            <div class="col-md-4">
                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/transports/vehicles/')}}" method="post" >
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">New Vehicle</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Vehicle Name</label>
                                        <input class="form-control" value="{{ old('vehicle_name') }}" type="text"  name="vehicle_name" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Serial Number</label>
                                        <input class="form-control" value="{{ old('serial_number') }}" type="text" maxlength="15" name="serial_number" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Driver Name</label>
                                        <select class="select2" data-size="7" name="driver_id" data-style="select-with-transition" title="{{old('driver_id')}}" required="true">
                                            <option disabled selected>Select Driver</option>
                                            @foreach($drivers as $driver)
                                                <option value="{{$driver->driver_id}}">{{ucfirst($driver->first_name)." ".ucfirst($driver->middle_name)." ".ucfirst($driver->last_name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-6 col-form-label"></label>
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    Add New Vehicle
                                </button>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
            <div class="col-md-8">
            @endcan
            @cannot('vehicle-create')
              <div class="col-md-12">
            @endcannot
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Vehicle Detail</h4>
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
                                    <th>Vehicle Name</th>
                                    <th>Serial Number</th>
                                    <th>Driver Name</th>
                                    @can('vehicle-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('vehicle-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Vehicle Name</th>
                                    <th>Serial Number</th>
                                    <th>Driver Name</th>
                                    @can('vehicle-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('vehicle-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($vehicles as $vehicle)

                                        <tr>
                                            <td>{{$vehicle->vehicle_name}}</td>
                                            <td>{{$vehicle->serial_number}}</td>
                                            <td>{{ucfirst($vehicle->first_name)." ".ucfirst($vehicle->middle_name)." ".ucfirst($vehicle->last_name)}}</td>
                                            <td class="text-right">
                                                @can('vehicle-edit')
                                                <a href="{{url('/transports/vehicles/'.$vehicle->vehicle_id.'/edit')}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('vehicle-delete')
                                                    <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$vehicle->vehicle_id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                </a>
                                                <form method="post" action="{{route('vehicles.destroy',$vehicle->vehicle_id)}} " id="delete-form-{{$vehicle->vehicle_id}}">
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

