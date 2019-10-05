@extends('master')

@section('title', get_school_info('site_title').' | Edit Complaint')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/complain/'.$complain->id)}}" method="post" enctype="multipart/form-data">
           @method('PUT')
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Complaint</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Session ID*</label>
                                <input class="form-control" type="text" maxlength="100" name="session_id" value="{{$complain->session_id}}" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Complain Type*</label>
                                <input class="form-control" type="text" maxlength="100" value="{{$complain->complain_type}}" name="complain_type" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Complained By*</label>
                                <input class="form-control" type="text" maxlength="100" value="{{$complain->complain_by}}" name="complain_by" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phone</label>
                                <input class="form-control" type="text" value="{{$complain->phone}}" name="phone" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input class="form-control" type="email" value="{{$complain->email}}" name="email"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class=" ml-5 col-sm-1 col-form-label">Date*</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input class="form-control nepali_datepicker" type="text" value="{{get_nepali_date($complain->date)}}" name="date"
                                       maxlength="10"  required="true"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Taken Action</label>
                                <input class="form-control" type="text" value="{{$complain->taken_action}}" name="taken_action" />
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <label class="ml-5 col-sm-2 col-form-label ">Attached Document</label>
                        <div class="col-sm-6">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                <img src="{{Storage::url($complain->attach_document)}}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                  <span class="btn btn-rose btn-round btn-file">
                                    <label for="logo" class="fileinput-new">Choose Photo</label>
                                      <span for="logo" class="fileinput-exists">Change Photo</span>
                                      <input type="file" value="{{old('attach_document')}} " id="attach_document"
                                             name="attach_document">
                                  </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div></div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Note</label>
                                <textarea class="form-control" rows="6" name="note">{{$complain->note}}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Update Complaint
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop