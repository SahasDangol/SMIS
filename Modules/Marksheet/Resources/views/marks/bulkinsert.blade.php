@extends('master')

@section('title', get_school_info('site_title').' | Bulk Insert Marks')
@section('Body')
    <div class="row justify-content-center">
        <div class="col-md-5 justify-content-center">
            <div class="card card-default" data-collapsed="0">
                <div class="card-heading">
                  <span class="card-title">
                      <h3 class="text-center">	Export Mark
                      </h3>
                  </span>
                </div>
                <div class="card-body justify-content-center">
                    <form id="search_form" class=" params-card validate" action="{{ url('marksheet/export') }}"
                          method="post" autocomplete="off" accept-charset="utf-8">


                        <div class="col-md-5 mr-auto ml-auto">
                            <div class="row form-group">
                                <select id="classroom" name="classroom_id" class="select2 form-control"
                                        data-style="select-with-transition"
                                        title="Choose Class" data-size="7" required>
                                    <option selected disabled> Select Class</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{$classroom->id}}"
                                                @if($classroom->id==$classroom_id)
                                                @php($class_name = $classroom->class_name)
                                                selected @endif>{{$classroom->class_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="row form-group" >

                                <select id="section" name="section_id" class="select2 form-control"
                                        title="Choose Section" data-style="select-with-transition"
                                        data-size="7" required>
                                    <option selected disabled> Select Section</option>
                                    @if( !empty($section_id) )
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}"
                                                    @if($section->id==$section_id)
                                                    @php($section_name = $section->name)
                                                    selected @endif>{{$section->name}}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <br>

                            <div class="row form-group">
                                <select id="exam" name="exam_id" class="select2 form-control"
                                        title="Choose Exam" data-style="select-with-transition"
                                        data-size="7" required>
                                    <option selected disabled> Select Exam</option>
                                    @foreach($exams as $exam)
                                        <option value="{{$exam->id}}"
                                                @if($exam->id==$exam_id)
                                                @php($current_exam = $exam)
                                                selected @endif>{{$exam->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-5 row ml-auto mr-auto">

                                <div class="form-group">
                                    <button type="submit" style="margin-top:24px;"
                                            class="btn btn-primary btn-sm btn-block btn-round form-control " >Export
                                        Marks
                                    </button>

                            </div>
                        </div>

                        {{csrf_field()}}
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-5 justify-content-center" >
            <div class="card card-default" data-collapsed="0">
                <div class="card-heading">
                  <span class="card-title">
                      <h3 class="text-center">Import Mark
                      </h3>
                  </span>
                </div>
                <div class="card-body">
                    <br>
                    <br>
                    <div class="card-footer justify-content-center col-md-3 mr-auto ml-auto">
                        <a href="#" class="btn btn-round btn-primary btn-sm btn-block" data-toggle="modal"
                           data-target="#myModal10">Import Mark</a>
                    </div>
                        {{--<div class="col-md-5 row ml-auto mr-auto">--}}

                            {{--<div class="form-group">--}}
                               {{----}}

                            {{--</div>--}}
                        {{--</div>--}}



                    {{--file choosing modal--}}
                    <div class="modal fade modal-mini modal-primary ml-auto mr-auto" id="myModal10" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-small">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                            class="material-icons">clear</i></button>
                                </div>
                                <form action="{{url('marksheet/import')}}" method="post" enctype="multipart/form-data">
                                    <div class="modal-body justify-content-center">
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 ml-auto mr-auto align-content-center">
                                                <div class="fileinput fileinput-new text-center justify-content-center"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail img-circle">
                                                        <img src="{{url('assets/backend/img/excel.png')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                    <div>
                                                <span class="btn btn-outline-primary btn-sm btn-round btn-file">
                                                <span class="fileinput-new">Choose File</span>
                                                <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="file"/>
                                                </span>
                                                        <button type="submit" class="fileinput-exists btn btn-primary btn-sm btn-round">Import</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--file choosing modal--}}

                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>


        {{--Subjects--}}

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

    {{--attendance for student--}}
@stop
