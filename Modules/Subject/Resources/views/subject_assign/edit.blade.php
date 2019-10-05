@extends('master')

@section('title', get_school_info('site_title').' | Optional Subject Assignment | Edit')
@section('Body')
    <div class="col-md-12">
        <div class="card ">
            <div class="card-heading">
                <span class="card-title">
                    <h3 class="text-center">Subject Assignment
                    </h3>
                </span>
            </div>
            <div class="card-body">
                <form id="search_form" class="params-card validate" action="{{ route('subject_assign.create') }}"
                      method="post" autocomplete="off" accept-charset="utf-8">
                    <div class="col-md-12 row ">
                        <div class="col-sm-3">
                            <select id="classroom" name="classroom_id" class="select2"
                                    data-style="select-with-transition"
                                    title="Choose Class" data-size="7" required="true">
                                <option disabled> Select Class</option>
                                @foreach($classrooms as $classroom)
                                    <option value="{{$classroom->id}}"
                                            @if($classroom->id==$classroom_id) selected @endif>{{$classroom->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select id="section" name="section_id" class="select2"
                                    title="Choose Section" data-style="select-with-transition"
                                    data-size="7" required="true">
                                <option disabled> Select Section</option>
                                @if( !empty($section_id) )
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}"
                                                @if($section->id==$section_id) selected @endif>{{$section->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 ">
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-round">Get Students
                                </button>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
                @php
                    $section =$sections->where('id',$section_id)->first();
                    $classroom =$classroom->where('id',$classroom_id)->first();
                    $students=collect();
                    if ($section){
                    $students = $section->students;
                    $optional_subjects = $classroom->subjects->where('subject_type','optional');
                    }

                @endphp
                @if(count($students))
                    <form id="TypeValidation" class="form-horizontal process" action="{{route('subject_assign.store')}}" method="post">
                        <input type="hidden" value="{{$section_id}}" name="section_id">
                        <div class="">
                            <table  class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Student Roll No</th>
                                    <th>Student Name</th>
                                    <th>Optional Subject</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->roll_no}}</td>
                                        <td>{{$student->first_name.' '.$student->last_name}}</td>
                                        <th>
                                            @foreach($optional_subjects as $optional_subject)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="radio_{{$student->id}}"
                                                               value="{{$optional_subject->id}}" checked="">
                                                        {{$optional_subject->subject_name}}
                                                        <span class="circle">
                                                      <span class="check"></span>
                                                    </span>
                                                    </label>
                                                </div>

                                            @endforeach
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary btn-block btn-round">Assign Subjects
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                @endif
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function () {

            $('#classroom').change(function () {
                $("#section option").remove();
                var ClassroomId = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
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
                        $("#section")
                            .selectpicker('refresh');
                    }
                })
            });

        });
    </script>
@stop