@extends('master')

@section('title', get_school_info('site_title').' | Add Subject Setting')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{route('subject.store')}}" method="post">
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Subject Setting</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10 row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Subject Name</label>
                                    <input class="form-control" type="text"
                                           name="subject_name" value="{{ old('subject_name')}}" required="true"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Subject Code</label>
                                    <input class="form-control" type="text"
                                           name="subject_code" value="{{ old('subject_code')}}" required="true"/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-sm-4">
                                <select class="select2" name="subject_type" data-style="select-with-transition"
                                        title="{{old('classroom_id')}}" required="true">
                                    <option disabled selected>Select Subject Type</option>
                                    <option value="regular"
                                            @if('regular'==old('subject_type'))
                                            selected
                                            @endif
                                    >Regular
                                    </option>
                                    <option value="optional-1"
                                            @if('optional-1'==old('subject_type'))
                                            selected
                                            @endif
                                    >Optional-1
                                    </option>
                                    <option value="optional-2"
                                            @if('optional-2'==old('subject_type'))
                                            selected
                                            @endif
                                    >Optional-2
                                    </option>
                                    <option value="additional"
                                            @if('additional'==old('subject_type'))
                                            selected
                                            @endif
                                    >Additional
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="select2" name="classroom_id" data-style="select-with-transition"
                                        title="{{old('classroom_id')}}" required="true">
                                    <option disabled selected>Select Classroom</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{$classroom->id}}"
                                                @if($classroom->id==old('classroom_id'))
                                                selected
                                                @endif
                                        >{{$classroom->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="select2" name="credit_hour" data-style="select-with-transition"
                                        required="true">
                                    <option disabled selected>Select Credit Hour</option>
                                    <option value="1" @if(old('credit_hour')==1) selected @endif>1</option>
                                    <option value="2" @if(old('credit_hour')==2) selected @endif >2</option>
                                    <option value="3" @if(old('credit_hour')==3) selected @endif>3</option>
                                    <option value="4" @if(old('credit_hour')==4) selected @endif>4</option>
                                </select>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Theory Full Marks</label>
                                    <input id="th_total" class="form-control" type="number" name="th_full_mark"
                                           value="{{ old('th_full_mark')}}" required="true"/>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Theory Pass Marks</label>
                                    <input id="th_pass" class="form-control" type="number" name="th_pass_mark"
                                           value="{{ old('th_pass_mark')}}" required="true"/>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Practical Full Marks</label>
                                    <input id="pr_total" class="form-control" type="number" name="pr_full_mark"
                                           value="{{ old('pr_full_mark')}}"/>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Practical Pass Marks</label>
                                    <input id="pr_pass" class="form-control" type="number" name="pr_pass_mark"
                                           value="{{ old('pr_pass_mark')}}"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label">Full Marks</label>
                                    <br>
                                    <input id="total" class="form-control" type="number" name="full_mark"
                                           value="{{ old('full_mark')}}" required="true" readonly/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label">Pass Marks</label>
                                    <br>
                                    <input id="pass" class="form-control" type="number" name="pass_mark"
                                           value="{{ old('pass_mark')}}" required="true" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Add subject
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop
@section('script')
    <script>
        $(document).on('keyup', '#th_total, #th_pass, #pr_total, #pr_pass', function () {
            var th_total = document.getElementById('th_total').value;
            document.getElementById('total').value = th_total;

            var th_pass = document.getElementById('th_pass').value;
            document.getElementById('pass').value = th_pass;

            var pr_total = document.getElementById('pr_total').value;
            if (pr_total) {
                document.getElementById('total').value = parseFloat(th_total) + parseFloat(pr_total);
            }
            else {
                document.getElementById('total').value = th_total;
            }

            var pr_pass = document.getElementById('pr_pass').value;
            if (pr_pass) {
                document.getElementById('pass').value = parseFloat(th_pass) + parseFloat(pr_pass);
            }
            else {
                document.getElementById('pass').value = th_pass;
            }
        });
    </script>
@stop