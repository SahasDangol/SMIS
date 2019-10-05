@extends('master')

@section('title', get_school_info('site_title').' | Show Marks')
@section('head')
    <style type="text/css">
        h4 {
            /*text-align: center;*/
            width: fit-content;
            height: auto;
            margin: 0 auto;
            font-family: "Times New Roman";
            font-size: 15px;

        }
    </style>
@stop
@section('Body')

    <div class="container row">
        <div class="col-md-12">

            <div class="col-md-12">
                <div class="card p-no-break" id="marksheet">
                    <div class="">
                        <div class="card-body ">
                            <div class="row border border-dark">
                                <div class=" col-md-12 ml-auto mr-auto border border-dark rounded">
                                    <center><h4 class="card-title"><b>"{{ucfirst(get_school_info('tagline'))}}"</b></h4></center>
                                    <center><h3 class="card-title"><b><b>{{ucfirst(get_school_info('school_name'))}}</b></b></h3></center>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <center><img src="{{url('/').Storage::url(get_school_info("logo"))}}"
                                                         alt="some image" style="width:100px;"></center>
                                        </div>
                                        <div class="col-sm-4">
                                            <center><h6><b>{{ucfirst(get_school_info('school_address'))}}</b></h6>
                                            </center>
                                            <center><h3><b><b><b>Grade Sheet</b></b></b></h3></center>
                                            <div class="col-sm" style="background-color:lavender;">
                                                <center><b>{{$exam->name}} Examination - {{get_academic_year()}}</b>
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
                                        @foreach($marks as $mark)
                                            @php
                                                $subject =$mark->subject;
                                            @endphp
                                            <tr>
                                                <td>{{ucfirst($subject->subject_name)}}</td>
                                                <td>{{ucfirst($subject->subject_type)}}</td>
                                                <td>{{$subject->credit_hour}}</td>
                                                <td>{{$subject->full_mark*$ratio}}</td>
                                                <td>{{$subject->pass_mark*$ratio}}</td>
                                                <td>
                                                    @if($mark->th_marks<$subject->th_pass_mark*$ratio)
                                                        <div style="color: red">{{$mark->th_marks}}</div>
                                                    @else
                                                        {{$mark->th_marks}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($mark->pr_marks<$subject->pr_pass_mark*$ratio)
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
                                                <td>{{calculate_grade($mark->marks/$ratio,$grades)}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-full-width " style="margin-top: 50%;">
                                        <tr>
                                            <td>Total Full Marks</td>
                                            <td>Total Obtained Marks</td>
                                            <td>Percentage</td>
                                            <td>GPA</td>
                                            <td>Rank</td>
                                        </tr>
                                        <tr>
                                            <td><b>{{$exam_result->full_mark ?? null}}</b></td>
                                            <td><b><b>{{$exam_result->obtained_mark ?? null}}</b></b></td>
                                            <td>
                                                <b>
                                                    @if($exam_result->percentage ?? null)
                                                        @if($exam_result->percentage ==0)
                                                            <div style="color: red">Fail</div>
                                                        @else
                                                            {{$exam_result->percentage}}
                                                        @endif
                                                    @endif
                                                </b>
                                            </td>
                                            <td><b>{{$exam_result->grade ?? null}}</b></td>
                                            <td>{{$exam_result->rank ?? null}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-8">
                                    <table style="line-height: 12px" border="1">

                                        <th colspan="4" style="text-align:center;">GRADE INFORMATION</th>

                                        <tr>
                                            <td height="2">
                                                <b> Obtained Marks in Percentage</b>
                                            </td>
                                            <td>
                                                <b>Grade</b>
                                            </td>
                                            <td>
                                                <b>Grade Point</b>

                                            </td>
                                            <td><b>Explanation</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                90-100
                                            </td>
                                            <td>A+</td>
                                            <td>4.0</td>
                                            <td>Outstanding</td>

                                        </tr>
                                        <tr>
                                            <td>80-below 90</td>
                                            <td>A</td>
                                            <td>3.6</td>
                                            <td>Excellent</td>
                                        </tr>
                                        <tr>
                                            <td>70-below 80</td>
                                            <td>B+</td>
                                            <td>3.2</td>
                                            <td>Very Good</td>
                                        </tr>
                                        <tr>
                                            <td>60-below 70</td>
                                            <td>B</td>
                                            <td>2.8</td>
                                            <td>Good</td>
                                        </tr>
                                        <tr>
                                            <td>50-below 60</td>
                                            <td>C+</td>
                                            <td>2.4</td>
                                            <td>Above Average</td>
                                        </tr>
                                        <tr>
                                            <td>40-below 50</td>
                                            <td>C</td>
                                            <td>2</td>
                                            <td>Average</td>
                                        </tr>
                                        <tr>
                                            <td>30-below 60</td>
                                            <td>D+</td>
                                            <td>1.6</td>
                                            <td>Below Average</td>
                                        </tr>
                                        <tr>
                                            <td>20-below 30</td>
                                            <td>D</td>
                                            <td>1.2</td>
                                            <td>Insufficient</td>
                                        </tr>
                                        <tr>
                                            <td>1-below 20</td>
                                            <td>E</td>
                                            <td>0.8</td>
                                            <td>Very Insufficient</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    .....................................
                                    <div class="float-right">.....................................</div>
                                    <br>
                                    CLass Teacher
                                    <div class="float-right mr-4"> Principal</div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 print-button">
                        <button class="btn btn-default " onclick="PrintElem()">Print</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        fitText(document.querySelector("h4"), 0.38);
    </script>
@stop


