@extends('master')

@section('title', get_school_info('site_title').' | Guardian | Add')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/guardian/')}}" method="post"
              enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Add Guardian</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">
                                    First Name*
                                </label>
                                <input type="text"  class="form-control " name="guardian_first_name"
                                       value="{{old('guardian_first_name')}}" required="true">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">

                            <div class="form-group "><label class="bmd-label-floating">
                                    Middle Name
                                </label>

                                <input type="text" class="form-control " name="guardian_middle_name"
                                       value="{{old('guardian_middle_name')}}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">
                                   Last Name*
                                </label>
                                <input type="text" class="form-control" name="guardian_last_name" required="true"
                                       value="{{old('guardian_last_name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                    <div class="col-sm-5 col-md-5">
                        <div class="form-group ">
                            <label class="bmd-label-floating">
                                Email
                            </label>
                            <input type="email" class="form-control" name="guardian_email" value="{{old('guardian_email')}}"
                                  >
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label class="bmd-label-floating"> Phone</label>
                            <input type="number" class="form-control" name="guardian_phone" value="{{old('guardian_phone')}}">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-5 col-md-5">
                            <div class="form-group ">
                                <label class="bmd-label-floating">
                                    Mobile*
                                </label>
                                <input type="number" class="form-control" name="guardian_mobile" required="true"
                                       value="{{old('guardian_mobile')}}"
                                >
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Temporary Address</label>
                                <input type="text" class="form-control" name="guardian_temporary_address"
                                       value="{{old('guardian_temporary_address')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-5 col-md-5">
                            <div class="form-group ">
                                <label class="bmd-label-floating">
                                    Permanent Address*
                                </label>
                                <input type="text" class="form-control" name="guardian_permanent_address" required="true"
                                       value="{{old('guardian_permanent_address')}}"
                                >
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Occupation</label>
                                <input type="text" class="form-control" name="guardian_occupation" value="{{old('guardian_occupation')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Add Guardian
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop
