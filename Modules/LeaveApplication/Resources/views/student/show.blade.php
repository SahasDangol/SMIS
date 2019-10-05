@extends('master')

@section('title', get_school_info('site_title').' | Show Leave Application')

@section('Body')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">Read Leave Application</h4>
                            </div>
                        </div>
                        <div class="card-header">
                            <h3 class="float-right">{{get_nepali_date($application->date)}}</h3>
                        </div>
                        <div class="card-title ml-2">
                            <h4>Dear Class Teacher, </h4>
                        </div>
                        <div class="modal-body">
                            <p>{{$application->content}}
                            </p>
                            <div class="form-group bmd-form-group is-filled float-right">
                                <label class="label-control">Sincere</label>
                                <input type="text" class="form-control"
                                       value="{{$application->students->first_name}} {{$application->students->middle_name_name}} {{$application->students->last_name}}" disabled="">
                                <span class="material-input"></span>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
        <!-- end row -->

    </div>




@stop


