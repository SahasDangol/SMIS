@extends('master')

@section('title', get_school_info('site_title').' | Show Marks')
@section('Body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default" data-collapsed="0">
                <div class="card-body">
                    <form id="search_form" class=" process params-card validate "
                          action="{{ url('overall/marksheet') }}"
                          method="post" autocomplete="off" accept-charset="utf-8">
                        <div class="col-md-12 row">
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
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
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" style="margin-top:24px;"
                                            class="btn btn-primary btn-block btn-sm btn-round">Marks
                                    </button>
                                </div>
                            </div>
                        </div>


                        {{csrf_field()}}
                    </form>
                    @if($students)
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Marks Table</h4>
                                </div>
                                <div class="card-body">
                                    <div class="material-datatables">
                                        <form action="{{route('marksheet.multipleshow')}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="exam_id" value="{{$exam_id}}"/>
                                            <input type="hidden" name="classroom_id" value="{{$classroom_id}}"/>
                                            <table id="marksheet" data-role="table" data-mode="columntoggle"
                                                   class="table table-striped table-bordered"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <td class="noExport">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" id="checkall"
                                                                       type="checkbox" value="">
                                                                <span class="form-check-sign">
                                                          <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <th>Roll No</th>
                                                    <th>Name</th>
                                                    @foreach($subjects as $subject)
                                                        <th>{{$subject->subject_name}}<br>({{$subject->full_mark}})</th>
                                                    @endforeach
                                                    <th>Total Full Marks</th>
                                                    <th>Total Obtained Marks</th>
                                                    <th>Percentage</th>
                                                    <th>Rank</th>
                                                    <th>Grade</th>
                                                    <th class="noExport">View Marks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($students as $student)
                                                    @php($exam_result = $exam_results->where('student_id',$student->id)->first())
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           name="checkbox[]" value="{{$student->id}}">
                                                                    <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>{{explode("-",$student->roll_no)[1]}}</td>
                                                        <td>{{ucfirst($student->first_name) .' '. ucfirst($student->last_name)}}</td>
                                                        @foreach($subjects as $subject)
                                                            <td>
                                                                {{$data = $student->marks->where('subject_id',$subject->id)
                                                                ->where('exam_id',$exam_id)->first()->marks ?? NULL}}
                                                                @if(empty($data))
                                                                    <i style="color: #aaa">null</i>
                                                                @endif
                                                            </td>
                                                        @endforeach
                                                        <td> {{$exam_result->full_mark ?? null}}</td>
                                                        <td>{{$exam_result->obtained_mark ?? null}}</td>
                                                        <td>
                                                            {{$exam_result->percentage ?? null}}
                                                        </td>
                                                        <td>
                                                            {{$exam_result->rank ?? null}}
                                                        </td>
                                                        <td>
                                                            {{$exam_result->grade ?? null}}
                                                        </td>
                                                        <td>
                                                            <a href="{{url('marksheet/show/'.$student->id.'/'.$exam_id)}}"
                                                               class="btn btn-primary btn-sm">view Marks
                                                                <div class="ripple-container">
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary">
                                                View Selected Marks
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                        </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function printData() {
            var divToPrint = document.getElementById("printTable");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        $(document).ready(function () {
            $('#marksheet').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"

                        }
                    },
                ]


            });

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
                            .append($("<option disabled></option>")
                                .attr("value", "")
                                .text(" Choose Subject"));


                        $.each(data1, function (key, value) {
                            $('#subjects')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.subject_name));
                            console.log(value);
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
                            // console.log(value.id);
                            d = d + 1;
                        });
                        if (d === 1) {
                            $("#section").val(data1[0].id);
                        }


                    }
                })
            });

        });
    </script>
@stop
