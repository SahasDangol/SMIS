@extends('master')

@section('title', get_school_info('site_title').' | Guardian Report')

@section('Body')
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        @if($guardian->personal_photo==null)

                            <img class="img" src="{{url('assets/backend/img/default-avatar.png')}}">
                        @else
                            <img class="img" src="{{url('/').Storage::url($guardian->personal_photo)}}"/>
                        @endif
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="title">
                        <b>{{ ucfirst($guardian->first_name) .' '.ucfirst($guardian->middle_name).''.ucfirst($guardian->last_name) }}</b>
                        <br>

                    </h4>

                    <hr>
                    <div class="text-center">
                        <div class="col-md-12 ">
                            <div class="wizard-container">
                                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                    <div class="wizard-navigation">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" role="tab" href="#guardian"
                                                   aria-expanded="true">Guardian</a>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div id="guardian" class="tab-pane active">
                                                <table class="table table-custom" width="100%">
                                                    <div class="card">
                                                        <tbody><br>
                                                        <tr>
                                                            <div class="card-avatar">
                                                                <a href="#pablo">
                                                                    @if($guardian->guardian_photo==null)

                                                                        <img class="img"
                                                                             src="{{url('assets/backend/img/default-avatar.png')}}">
                                                                    @else
                                                                        <img class="img"
                                                                             src="{{url('/').Storage::url($guardian->guardian_photo)}}"/>
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </tr>
                                                        <br>
                                                        <tr>
                                                            <td><b>Name</b></td>
                                                            <td>{{ ucfirst($guardian->guardian_first_name) .' '.ucfirst($guardian->guardian_middle_name).' '.ucfirst($guardian->guardian_last_name) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Mobile</b></td>
                                                            <td>@if($guardian->guardian_mobile==null)
                                                                    N/A
                                                                @else
                                                                    {{$guardian->guardian_mobile}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Phone</b></td>
                                                            <td>@if($guardian->guardian_phone==null)
                                                                    N/A
                                                                @else
                                                                    {{$guardian->guardian_phone}}
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Profession</b></td>
                                                            <td> @if($guardian->guardian_occupation==null)
                                                                    N/A
                                                                @else
                                                                    {{ ucfirst($guardian->guardian_occupation) }}
                                                                @endif</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>Relation</b></td>
                                                            <td> @if($guardian->guardian_relation==null)
                                                                    N/A
                                                                @else
                                                                    {{ ucfirst($guardian->guardian_relation) }}
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Email</b></td>
                                                            <td> @if($guardian->guardian_email==null)
                                                                    N/A
                                                                @else
                                                                    {{ ucfirst($guardian->guardian_email) }}
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Temporary Address</b></td>
                                                            <td> @if($guardian->temporary_address==null)
                                                                    N/A
                                                                @else
                                                                    {{ ucfirst($guardian->temporary_address) }}
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Permanent Address</b></td>
                                                            <td> @if($guardian->guardian_permanent_address==null)
                                                                    N/A
                                                                @else
                                                                    {{ ucfirst($guardian->guardian_permanent_address) }}
                                                                @endif</td>
                                                        </tr>

                                                        </tbody>
                                                    </div>

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
