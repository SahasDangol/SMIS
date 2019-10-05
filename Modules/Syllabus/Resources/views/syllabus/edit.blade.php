@extends('master')

@section('title', get_school_info('site_title').' | Edit Syllabus')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/syllabus/'.$syllabus->id)}}" method="post"
              enctype="multipart/form-data">
            @method('PUT')
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Syllabus</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-4 ">

                            <div class="form-group">
                                <label class="bmd-label-floating">Title*</label>
                                <input class="form-control" type="text" maxlength="100" name="title"
                                       value="{{$syllabus->title}}" required="true"/>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-4 ">

                            <div class="form-group">

                                <select class="select2" data-size="7" name="classroom_id"
                                        data-style="select-with-transition"
                                        required="true">

                                    <option disabled>Class*</option>
                                    @foreach($classroom as $aa)
                                        <option value="{{$aa->id}}"
                                                @if($aa->id==$syllabus->classroom_id)
                                                selected
                                                @endif
                                        >{{$aa->class_name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <label class="ml-3 col-sm-2 col-form-label">Syllabus Photo*</label>

                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{url('/').Storage::url($syllabus->file)}}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                  <span class="btn btn-primary  btn-round btn-file">
                                    <label for="logo" class="fileinput-new">Choose Photo</label>
                                      <span for="logo" class="fileinput-exists">Change Photo</span>
                                      <input type="file" value="{{$syllabus->file}} " id="file"
                                             name="file"/>
                                  </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                   data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Description</label>
                                <textarea class="form-control" rows="4"
                                          name="description">{{$syllabus->description}}</textarea>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-round float-right mr-1">
                        Update Syllabus
                    </button>

                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop