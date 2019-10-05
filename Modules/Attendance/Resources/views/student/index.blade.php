@extends('master')
@section('title', get_school_info('site_title').' | Student Attendance')

@section('Body')
    <div class="container-fluid">
        @if($attendance == 0)
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
                                  action="{{ url('students/attendance') }}"
                                  method="post" autocomplete="off" accept-charset="utf-8">
                                <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <select id="classroom" name="class_id" class="select2"
                                                data-style="select-with-transition"
                                                title="Choose Class" data-size="7" >

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
                                    <div class="col-lg-2 col-md-2 col-sm-2">

                                            <input name="date" type="text" class="form-control nepali_datepicker"
                                                   placeholder="Date" value="{{$date}}">

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <button  type="submit" class="btn btn-primary btn-round float-right mr-1 attendance" disabled>
                                            Manage Attendance
                                        </button>
                                    </div>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Student Detail</h4>
                        </div>
                        <div class="card-body">
                            <br>
                            <br>
                            <form id="search_form" class="params-panel validate"
                                  action="{{ url('students/attendance') }}"
                                  method="post" autocomplete="off" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Classroom Name</label>
                                            <input name="class_id" type="text" class="form-control"
                                                   value="{{$selected_class}}" readonly disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Name</label>
                                            <input name="section_id" type="text" class="form-control"
                                                   value="{{$selected_section}}" readonly disabled="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Attendance Date</label>
                                            <input name="date" type="text" class="form-control datepicker"
                                                   value="{{$date}}" readonly disabled>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm" id="attendance_table">
                                    <thead class=" text-primary">
                                    <th>Roll Number</th>
                                    <th>Student Name</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Leave</th>
                                    <th>Remarks</th>
                                    </thead>
                                    <tbody>
                                    @foreach($attendances as $student)
                                        <tr>

                                            @php
                                                $roll=explode("-",$student->roll_no);

                                            @endphp
<td>
    {{$roll[1]}}
                                            </td>
                                            <td>{{ucfirst($student->first_name)." ".ucfirst($student->middle_name)." ".ucfirst($student->last_name)}}</td>
                                                <td>
                                                    <a id="present{{$student->attendance_id}}" class="btn btn-sm {{$student->attendance == 1 ? "btn-success": "btn-outline-success"}}  btn-round"
                                                       onclick="set(1,{{$student->attendance_id}})">Present</a>
                                                </td>
                                                <td>
                                                    <a id="absent{{$student->attendance_id}}" class="btn btn-sm {{$student->attendance == 2 ? "btn-danger": "btn-outline-danger"}} btn-round"
                                                       onclick="set(2,{{$student->attendance_id}})">Absent</a>
                                                </td>
                                                <td>
                                                    <a id="leave{{$student->attendance_id}}" class="btn btn-sm {{$student->attendance == 3 ? "btn-info": "btn-outline-info"}} btn-round"
                                                       onclick="set(3,{{$student->attendance_id}})">Leave</a>
                                                </td>



                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>i
            </div>
        @endif
    </div>
@stop
@section('script')
    <script>
        function set(x, y) {
            var update = x;
            var id = y;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "attendance/update",
                method: "POST",
                data: {"attendance": update, "id": id},
                success: function (data1) {
                    document.getElementById('present' + id).removeAttribute("class");
                    document.getElementById('absent' + id).removeAttribute("class");
                    document.getElementById('leave' + id).removeAttribute("class");
                    if (data1 == 1) {
                        console.log("present");
                        $('#present' + id).addClass('btn btn-sm btn-success btn-round');
                        $('#absent' + id).addClass('btn btn-sm btn-outline-danger btn-round');
                        $('#leave' + id).addClass('btn btn-sm btn-outline-info btn-round');
                    }
                    if(data1==2)
                    {
                        console.log("absent");
                        $('#present' + id).addClass('btn btn-sm btn-outline-success btn-round');
                        $('#absent' + id).addClass('btn btn-sm btn-danger btn-round');
                        $('#leave' + id).addClass('btn btn-sm btn-outline-info btn-round');
                    }
                    if(data1==3)
                    {
                        console.log("leave");
                        $('#present' + id).addClass('btn btn-sm btn-outline-success btn-round');
                        $('#absent' + id).addClass('btn btn-sm btn-outline-danger btn-round');
                        $('#leave' + id).addClass('btn btn-sm btn-info btn-round');
                    }
                }
            })
        }

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

