@extends('master')

@section('title', get_school_info('site_title').' | Show Marks')
@section('Body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default" data-collapsed="0">
                <div class="card-body">
                    <form id="search_form" class="process params-card validate" action="{{ url('marksheet/index') }}"
                          method="post" autocomplete="off" accept-charset="utf-8">

                        <div class="col-md-10 row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <select id="classroom" name="classroom_id" class="select2"
                                        data-style="select-with-transition"
                                        title="Choose Class" data-size="7" required="true">
                                    <option selected disabled> Select Class</option>

                                    @foreach($classrooms as $classroom)
                                        <option value="{{$classroom->id}}"
                                                @if( !empty($classroom_id) )
                                                @if($classroom->id==$classroom_id) selected @endif
                                                @endif>{{$classroom->class_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-sm-5">
                                <select id="section" name="section_id" class="select2"
                                        title="Choose Section" data-style="select-with-transition"
                                        data-size="7" required="true">
                                    <option selected disabled> Select Section</option>
                                    @if( !empty($section_id) )
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}"
                                                    @if($section->id==$section_id) selected @endif>{{$section->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <select id="subjects" name="subject_id" class="select2"
                                        title="Choose Subject" data-style="select-with-transition"
                                        data-size="7" required="true">
                                    <option selected disabled> Select Subject</option>
                                    @if( !empty($subject_id) )
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}"
                                                    @if($subject->id==$subject_id) selected @endif>{{$subject->subject_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <select id="exam" name="exam_id" class="select2"
                                        title="Choose Exam" data-style="select-with-transition"
                                        data-size="7" required="true">
                                    <option selected disabled> Select Exam</option>

                                    @foreach($exams as $exam)
                                        <option value="{{$exam->id}}"
                                                @if( !empty($exam_id) )
                                                @if($exam->id==$exam_id) selected @endif
                                                @endif
                                        >{{$exam->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-9"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" style="margin-top:24px;"
                                            class="btn btn-primary btn-block btn-round btn-sm ">Marks
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{csrf_field()}}
                    </form>

                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Marks Table</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            {{--<th>#</th>--}}
                                            {{--<th></th>--}}
                                            <th>Roll No</th>
                                            <th>Name</th>
                                            <th>Theory</th>
                                            <th>Practical</th>
                                            <th>Result</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($marks))
                                            @foreach($marks as $mark)
                                                <tr>
                                                    <td>{{explode("-",$mark->students->roll_no)[1]}}</td>
                                                    <td>{{ucfirst($mark->students->first_name).' '.ucfirst($mark->students->middle_name).' '.ucfirst($mark->students->last_name)}}</td>
                                                    <td>
                                                        @if(!empty($mark->th_marks))
                                                            {{$mark->th_marks}}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!empty($mark->pr_marks))
                                                            {{$mark->pr_marks}}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="result">
                                                        @if($mark->result=="0")
                                                            <span id="result{{$mark->id}}" class="badge badge-danger">Fail</span>
                                                        @elseif($mark->result=="1")
                                                            <span id="result{{$mark->id}}" class="badge badge-success">Pass</span>
                                                        @else
                                                            <span id="result{{$mark->id}}"
                                                                  class="badge badge-default"></span>
                                                        @endif
                                                    </td>
                                                </tr>@endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">
                                                    <div class="float-center">No
                                                        Records
                                                        !!Select
                                                        Appropriate
                                                        Criteria.
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function setth(thmarks, id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('marksheet')}}",
                method: "POST",
                data: {"thmarks": thmarks, "id": id},
                success: function (data1) {
                    $('#th' + id).addClass('has-success');
                }
            })

        }

        function setpr(prmarks, id) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('marksheet')}}",
                method: "POST",
                data: {"prmarks": prmarks, "id": id},
                success: function (data1) {
                    $('#pr' + id).addClass('has-success');
                }
            })

        }


        {{--attendance for student--}}

        $(document).ready(function () {

            $('#classroom').change(function () {
                $("#subjects option").remove();


                var ClassroomId = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsubject')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        $('#subjects')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Subject"));


                        $.each(data1, function (key, value) {
                            $('#subjects')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.subject_name));

                        });


                    }
                })


                /*****************section ajax start**********************/

                $("#section option").remove();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        if (data1.length == 1) {
                            $.each(data1, function (key, value) {
                                $('#section')
                                    .append($("<option selected></option>")
                                        .attr("value", value.id)
                                        .text(value.name));

                            });

                        } else {

                            $('#section')
                                .append($("<option selected disabled></option>")
                                    .attr("value", "")
                                    .text(" Choose Section"));


                            $.each(data1, function (key, value) {
                                $('#section')
                                    .append($("<option></option>")
                                        .attr("value", value.id)
                                        .text(value.name));

                            });
                        }

                    }
                })
            });

        });

    </script>

    {{--attendance for student--}}
@stop
