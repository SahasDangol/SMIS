@extends('master')

@section('title', get_school_info('site_title').' | Student Report')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/report/students')}}" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">Select Information</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
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

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2" data-size="7" id="student" name="student_id"
                                                data-style="select-with-transition" title="Select Section"
                                                required="true">
                                            <option disabled selected>Select Student</option>
                                            @if( !empty($student_id) )
                                                @foreach($students as $student)
                                                    <option value="{{$student->id}}"
                                                            @if($student->id==$student_id) selected @endif>{{$student->first_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-round float-right mr-1">View
                                            Report
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>

        @if($students)
            <div class="card">
                <div class="card-body">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h6 class="title"><b>{{get_school_info('school_name')}}</b>
                            </h6>
                            <hr>
                            <div class="text-center">
                                <div class="col-md-12 ">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            @if(!empty($students->personal_photo))
                                                <img src="{{url('/').Storage::url($students->personal_photo)}}"
                                                     class="img"
                                                     title="{{ucfirst($students->first_name) .' '.ucfirst($students->middle_name).''.ucfirst($students->last_name) }}"/>
                                            @else
                                                <img src="{{url('assets/backend/img/default-avatar.png')}}"
                                                     class="img"
                                                     title=""/>
                                            @endif
                                            {{--<img class="img" src="{{url('/').Storage::url($students->personal_photo)}}"/>--}}

                                        </a>
                                    </div>
                                    <h4 class="title">{{ ucfirst($students->first_name) .' '.ucfirst($students->middle_name).''.ucfirst($students->last_name) }}
                                        <br>


                                    </h4>
                                    <div class="wizard-container">
                                        <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                            <div class="wizard-navigation">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" role="tab"
                                                           href="#profile"
                                                           aria-expanded="true">Personal</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#guardian"
                                                           aria-expanded="false">Guardian</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#academics_1"
                                                           aria-expanded="false">Academics</a>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#invoices"
                                                           aria-expanded="false">Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#payments_history"
                                                           aria-expanded="false">Payment
                                                            History</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#transportation"
                                                           aria-expanded="false">Transportation
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div id="profile" class="tab-pane active">
                                                        <table class="table table-custom" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td><b>Roll No</b></td>

                                                                <td>{{ $students->roll_no }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Date Of Birth</b></td>
                                                                <td>{{ date('d M, Y', strtotime($students->dob)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Gender</b></td>
                                                                <td>{{ ucfirst($students->gender)  }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Blood Group</b></td>
                                                                <td>{{ ucfirst($students->blood_group) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Religion</b></td>
                                                                <td>{{ ucfirst($students->religion) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Contact No.</b></td>
                                                                <td>{{ $students->guardians->guardian_mobile }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Address</b></td>
                                                                <td>{{ ucfirst($students->permanent_address) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Nationality</b></td>
                                                                <td>{{ ucfirst($students->nationality) }}</td>
                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="guardian" class="tab-pane">
                                                        <table class="table table-custom" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td><b>Guardian's Relation</b></td>
                                                                <td>{{ ucfirst($students->relation)}}</td>
                                                            </tr><tr>
                                                                <td><b>Name</b></td>
                                                                <td>{{ ucfirst($students->guardians->guardian_first_name) .' '.ucfirst($students->guardians->guardian_middle_name).' '.ucfirst($students->guardians->guardian_last_name) }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td><b>Phone</b></td>
                                                                <td>@if($students->guardians->guardian_phone==null)
                                                                        N/A
                                                                    @else
                                                                        {{$students->guardians->guardian_phone  }}
                                                                    @endif</td>
                                                            </tr>
                                                            <tr>

                                                                <td><b>Mobile</b></td>
                                                                <td>
                                                                   {{$students->guardians->guardian_mobile}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Email</b></td>
                                                                <td>
                                                                    @if ($students->guardians->guardian_email==null)
                                                                        N/A
                                                                    @else
                                                                        {{ucfirst($students->guardians->guardian_email) }}
                                                                    @endif</td>
                                                            </tr>


                                                            <tr>
                                                                <td><b>Address</b></td>
                                                                <td>{{ ucfirst($students->guardians->guardian_permanent_address) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Occupation</b></td>
                                                                <td>
                                                                    @if ($students->guardians->guardian_occupation==null)
                                                                        N/A
                                                                    @else
                                                                        {{ucfirst($students->guardians->guardian_occupation) }}
                                                                    @endif</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="academics_1" class="tab-pane">
                                                        <table class="table table-custom" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td><b>Roll No</b></td>

                                                                <td>{{ $students->roll_no }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Class</b></td>

                                                                <td>
                                                                    @foreach($classrooms as $class)
                                                                        @if($class->id==$students->classroom_id)

                                                                            {{

                                                                 $class->class_name }}
                                                                        @endif
                                                                    @endforeach</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Section</b></td>

                                                                <td>
                                                                    @foreach($sections as $section)
                                                                        @if($section->id==$students->section_id)

                                                                            {{

                                                                 $section->name }}
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="invoices" class="tab-pane">
                                                        <div class="material-datatables">
                                                            <table id="datatables"
                                                                   class="dataTable table-striped table-no-bordered table-hover"
                                                                   style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>Due Date</th>
                                                                    <th>Title</th>
                                                                    <th>Total</th>
                                                                    <th>Paid</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @php $currency = get_option('currency_symbol') @endphp

                                                                @foreach($invoices as $invoice)
                                                                    <tr>

                                                                        <td>{{ date('d M, Y', strtotime($invoice->due_date)) }}</td>
                                                                        <td style='max-width:250px;'>{{ $invoice->title }}</td>
                                                                        <td>{{ $currency." ".$invoice->total }}</td>
                                                                        <td>{{ $currency." ".$invoice->paid }}</td>
                                                                        <td>
                                                                            {!! $invoice->paid==1.00 ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-danger">UnPaid</span>' !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="payments_history" class="tab-pane">
                                                        <div class="material-datatables">
                                                            <table id="datatables1"
                                                                   class="dataTable table-striped table-no-bordered table-hover"
                                                                   style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>Invoice ID</th>
                                                                    <th>Date</th>
                                                                    <th>Total</th>
                                                                    <th>Remarks</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @php $currency = get_option('currency_symbol') @endphp


                                                                @if($payments_history!=null)
                                                                    @foreach($payments_history as $payment)


                                                                        <tr>
                                                                            <td>{{ $payment->invoice_id}}</td>
                                                                            <td>{{ date('d M, Y', strtotime($payment->date)) }}</td>

                                                                            <td>{{ $currency." ".$payment->amount }}</td>
                                                                            <td style='max-width:250px;'>

                                                                                @if($payment->remarks==null)
                                                                                    N/A
                                                                                @else
                                                                                    {{$payment->remarks}}
                                                                                @endif</td>

                                                                        </tr>

                                                                    @endforeach
                                                                @endif


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div id="transportation" class="tab-pane">
                                                        @if($students->route==null)
                                                            <br><br><br>
                                                            <br><h4 class="text-center">
                                                                No School Transportation Used
                                                            </h4>

                                                        @else
                                                            <table class="table table-custom" width="100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td><b>School Bus Used: </b></td>

                                                                    <td>Yes</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Transportation Route: </b></td>

                                                                    <td>{{$students->route}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--Section : {{$class_teacher}}--}}
                </div>
            </div>
        @endif
    </div>

@stop
@section('script')
    {{--data table Payment History Tab script--}}
    <script>
        $(document).ready(function () {
            $('#datatables1').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },

                dom: 'Blfrtip',

                extend: 'collection',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Copy</button>',
                        titleAttr: 'Copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<button class=" btn btn-primary btn-round btn-sm">CSV</button>',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Excel</button>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Pdf</button>',
                        titleAttr: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<button class=" btn btn-primary btn-round float-right btn-sm col-sm-12">Print</button>',
                        titleAttr: 'Print',
                        exportOptions: {
                            columns: ':visible',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    },
                    {
                        extend: 'columnsToggle',
                        // columns: 0
                    },
                ]
            });

            $('.buttons-copy').detach().appendTo('#buttons')
            $('.buttons-csv').detach().appendTo('#buttons')
            $('.buttons-excel').detach().appendTo('#buttons')
            $('.buttons-pdf').detach().appendTo('#buttons')
            $('.buttons-print').detach().appendTo('#buttons')

            $('.buttons-columnVisibility').detach().appendTo('#column')

        });
    </script>
    <script type="text/javascript">


        var dom = document.getElementById("container");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
            backgroundColor: '#2c343c',

            title: {
                text: 'Customized Pie',
                left: 'center',
                top: 20,
                textStyle: {
                    color: '#ccc'
                }
            },

            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },

            visualMap: {
                show: false,
                min: 80,
                max: 600,
                inRange: {
                    colorLightness: [0, 1]
                }
            },
            series: [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '50%'],
                    data: [
                        {value: 335, name: '直接访问'},
                        {value: 400, name: '搜索引擎'}
                    ].sort(function (a, b) {
                        return a.value - b.value;
                    }),
                    roseType: 'radius',
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            },
                            smooth: 0.2,
                            length: 10,
                            length2: 20
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: '#c23531',
                            shadowBlur: 200,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },

                    animationType: 'scale',
                    animationEasing: 'elasticOut',
                    animationDelay: function (idx) {
                        return Math.random() * 200;
                    }
                }
            ]
        };
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }

    </script>
    <script>

        {{--Dependent Select Options for section--}}
        $(document).ready(function () {
            $('#classroom').change(function () {

                $("#section option").remove();
                $("#student option").remove();
                var ClassroomId = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        if (data1.length == 1) {
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
                        else {
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

            $('#section').change(function () {
                // alert("section change vayo vayo");

                $("#student option").remove();


                var SectionId = $(this).val();
                // alert(ClassroomId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('get_student')}}",
                    method: "POST",
                    data: {"section_id": SectionId},
                    success: function (data2) {
                        $('#student')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Student"));

                        $.each(data2, function (key, value) {
                            $('#student')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.first_name.charAt(0).toUpperCase() + value.first_name.slice(1) + " " + value.last_name.charAt(0).toUpperCase() + value.last_name.slice(1)));
                        });


                    }
                })

            });
        });
    </script>
@stop

