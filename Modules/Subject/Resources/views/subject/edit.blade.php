@extends('master')

@section('title', get_school_info('site_title').' | Edit Subject Setting')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{route('subject.update',$subject->id)}}" method="post">
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
                                    <input class="form-control" value="{{$subject->subject_name}}" placeholder="Subject Name" type="text"  name="subject_name" required="true" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Subject Code</label>
                                    <input class="form-control"  value="{{$subject->subject_code}}" placeholder="Subject Code" type="text"  name="subject_code" required="true" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                                <label for="" class="bmd-label-floating">Subject Type</label>
                                <select class="select2"   name="subject_type" data-style="select-with-transition"  required="true">
                                    <option disabled selected>Select Subject Type</option>
                                    <option value="regular" @if($subject->subject_type=='regular') selected @endif>Regular</option>
                                    <option value="optional-1" @if($subject->subject_type=='optional-1') selected @endif>Optional-1</option>
                                    <option value="optional-2" @if($subject->subject_type=='optional-2') selected @endif>Optional-2</option>
                                    <option value="additional" @if($subject->subject_type=='additional') selected @endif>Additional</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="bmd-label-floating">Classroom</label>
                                <select class="select2"    name="classroom_id" data-style="select-with-transition" title="" required="true">
                                    <option disabled selected>Select Classroom</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{$classroom->id}}"

                                                @if($classroom->id==$subject->classroom_id)
                                                    selected
                                                @endif

                                        >{{$classroom->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="bmd-label-floating">Credit Hour</label>
                                <select class="select2" name="credit_hour" data-style="select-with-transition" title="{{old('credit_hour')}}" required="true">
                                    <option disabled selected>Select Credit Hour</option>
                                    <option value="1"
                                            @if($subject->credit_hour=="1")
                                            selected
                                            @endif
                                    >1</option>
                                    <option value="2"
                                            @if($subject->credit_hour=="2")
                                            selected
                                            @endif
                                    >2</option>
                                    <option value="3"
                                            @if($subject->credit_hour=="3")
                                            selected
                                            @endif
                                    >3</option>
                                    <option value="4"
                                            @if($subject->credit_hour=="4")
                                            selected
                                            @endif
                                    >4</option>
                                </select>
                            </div>


                            <br>
                            <br>
<br>
                            <br>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Theory Full Marks</label>
                                        <input id="th_total" class="form-control" type="number"  name="th_full_mark" value="{{$subject->th_full_mark}}" required="true" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Theory Pass Marks</label>
                                        <input id="th_pass" class="form-control"  type="number"  name="th_pass_mark" value="{{$subject->th_pass_mark}}" required="true" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Practical Full Marks</label>
                                        <input id="pr_total" class="form-control"  type="number"  name="pr_full_mark" value="{{$subject->pr_full_mark}}"  />
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Practical Pass Marks</label>
                                        <input id="pr_pass" class="form-control" type="number"  name="pr_pass_mark" value="{{$subject->pr_pass_mark}}"  />
                                    </div>
                                </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Full Marks</label>
                                    <input id="total" class="form-control"  type="number"  name="full_mark" value="{{$subject->full_mark}}" required="true" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="bmd-label-floating">Pass Marks</label>
                                    <input id="pass" class="form-control"  type="number" name="pass_mark" value="{{$subject->pass_mark}}" required="true" readonly />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Update subject
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
            {{method_field('PUT')}}
        </form>
    </div>
@stop
@section('script')
<script>
    $(document).on('keyup', '#th_total, #th_pass, #pr_total, #pr_pass', function () {
        var th_total = document.getElementById('th_total').value;
        document.getElementById('total').value=th_total;

        var th_pass = document.getElementById('th_pass').value;
        document.getElementById('pass').value=th_pass;

        var pr_total=document.getElementById('pr_total').value;
        if (pr_total) {
            document.getElementById('total').value=parseFloat(th_total)+parseFloat(pr_total);
        }
        else {
            document.getElementById('total').value=th_total;
        }

        var pr_pass=document.getElementById('pr_pass').value;
        if (pr_pass) {
            document.getElementById('pass').value=parseFloat(th_pass)+parseFloat(pr_pass);
        }
        else {
            document.getElementById('pass').value=th_pass;
        }
    });
</script>
    @stop