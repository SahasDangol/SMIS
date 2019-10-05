@extends('master')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{url('public/css/print.css')}}" media="print"/>
    <style>

        @media print {
            .an, .btnp, .no-print * {
                display: none !important;
            }
        }
    </style>

@stop
@section('title', get_school_info('site_title').' | Student Attendance Report')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card an" id="an">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Student Attendance</h4>
                    </div>

                    <div class="card-body">
                        <form id="TypeValidation" class="form-horizontal process"
                              action="{{URL::to('report/student/attendance/view')}}"
                              method="post"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">

                                        <div class="card-body ">
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <label class="label-info">Class*</label>
                                                    <select id="classroom" name="class_id" class="select2"
                                                            data-style="select-with-transition"
                                                            title="Choose Class" data-size="7">
                                                        <option disabled selected> Select Class</option>
                                                        @foreach($classrooms as $class)
                                                            <option value="{{$class->id}}"
                                                            @if($class->id==$class_id)
                                                                selected
                                                                    @endif
                                                            >{{$class->class_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <label class="label-info">Section*</label>
                                                    <select id="section" name="section_id" class="select2"
                                                            data-style="select-with-transition"
                                                            title="Choose Section" data-size="7">
                                                        <option selected disabled> Select Section</option>
                                                        @foreach($sections as $section)
                                                            <option value="{{$section->id}}"
                                                                    @if($section->id==$section_id)
                                                                    selected
                                                                @endif
                                                            >{{$section->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                {{--<label class="col-sm-1 col-form-label"></label>--}}
                                                <div class="col-sm-4">


                                                    <label class="label-info">Month*</label>

                                                    <select id="month" name="month" class="select2"
                                                            data-style="select-with-transition"
                                                            title="Choose Month" data-size="7">
                                                        <option disabled>Select Month</option>
                                                        <option value=01
                                                                @if($m==01)selected
                                                            @endif>Baisakh</option>
                                                        <option value=02
                                                                @if($m==02)selected
                                                            @endif>Jestha</option>
                                                        <option value=03
                                                                @if($m==03)selected
                                                            @endif>Asadh</option>
                                                        <option value=04
                                                                @if($m==04)selected
                                                            @endif>Shrawan</option>
                                                        <option value=05
                                                        @if($m==05)selected
                                                            @endif
                                                        >Bhadra</option>
                                                        <option value=06
                                                         @if($m==06)selected
                                                            @endif>Ashoj</option>
                                                        <option value=07
                                                         @if($m==07)selected
                                                            @endif>Kartik</option>
                                                        <option value=08
                                                         @if($m=='08') selected
                                                            @endif>Mangsir</option>
                                                        <option value=09
                                                         @if($m=='09')selected
                                                            @endif>Poush</option>
                                                        <option value=10
                                                         @if($m==10)selected
                                                            @endif>Magh</option>
                                                        <option value=11
                                                         @if($m==11)selected
                                                            @endif>Falgun</option>
                                                        <option value=12
                                                         @if($m==12)selected
                                                            @endif>Chaitra</option>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 float-right">

                                                    <button type="submit"
                                                            class="btn btn-sm btn-outline-primary btn-round float-right">
                                                        View
                                                        Report
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div><!--End panel-->

                @if(isset($report_data))

                    <div class="card" id="a">
                        <div class="card-body">

                            <div class="col-md-12 params-panel">


                                <div class="table-responsive">
                                    @if( !empty($report_data) )

                                        <div class="btnp">
                                            <button type="button" onclick="window.print()"
                                                    class="btn btn-primary btn-sm "><i class="fa fa-print"></i>Print
                                                Report
                                            </button>
                                        </div>

                                        <div class="text-center clear">
                                            <center><b>{{ get_option('school_name') }}</b></center>
                                            <center>Attendance Report For Class: @foreach($classrooms as $class)

                                                    @if ($class->id==$selected_classroom)
                                                        <b>{{$class->class_name}}</b>
                                                    @endif
                                                @endforeach </center>
                                            <center>Section: @foreach($classrooms as $class)

                                                    @if ($class->id=$selected_classroom)
                                                        @foreach($sections as $section)
                                                            @if($section->id==$selected_section)
                                                                <b>{{$section->name}}</b>

                                                            @endif

                                                        @endforeach
                                                        @break
                                                    @endif
                                                @endforeach</center>

                                            Month: <b>{{get_nepali_month_name($m)}}</b>

                                        </div>
                                        <table id="datatable"
                                               class="Table table-striped table-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <th>Student Name</th>
                                            <th>Roll</th>
                                            @for($day = 1; $day <= $num_of_days; $day++)
                                                <th>{{ $day }}</th>
                                            @endfor
                                            </thead>
                                            <tbody>
                                            @foreach($report_data as $key=>$value)
                                                <tr>
                                                    <td>{{ ucfirst($students[$key]->first_name)." ".ucfirst($students[$key]->last_name)}}</td>
                                                    @php
                                                    $roll=explode('-',$students[$key]->roll_no);
                                                    @endphp
                                                    <td>{{ $roll[1] }}</td>
                                                    @foreach($value as $student=>$attendance)
                                                        <td class="text-center">{{ $attendance }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <h4 class="text-center"><b>No Records Found !!!</b></h4>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div><!--End panel-->
            </div>
        </div>

        @else
            <div class="col-md-12 params-panel">
                <center><h3>Please Enter a Valid Information!!!</h3></center>
            </div>
        @endif
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function getData(val) {
            var _token = $('input[name=_token]').val();
            var class_id = $('select[name=class_id]').val();
            $.ajax({
                type: "POST",
                url: "{{url('sections/section')}}",
                data: {_token: _token, class_id: class_id},
                beforeSend: function () {
                    $("#preloader").css("display", "block");
                }, success: function (sections) {
                    $("#preloader").css("display", "none");
                    $('select[name=section_id]').html(sections);
                }
            });
        }
    </script>



    <script>
        $(".class").select2({
            placeholder: "Select Class",
            allowClear: true
        });
        $(".section").select2({
            placeholder: "Select Section",
            allowClear: true
        });
        $(".month").select2({
            placeholder: "Select Month",
            allowClear: true
        });
        {{--Dependent Select Options for section--}}
        $(document).ready(function () {
            $('#classroom').change(function () {


                $("#section option").remove();


                $("#student option").remove();


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
                        // alert("hell yeah");
if (data1.length==1){
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

                        $('#student')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Student"));

                    }

                })

            });
        });
    </script>


@stop
