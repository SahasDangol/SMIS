@extends('master')
@section('title', get_school_info('site_title').' | Manage Student Roll No.')

@section('head')
    <style>
        body {
            padding: 20px;
        }

        .slides {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 300px;
        }

        .slide {
            padding: 15px;
            background-color: #2F2F2F;
            margin: 0 0 15px;
            text-align: center;
            color: #FFF;
            border: 2px solid #444;
            /*height:50px;*/
        }

        .roll {
            padding: 15px;
            background-color: lightslategrey;
            margin: 0 0 15px;
            text-align: center;
            color: #FFF;
            border: 2px solid #444;
            height: 50px;
        }

        .slide-placeholder {
            background: #DADADA;
            position: relative;
        }

        .slide-placeholder:after {
            content: " ";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 15px;
            background-color: #FFF;
        }

        div.ex1 {
            /*background-color: lightblue;*/
            width: 100%;
            height: 33rem;
            overflow: scroll;
        }

    </style>
@endsection

@section('Body')
    <div class="container-fluid">
        @if($status == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Student Detail</h4>
                        </div>
                        <br>
                        <br>
                        <div class="card-body">
                            <form id="search_form" class="params-panel validate process"
                                  action="{{ url('students/manage_roll_no') }}"
                                  method="post" autocomplete="off" accept-charset="utf-8">
                                <div class="row justify-content-center">

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <select id="classroom" name="class_id" class="select2"
                                                data-style="select-with-transition"
                                                title="Choose Class" data-size="7">

                                            <option selected disabled> Select Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <select id="section" name="section_id" class="select2"
                                                data-style="select-with-transition"
                                                title="Choose Section" data-size="7" required="true">
                                            <option selected disabled> Select Section</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-round float-right mr-1 attendance"
                                            disabled>
                                        Search
                                    </button>
                                </div>
                                @csrf
                            </form>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        @else

            <div class="row">
                {{--<div class="col-md-12">--}}
                {{--<div class="card">--}}
                {{--<div class="card-header card-header-primary card-header-icon">--}}
                {{--<div class="card-icon">--}}
                {{--<i class="material-icons">assignment</i>--}}
                {{--</div>--}}
                {{--<h4 class="card-title">Student Detail</h4>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                {{--<br>--}}
                {{--<br>--}}
                {{--<form id="search_form" class="params-panel validate"--}}
                {{--action="{{ url('students/attendance') }}"--}}
                {{--method="post" autocomplete="off" accept-charset="utf-8">--}}
                {{--<div class="row">--}}
                {{--<div class="col-lg-4 col-md-4 col-sm-4">--}}
                {{--<div class="form-group">--}}
                {{--<label class="bmd-label-floating">Classroom Name</label>--}}
                {{--<input name="class_id" type="text" class="form-control"--}}
                {{--value="{{$selected_class}}" readonly disabled>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 col-md-4 col-sm-4">--}}
                {{--<div class="form-group">--}}
                {{--<label class="bmd-label-floating">Section Name</label>--}}
                {{--<input name="section_id" type="text" class="form-control"--}}
                {{--value="{{$selected_section}}" readonly disabled="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-2 col-md-2 col-sm-2">--}}
                {{--<div class="form-group">--}}
                {{--<label class="bmd-label-floating">Attendance Date</label>--}}
                {{--<input name="date" type="text" class="form-control datepicker"--}}
                {{--value="{{$date}}" readonly disabled>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@csrf--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--<!-- end content-->--}}
                {{--</div>--}}
                {{--<!--  end card  -->--}}
                {{--</div>--}}

                <div class="col-sm-12">
                    <form class="params-panel validate process row"
                          action="{{ url('manage_roll_no_store') }}" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ex1">
                                    <input type="hidden" name="class_id" value="{{$class_id}}">
                                    <input type="hidden" name="section_id" value="{{$section_id}}">

                                    <div class="col-sm-2">
                                        <div class="card">
                                            <div class="card-title">
                                                <h6 class="text-center" style="position:sticky;top:0;">Roll No.</h6>
                                            </div>
                                            <div class="card-body">
                                                @for($i=1;$i<=count($students);$i++ )
                                                    <div class="form-group slide">
                                                        <label class="bmd-label-floating">{{$i}}</label>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="slides">
                                            <div class="card">
                                                <div class="card-title">
                                                    <h6 class="text-center" style="position:sticky;top:0;">Student Name</h6>
                                                </div>
                                                <div class="card-body slides">
                                                    @foreach($students as $student)
                                                        <div class="form-group slide">
                                                            <label class="bmd-label-floating">{{$student->students->first_name}} {{$student->students->middle_name}} {{$student->students->last_name}}</label>
                                                            <input value="{{$student->student_id}}" type="hidden"
                                                                   name="section[]"
                                                                   required="true"/>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-title">
                                                <h4 class="text-center" style="position:sticky;top:0;">Instruction</h4>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row col-lg-2 col-md-2 col-sm-2 offset-10">
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-sm btn-primary btn-round ">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    </div>
@stop
@section('script')
    <script>
        $(".slides").sortable({
            placeholder: 'slide-placeholder',
            axis: "y",
            revert: 150,
            start: function (e, ui) {

                placeholderHeight = ui.item.outerHeight();
                ui.placeholder.height(placeholderHeight + 15);
                $('<div class="slide-placeholder-animator" data-height="' + placeholderHeight + '"></div>').insertAfter(ui.placeholder);

            },
            change: function (event, ui) {

                ui.placeholder.stop().height(0).animate({
                    height: ui.item.outerHeight() + 15
                }, 300);

                placeholderAnimatorHeight = parseInt($(".slide-placeholder-animator").attr("data-height"));

                $(".slide-placeholder-animator").stop().height(placeholderAnimatorHeight + 15).animate({
                    height: 0
                }, 300, function () {
                    $(this).remove();
                    placeholderHeight = ui.item.outerHeight();
                    $('<div class="slide-placeholder-animator" data-height="' + placeholderHeight + '"></div>').insertAfter(ui.placeholder);
                });

            },
            stop: function (e, ui) {

                $(".slide-placeholder-animator").remove();

            },
        });
    </script>
    <script>
        {{--attendance for student--}}
        $(document).ready(function () {

            $('#classroom').change(function () {
                $("#section option").remove();
                $('.attendance').prop("disabled", true);
                var ClassroomId = $(this).val();
                // alert(ClassroomId);

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

                                $('.attendance').prop("disabled", false);

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
                //  if ($('#section').val() != '')
                //  {
                // $('#attendance').attr("disabled",false)
                //  }
            });

            $('#section').change(function () {
                $('.attendance').prop("disabled", false);
            });

        });
        {{--attendance for student--}}
    </script>
@stop

