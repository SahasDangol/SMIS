@extends('master')

@section('title', get_school_info('site_title').' | Profile')

@section('Body')
    <br>
    <div class="row">


        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">

                        @if($staff->personal_photo==null)
                            <img class="img" src="{{url('assets/backend/img/default-avatar.png')}}">
                            @else

                        <img class="img" src="{{url('/').Storage::url($staff->personal_photo)}}"/>
                            @endif

                    </a>
                </div>
                <div class="card-body">
                    <h4 class="title"><b>{{ ucfirst($staff->first_name) .' '.ucfirst($staff->middle_name).''.ucfirst($staff->last_name) }}</b></h4>
                    <h5>{{$staff->designations->name}}
                       </h5>
                    <h5>Of</h5>
                    <h5> {{$staff->departments->name}} Department</h5>
                    <hr>

                    <button class="btn btn-rose btn-round" data-toggle="collapse" data-target="#demo">Full Profile
                    </button>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <div class="wizard-navigation">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab" href="#profile"
                                   aria-expanded="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#parent" aria-expanded="false">Parent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#work_experience"
                                   aria-expanded="false">Work Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#training" aria-expanded="false">Training</a>
                            </li>
                            <li class="float-right">
                                <div style="padding: 0px;">
                                    <a href="{{route('staff.edit',[$staff->id])}}"
                                       class="btn btn-primary rect-btn btn-sm"><i class="fa fa-pencil"
                                                                                  aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="profile" class="tab-pane active">

                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>Staff ID</td>
                                        <td>{{ $staff->staff_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Birth</td>
                                        <td>{{ date('d M, Y', strtotime($staff->dob)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ ucfirst($staff->gender)  }}</td>
                                    </tr>
                                    <tr>
                                        <td>Blood Group</td>
                                        <td>{{ ucfirst($staff->blood_group) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$staff->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone No.</td>
                                        <td>
                                            @if($staff->phone==null)
                                                N/A
                                            @else
                                                {{$staff->phone}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No.</td>
                                        <td>{{ $staff->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ ucfirst($staff->permanent_address) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status</td>
                                        <td>{{ ucfirst($staff->marital_status) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>{{ ucfirst($staff->nationality) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Citizenship No.</td>
                                        <td>{{ $staff->citizenship_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Joining Date</td>
                                        <td>
                                            @if($staff->joining_date!=null)

                                            {{ $staff->joining_date }}
                                        @else
                                            N/A
                                                @endif
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div id="parent" class="tab-pane">

                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td>{{ ucfirst($staff->father_first_name) .' '.ucfirst($staff->father_middle_name).' '.ucfirst($staff->father_last_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mother's Name</td>
                                        <td>{{ ucfirst($staff->mother_first_name) .' '.ucfirst($staff->mother_middle_name).' '.ucfirst($staff->mother_last_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Father's Mobile</td>
                                        <td>{{ $staff->father_mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mother's Mobile</td>
                                        <td>
                                            @if($staff->mother_mobile==null)
                                                N/A
                                            @else
                                                {{$staff->mother_mobile  }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Father's Profession</td>
                                        <td> @if($staff->father_occupation==null)
                                                N/A
                                            @else
                                                {{ ucfirst($staff->father_occupation) }}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Mother's Profession</td>
                                        <td> @if($staff->mother_occupation==null)
                                                N/A
                                            @else
                                                {{ ucfirst($staff->mother_occupation) }}
                                            @endif</td>

                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div id="work_experience" class="tab-pane">

                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>Institution Name</td>
                                        <td>
                                            @if($staff->institution_name==null)
                                                N/A
                                            @else
                                                {{ucfirst($staff->institution_name)}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Institution Address</td>
                                        <td>
                                            @if($staff->address==null)
                                                N/A
                                            @else
                                                {{ucfirst($staff->address)}}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Work Duration</td>
                                        <td>
                                            @if($staff->work_duration==null)
                                                N/A
                                            @else
                                                {{ucfirst($staff->work_duration)}}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Reason To Leave</td>
                                        <td>
                                            @if($staff->reason_to_leave==null)
                                                N/A
                                            @else
                                                {{ucfirst($staff->reason_to_leave)}}
                                            @endif</td>
                                    </tr>



                                    </tbody>
                                </table>
                            </div>
                            <div id="training" class="tab-pane">

                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>Training Title</td>
                                        <td>
                                        @if($staff->training_title==null)
                                                N/A
                                            @else
                                        {{ucfirst($staff->training_title)}}
                                        @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Training Duration</td>
                                        <td>
                                            @if($staff->training_duration==null)
                                                N/A
                                            @else
                                            {{ucfirst($staff->training_duration)}}
                                        @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Institution Name</td>
                                        <td>
                                            @if($staff->training_institution_name==null)
                                                N/A
                                            @else
                                            {{ucfirst($staff->training_institution_name)}}

                                        @endif</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop