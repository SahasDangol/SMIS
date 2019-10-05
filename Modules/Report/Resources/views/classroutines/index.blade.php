@extends('master')

@section('title', get_school_info('site_title').' | ClassRoutine Report')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/report/classroutine')}}" method="post"
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

        @if($routine)
            <div class="card">
                <div class="card-body">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h6 class="title"><b>{{get_school_info('school_name')}}</b>
                            </h6>
                            <hr>
                            <div class="text-center">
                                <div class="col-md-12 ">
                                    <div class="wizard-container">
                                        <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                            <div class="wizard-navigation">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#routine"
                                                           aria-expanded="false">Routine Information</a>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div id="routine" class="tab-pane active">
                                                        <div class="card-image">
                                                            <a href="{{url('/').Storage::url($routine->routine_photo) }}">
                                                                <img
                                                                       title="Routine" class="img" height="400" width="400"
                                                                        src="{{url('/').Storage::url($routine->routine_photo) }}"></a>
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
                                // alert("vayo");

                                $("#section option").remove();
                                $("#section")
                                    .selectpicker('refresh');

                                $("#student option").remove();
                                $("#student")
                                    .selectpicker('refresh');

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

                                        $('#student')
                                            .append($("<option selected disabled></option>")
                                                .attr("value", "")
                                                .text(" Choose Student"));

                                        $("#student")
                                            .selectpicker('refresh');
                                    }
                                })

                            });
                        });
                    </script>
@stop

