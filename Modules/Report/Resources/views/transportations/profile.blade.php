@extends('master')

@section('title', get_school_info('site_title').' | Transportation Report')

@section('Body')
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-profile">

                <div class="card-body">

                    <hr>
                    <div class="text-center">
                        <div class="col-md-12 ">
                            <div class="wizard-container">
                                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                    <div class="wizard-navigation">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" role="tab" href="#route"
                                                   aria-expanded="true">Route</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#vehicle" aria-expanded="false">Vehicle</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div id="route" class="tab-pane active">
                                                <table class="table table-custom" width="100%">
                                                    {{--<div class="card">--}}
                                                        <tbody>


                                                        <tr>
                                                            <td><b>Route Name</b></td>
                                                            <td>{{ ucfirst($transport->route_name) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Route Fare</b></td>
                                                            <td>@if($transport->route_fare==null)
                                                                    N/A
                                                                @else
                                                                    {{$transport->route_fare}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Remarks</b></td>
                                                            <td>@if($transport->remarks==null)
                                                                    N/A
                                                                @else
                                                                    {{$transport->remarks}}
                                                                @endif</td>
                                                        </tr>


                                                        </tbody>
                                            {{--</div>--}}
                                                </table>
                                            </div>
                                            <div id="vehicle" class="tab-pane">
                                                <table class="table table-custom" width="100%">
                                                    <div class="card">
                                                        <tbody><br>
                                                        <tr>
                                                            <div class="card-avatar">
                                                                <a href="#pablo">
                                                                    @if($transport->personal_photo==null)

                                                                        <img class="img"
                                                                             src="{{url('assets/backend/img/default-avatar.png')}}">
                                                                    @else
                                                                        <img class="img"
                                                                             src="{{url('/').Storage::url($transport->personal_photo)}}"/>
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </tr>
                                                        <br>
                                                        <tr>
                                                            <td><b>Vehicle Name</b></td>
                                                            <td>{{ ucfirst($transport->vehicle_name) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Serial Number</b></td>
                                                            <td>@if($transport->serial_number==null)
                                                                    N/A
                                                                @else
                                                                    {{ $transport->serial_number}}
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Driver ID</b></td>
                                                            <td>@if($transport->driver_id==null)
                                                                    N/A
                                                                @else
                                                                    {{ $transport->driver_id }}
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Driver's Name</b></td>
                                                            <td> @if($transport->first_name==null)
                                                                    N/A
                                                                @else
                                                                    {{  ucfirst($transport->first_name) .' '.ucfirst($transport->middle_name).''.ucfirst($transport->last_name)  }}
                                                                @endif</td>
                                                        </tr>


                                                        </tbody></div>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@stop
