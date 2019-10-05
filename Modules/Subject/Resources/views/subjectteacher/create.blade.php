@extends('master')

@section('title', get_school_info('site_title').' | Assign Subject Teacher')
@section('Body')
    <div class="container-fluid br-mainpanel">

        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('subject_teacher/create')}}"
              method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="select2" data-size="8" id="classroom" name="classroom_id"
                                                data-style="select-with-transition" title="Select Classroom"
                                                required="true">
                                            <option disabled selected>Select Classroom</option>
                                            @foreach($classrooms as $classroom)
                                                <option value="{{$classroom->id}}"
                                                        @if( !empty($classroom_id) )
                                                        @if($classroom->id==$classroom_id) selected @endif
                                                        @endif>{{$classroom->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <select class="select2" data-size="7" id="section" name="section_id"
                                                data-style="select-with-transition" title="Select Section"
                                                required="true">
                                            <option disabled selected>Select Section</option>
                                            @if( !empty($section_id) )
                                                @foreach($sections as $section)
                                                    <option value="{{$section->id}}"
                                                            @if($section->id==$section_id) selected @endif>{{$section->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-sm btn-round float-right mr-1">
                                            Assign Subject Teacher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
        </form>
        @if($subjects)
            <div class="card">
                <div class="card-body">
                    <form id="TypeValidation" class="form-horizontal process"
                          action="{{url('/subject_teacher')}}" method="post">
                        <input type="hidden" value="{{$classroom_id}}" name="classroom_id">
                        <input type="hidden" value="{{$section_id}}" name="section_id">
                        <table class="table table-striped table-bordered table-hover" cellspacing="0"
                               width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th><b><b>Subject Name</b></b></th>
                                <th><b><b>Teacher Name</b></b></th>
                            </tr>
                            </thead>
                            <tbody id="teacher">
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>
                                        <select class="select2" data-size="7" name="select_{{$subject->id}}"
                                                data-style="select-with-transition"
                                                required="true">
                                            <option disabled selected>Select Teacher</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}"
                                                        @if($subject_teachers)
                                                        @if($subject_teachers->where('subject_id',$subject->id)->first()->teacher_id ?? null)
                                                        @if($teacher->id == $subject_teachers->where('subject_id',$subject->id)->first()->teacher_id )
                                                        selected
                                                        @endif
                                                        @endif
                                                        @endif
                                                >
                                                    {{ucfirst($teacher->first_name).' '.ucfirst($teacher->middle_name).' '. ucfirst($teacher->last_name)}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            <div class="form-group">
                                <button
                                        class="btn btn-primary btn-block btn-round">Save Information
                                </button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>

            </div>
        @endif
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

                            var d = 0;
                            $.each(data1, function (key, value) {
                                $('#section')
                                    .append($("<option></option>")
                                        .attr("value", value.id)
                                        .text(value.name));

                                d = d + 1;
                            });
                            if (d === 1) {
                                $("#section").val(data1[0].id);
                            }

                        }
                    }
                })
            });

        });
    </script>
@stop