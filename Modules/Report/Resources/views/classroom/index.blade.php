@extends('master')

@section('title', get_school_info('site_title').' | Classroom Report')
@section('Body')
    <div class="container-fluid br-mainpanel">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/report/classroom/')}}" method="post"
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

        @if($students)
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
                                                        <a class="nav-link active" data-toggle="tab" href="#class_info" aria-expanded="false">Class Information</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#class_teacher" aria-expanded="false">Class Teacher</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#subjects" aria-expanded="false">Subject</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#fee_types" aria-expanded="false">Fee Types</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#fee_collection" aria-expanded="false">Fee Collection</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div id="class_info" class="tab-pane active">
                                                        <table class="table table-custom" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td class="text-center"><b>Class Name / Section Name : </b></td>
                                                                <td>

                                                                        {{ucfirst($classname->class_name)}}
                                                                        / {{ucfirst($sectionname->name)}}

                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Expected Payment : </b></td>
                                                                <td>Rs. {{$students}}/-</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Working Days : </b></td>
                                                                <td>{{$students}} days</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Total Students : </b></td>
                                                                <td>{{$students}}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Total Assigned Subjects : </b></td>
                                                                <td>{{count($subjects)}}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="class_teacher" class="tab-pane">
                                                        <table class="table table-custom" width="100%">
                                                            <tbody>
                                                            @if($class_teacher)
                                                            <tr>
                                                                <td class="text-center"><b>Staff Id : </b></td>
                                                                <td>{{ucfirst($class_teacher->staff_id)}}</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Full Name : </b></td>
                                                                <td>{{ucfirst($class_teacher->first_name)}} {{ucfirst($class_teacher->middle_name)}} {{ucfirst($class_teacher->last_name)}}</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Mobile : </b></td>
                                                                <td>{{$class_teacher->mobile}}</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Email : </b></td>
                                                                <td>{{$class_teacher->email}}</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Address : </b></td>
                                                                <td>{{ucfirst($class_teacher->permanent_address)}}</td>
                                                                <td></td>
                                                            </tr>

                                                            @else
                                                            <tr>
                                                                <td class="text-center"><h3>Not Assigned Yet</h3></td>
                                                            </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="subjects" class="tab-pane">
                                                        <table class="table table-custom" width="100%">
                                                            <thead>
                                                            <th><b>Subject Code</b></th>
                                                            <th><b>Subject Name</b></th>
                                                            <th><b>Subject Type</b></th>
                                                            <th><b>Credit Hour</b></th>

                                                            </thead>
                                                            <tbody>
                                                            @if($subjects)
                                                            @foreach($subjects as $subject)
                                                            <tr>
                                                                <td>{{$subject->subject_code}}</td>
                                                                <td>{{ucfirst($subject->subject_name)}}</td>
                                                                <td>{{ucfirst($subject->subject_type)}}</td>
                                                                <td>{{$subject->credit_hour}}</td>

                                                            </tr>
                                                            @endforeach
                                                                @else
                                                            <tr>
                                                                <td class="text-center"><h4>No Subjects Assigned Yet</h4></td>
                                                            </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="fee_types" class="tab-pane">
                                                        <table class="table table-custom" width="100%">
                                                            <thead>
                                                            <th><b>Fee Code</b></th>
                                                            <th><b>Fee Name</b></th>
                                                            <th></th>
                                                            <th></th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($fee_types as $fee_type)
                                                                <tr>
                                                                    <td>{{$fee_type->fee_code}}</td>
                                                                    <td>{{ucfirst($fee_type->fee_type)}}</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="fee_collection" class="tab-pane justify-content-center" >
                                                        <div  id="container" style="height: 400px; width:100%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script type="text/javascript">
        var collected = {{get_collected_payment() }};
        var remaining = {{ get_total_payment_to_be_collected() }};
    </script>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            // Initialise the admin graphs
            graphs.fee_collections_init();
        });
    </script>

    <script>
        {{--Dependent Select Options for section--}}
        $(document).ready(function () {
            $('#classroom').change(function () {
                // alert("vayo");

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




                    }
                })

            });
        });
    </script>
@stop

