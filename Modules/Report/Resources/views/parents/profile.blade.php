@extends('master')

@section('title', get_school_info('site_title').' | Parents | Profile')

@section('Body')
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        @if($parent->personal_photo==null)

                            <img class="img"
                                 src="{{url('assets/backend/img/default-avatar.png')}}">
                        @else
                            <img class="img" src="{{url('/').Storage::url($parent->personal_photo)}}"/>
                        @endif


                    </a>
                </div>
                <div class="card-body">
                    <h4 class="title"><b>{{ ucfirst($parent->first_name) .' '.ucfirst($parent->middle_name).''.ucfirst($parent->last_name) }}</b>
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
                                                <a class="nav-link active" data-toggle="tab" role="tab" href="#father"
                                                   aria-expanded="true">Father</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#mother" aria-expanded="false">Mother</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div id="father" class="tab-pane active">
                                                <table class="table table-custom" width="100%">
                                                    <div class="card">
                                                    <tbody><br>
                                                    <tr>
                                                        <div class="card-avatar">
                                                            <a href="#pablo">
                                                                @if($parent->father_photo==null)

                                                                    <img class="img"
                                                                         src="{{url('assets/backend/img/default-avatar.png')}}">
                                                                @else
                                                                    <img class="img"
                                                                         src="{{url('/').Storage::url($parent->father_photo)}}"/>
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </tr>
                                                    <br>
                                                    <tr>
                                                        <td><b>Name</b></td>
                                                        <td>{{ ucfirst($parent->father_first_name) .' '.ucfirst($parent->father_middle_name).' '.ucfirst($parent->father_last_name) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Mobile</b></td>
                                                        <td>@if($parent->father_mobile==null)
                                                                N/A
                                                            @else
                                                                {{$parent->father_mobile}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Phone</b></td>
                                                        <td>@if($parent->father_phone==null)
                                                                N/A
                                                            @else
                                                                {{$parent->father_phone}}
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Profession</b></td>
                                                        <td> @if($parent->father_occupation==null)
                                                                N/A
                                                            @else
                                                                {{ ucfirst($parent->father_occupation) }}
                                                            @endif</td>
                                                    </tr>


                                                    </tbody></div>
                                                </table>
                                            </div>
                                            <div id="mother" class="tab-pane">
                                                <table class="table table-custom" width="100%">
                                                   <div class="card">
                                                    <tbody><br>
                                                    <tr>
                                                        <div class="card-avatar">
                                                            <a href="#pablo">
                                                                @if($parent->mother_photo==null)

                                                                    <img class="img"
                                                                         src="{{url('assets/backend/img/default-avatar.png')}}">
                                                                @else
                                                                    <img class="img"
                                                                         src="{{url('/').Storage::url($parent->mother_photo)}}"/>
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </tr>
                                                    <br>
                                                    <tr>
                                                        <td><b>Name</b></td>
                                                        <td>{{ ucfirst($parent->mother_first_name) .' '.ucfirst($parent->mother_middle_name).' '.ucfirst($parent->mother_last_name) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Mobile</b></td>
                                                        <td>@if($parent->mother_mobile==null)
                                                                N/A
                                                            @else
                                                                {{ $parent->mother_mobile}}
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Phone</b></td>
                                                        <td>@if($parent->mother_phone==null)
                                                                N/A
                                                            @else
                                                                {{ $parent->mother_phone }}
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Profession</b></td>
                                                        <td> @if($parent->mother_occupation==null)
                                                                N/A
                                                            @else
                                                                {{ ucfirst($parent->mother_occupation) }}
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
