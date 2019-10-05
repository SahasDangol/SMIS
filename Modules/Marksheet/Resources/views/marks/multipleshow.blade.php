@extends('master')

@section('title', get_school_info('site_title').' | Show Marks')
@section('head')



    <style type="text/css">

        @media print {

        }
    </style>

@stop
@section('Body')

    <div class="container row">
        <div class="" id="masterContent">
            <div class="col-md-12">
                @foreach($students as $student)
                    @php($exam_result = $exam_results->where('student_id',$student->id)->first())

                @php
                    $tagline = get_school_info('tagline');
                    $school_name = get_school_info('school_name');
                    $logo = get_school_info("logo");
                    $school_address = get_school_info('school_address');
                    $academics_year = get_academic_year();
                @endphp
                    <div class="card" id="marksheet">
                        {{--<img class="card-img" src="{{asset('assets/backend/img/Background1.jpg')}}">--}}
                        <div class="">
                            <div class="card-body ">
                                <div class="row border border-dark">
                                    <div class=" col-md-12 ml-auto mr-auto border border-dark rounded">
                                        <center><h4 class="card-title"><b>"{{ucfirst($tagline)}}"</b></h4>
                                        </center>
                                        <center><h3 class="card-title"><b><b>{{ucfirst($school_name)}}</b></b>
                                            </h3></center>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <center><img src="{{url('/').Storage::url($logo)}}"
                                                             alt="some image" style="width:100px;"></center>
                                            </div>
                                            <div class="col-sm-4">
                                                <center><h6><b>{{ucfirst($school_address)}}</b></h6>
                                                </center>
                                                <center><h3><b><b><b>Grade Sheet</b></b></b></h3></center>
                                                <div class="col-sm" style="background-color:lavender;">
                                                    <center><b>{{$exam->name}} Examination - {{$academics_year}}</b>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ml-auto mr-auto border border-dark rounded">
                                        <table class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <tr>
                                                <td>Student Name :
                                                    <b><b>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</b></b>
                                                </td>
                                                <td>Class : <b><b>{{$student->classrooms->class_name}}</b></b></td>
                                                <td>Section :<b><b>{{$student->sections->name}}</b></b></td>
                                                <td>Roll No. : <b><b>{{explode('-',$student->roll_no)[1]}}</b></b></td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="col-md-12 ml-auto mr-auto">
                                        <table class="table table-bordered table-full-width ">
                                            <thead>
                                            <tr>
                                                <td rowspan="2"><b>Subject Name</b></td>
                                                <td rowspan="2"><b>Subject Type</b></td>
                                                <td rowspan="2"><b>Credit Hour</b></td>
                                                <td rowspan="2"><b>Full Marks</b></td>
                                                <td rowspan="2"><b>Pass Marks</b></td>
                                                <td colspan="2"><b>Obtained Marks</b></td>
                                                <td rowspan="2"><b>Total Marks</b></td>
                                                <td rowspan="2"><b>Grade</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Th</b></td>
                                                <td><b>Pr</b></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($marks->where('student_id',$student->id) as $mark)
                                                @php($subject =$mark->subjects)
                                                <tr>
                                                    <td>{{ucfirst($subject->subject_name)}}</td>
                                                    <td>{{ucfirst($subject->subject_type)}}</td>
                                                    <td>{{$subject->credit_hour}}</td>
                                                    <td>{{$subject->full_mark * $ratio}}</td>
                                                    <td>{{$subject->pass_mark * $ratio}}</td>
                                                    <td>
                                                        @if($mark->th_marks<$subject->th_pass_mark* $ratio)
                                                            <div style="color: red">{{$mark->th_marks}}</div>
                                                        @else
                                                            {{$mark->th_marks}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($mark->pr_marks<$subject->pr_pass_mark * $ratio)
                                                            <div style="color: red">{{$mark->pr_marks}}</div>
                                                        @else
                                                            {{$mark->pr_marks}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($mark->result=="0")
                                                            <div style="color: red">{{$mark->marks}}</div>
                                                        @else
                                                            {{$mark->marks}}
                                                        @endif
                                                    </td>
                                                    <td>{{calculate_grade($mark->marks,$grades)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-full-width ">
                                            <tr>
                                                <td>Total Full Marks</td>
                                                <td>Total Obtained Marks</td>
                                                <td>Percentage</td>
                                                <td>GPA</td>
                                                <td>Rank</td>
                                            </tr>
                                            <tr>
                                                <td><b>{{$exam_result->full_mark}}</b></td>
                                                <td><b><b>{{$exam_result->obtained_mark}}</b></b></td>
                                                <td>
                                                    <b>
                                                        @if($exam_result->percentage==0)
                                                            <div style="color: red">Fail</div>
                                                        @else
                                                            {{$exam_result->percentage}}
                                                        @endif

                                                    </b>
                                                </td>
                                                <td><b>{{$exam_result->grade}}</b></td>
                                                <td>{{$exam_result->rank}}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        .....................................
                                        <div class="float-right">.....................................</div>
                                        <br>
                                        Class Teacher
                                        <div class="float-right mr-4"> Principal</div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 print-button">
                            <button class="btn btn-default " onclick="PrintElem()">Print</button>
                        </div>

                    </div>
                    <div class="page-break"></div>
                    <br><br>
                @endforeach
                <div class="col-md-1 print-button float-right">
                    <button class="btn btn-rose " onclick="javascript:window.print()" id="btnPrint"
                            style="position: fixed; bottom: 10px; right: 10px;">Print All</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')

@stop


