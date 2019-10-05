@extends('master')

@section('title', get_school_info('site_title').' | Payment History Report')
@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/report/payment_history')}}" method="post"
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

        @if($history)
            <div class="card">
                <div class="card-body">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h6 class="title"><b>MSRSN School</b>
                            </h6>
                            <hr>
                            <div class="text-center">
                                <div class="col-md-12 ">
                                    <div class="wizard-container">
                                        <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                            <div class="wizard-navigation">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab"
                                                           href="#payment_info" aria-expanded="false">Payment
                                                            History</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div id="payment_info" class="tab-pane active">
                                                        <table class="table table-custom" width="100%">
                                                            <thead>
                                                            <th><b>Date</b></th>
                                                            <th><b>Invoice Id</b></th>
                                                            <th><b>Invoice to</b></th>
                                                            <th><b>Invoice Title</b></th>
                                                            <th><b>Invoice Amount</b></th>
                                                            <th><b>Paid Amount</b></th>
                                                            <th><b>Remaining</b></th>
                                                            <th><b>Payment</b></th>
                                                            <th><b>Status</b></th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($history as $data)
                                                                <tr>
                                                                    <td>{{$data->due_date}}</td>
                                                                    <td>{{$data->id}}</td>
                                                                    <td>{{ucfirst($data->first_name)}} {{ucfirst($data->middle_name)}} {{ucfirst($data->last_name)}}</td>
                                                                    <td>{{$data->title}}</td>
                                                                    <td>Rs. {{$data->total}}/-</td>
                                                                    <td>Rs. {{$data->paid_amount}}/-</td>
                                                                    <td>Rs. {{$data->total-$data->paid_amount}}/-</td>
                                                                    <td>
                                                                        <table class="datatable table-custom"
                                                                               width="100%">
                                                                            <thead class="table-info">
                                                                            <th><b>Date</b></th>
                                                                            <th><b>Amount</b></th>
                                                                            </thead>
                                                                            <tbody>

                                                                            @foreach(get_payment_history($data->invoice_id) as $payment)
                                                                                <tr class="table-success">
                                                                                    <td>{{$payment->date}}</td>
                                                                                    <td>Rs. {{$payment->amount}}/-</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        @if($data->paid==1)
                                                                            <span class="badge badge-success">Paid</span>
                                                                        @else
                                                                            <span class="badge badge-danger">Unpaid</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="fee_collection" class="tab-pane justify-content-center">
                                                        <div id="container" style="height: 400px; width:1000%"></div>
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
                        if (data1.length==1){
                            $.each(data1, function (key, value) {
                                $('#section')
                                    .append($("<option selected></option>")
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
        });
    </script>
@stop

