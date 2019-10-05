@extends('master')

@section('title', get_school_info('site_title').' | Write Leave Application')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/students_leave/')}}" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">New Leave Application</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input name="student_id" type="hidden" class="form-control"
                                               value="{{Illuminate\Support\Facades\Auth::user()->students->id}}" readonly >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input name="class_id" type="hidden" class="form-control"
                                               value="{{Illuminate\Support\Facades\Auth::user()->students->classrooms->class_name}}"
                                               readonly disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input name="class_id" type="hidden" class="form-control"
                                               value="{{Illuminate\Support\Facades\Auth::user()->students->sections->name}}"
                                               readonly disabled>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Date</label>
                                        <input name="date" type="text" class="form-control"
                                               value="{{get_nepali_date(date('Y-m-d'))}}" readonly >
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">To, </label>
                                        <input class="form-control" value="Class Teacher"
                                               type="text" maxlength="25" name="title"
                                               required="true" disabled=""/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Subject of Application (*)</label>
                                        <input class="form-control" value="{{ old('subject') }}"
                                               type="text" maxlength="25" name="subject"
                                               required="true"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Body Of Application (*)</label>
                                        <textarea id="Comment" class="form-control" name="content"
                                                  rows="8" required> {{old('content')}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary btn-round float-right">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
        <!-- end row -->

    </div>




@stop


