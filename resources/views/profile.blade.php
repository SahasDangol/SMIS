@extends('master')

@section('title', get_school_info('site_title').' | Profile')

@section('Body')
    <br>
    <div class="row">
        @foreach(get_user_detail(Auth::user()->id)['data'] as $detail)
            @if(get_user_detail(Auth::user()->id)['role'] == "Staff")
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="{{url('assets/backend/img/faces/marc.jpg')}}"/>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="title">{{ ucfirst($detail->first_name) .' '.ucfirst($detail->middle_name).''.ucfirst($detail->last_name) }}
                                <br>
                                <a href="{{url('/student/'.$detail->id.'/edit')}}"
                                   class="btn btn-primary btn-link btn-sm">Edit</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wizard-container">
                        <div class="card card-wizard" data-color="rose" id="wizardProfile">
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" role="tab" href="#personal"
                                           aria-expanded="true">Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#parent" aria-expanded="false">Parent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#education" aria-expanded="false">Education</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="personal" class="tab-pane active">
                                        <table class="table table-custom" width="100%">
                                            <tbody>
                                            <tr>
                                                <td><b>Staff Id</b></td>
                                                <td>{{ $detail->staff_id }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Date Of Birth</b></td>
                                                <td>{{ date('d M, Y', strtotime($detail->dob)) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Gender</b></td>
                                                <td>{{ ucfirst($detail->gender)  }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Blood Group</b></td>
                                                <td>{{ ucfirst($detail->blood_group) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Religion</b></td>
                                                @if($detail->religion!=null)
                                                    <td>{{ ucfirst($detail->religion) }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><b>Contact No.</b></td>
                                                <td>{{ $detail->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Address</b></td>
                                                <td>{{ ucfirst($detail->permanent_address) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Nationality</b></td>
                                                <td>{{ ucfirst($detail->nationality) }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="parent" class="tab-pane">
                                        <table class="table table-custom" width="100%">
                                            <tbody>
                                            <tr>
                                                <td><b>Father's Name</b></td>
                                                <td>{{ ucfirst($detail->father_first_name) .' '.ucfirst($detail->father_middle_name).' '.ucfirst($detail->father_last_name) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Mother's Name</b></td>
                                                <td>{{ ucfirst($detail->mother_first_name) .' '.ucfirst($detail->mother_middle_name).' '.ucfirst($detail->mother_last_name) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Father's Mobile</b></td>
                                                <td>{{ $detail->father_mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Mother's Mobile</b></td>
                                                @if($detail->mother_mobile!= null)
                                                    <td>{{$detail->mother_mobile }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><b>Father's Profession</b></td>
                                                @if($detail->father_occupation)
                                                    <td>{{ ucfirst($detail->father_occupation) }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><b>Mother's Profession</b></td>
                                                @if($detail->mother_occupation)
                                                    <td>{{ ucfirst($detail->mother_occupation) }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="education" class="tab-pane">
                                        <table class="table table-custom" width="100%">
                                            <tbody>
                                            <tr>
                                                <td><b>Higher Degree</b></td>
                                                <td>{{ ucfirst($detail->higher_education_degree)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Obtained Grade</b></td>
                                                <td>{{ ucfirst($detail->grade)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Institute Name</b></td>
                                                <td>{{ $detail->institution }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Institute Address</b></td>
                                                @if($detail->institution_address!= null)
                                                    <td>{{$detail->institution_address }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="{{url('assets/backend/img/faces/marc.jpg')}}"/>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="title">{{ ucfirst($detail->first_name) .' '.ucfirst($detail->middle_name).''.ucfirst($detail->last_name) }}
                                <br>
                                <small>Student</small>
                                <br>
                                <a href="{{url('/student/'.$detail->id.'/edit')}}"
                                   class="btn btn-primary btn-link btn-sm">Edit</a>
                            </h4>
                            <button class="btn btn-rose btn-round" data-toggle="collapse" data-target="#demo">Full
                                Profile
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="wizard-container">
                        <div class="card card-wizard" data-color="rose" id="wizardProfile">
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" role="tab" href="#personal"
                                           aria-expanded="true">Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#parent" aria-expanded="false">Parent</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#schoolarship"
                                           aria-expanded="false">Schoolar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="personal" class="tab-pane active">
                                        <table class="table table-custom" width="100%">
                                            <tbody>
                                            <tr>
                                                <td><b>Student Id</b></td>
                                                <td>{{ $detail->roll_no }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Date Of Birth</b></td>
                                                <td>{{ date('d M, Y', strtotime($detail->dob)) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Gender</b></td>
                                                <td>{{ ucfirst($detail->gender)  }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Blood Group</b></td>
                                                <td>{{ ucfirst($detail->blood_group) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Religion</b></td>
                                                @if($detail->religion!=null)
                                                    <td>{{ ucfirst($detail->religion) }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><b>Contact No.</b></td>
                                                <td>{{ $detail->guardian_mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Address</b></td>
                                                <td>{{ ucfirst($detail->permanent_address) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Nationality</b></td>
                                                <td>{{ ucfirst($detail->nationality) }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="parent" class="tab-pane">
                                        <table class="table table-custom" width="100%">
                                            <tbody>
                                            <tr>
                                                <td><b>Father's Name</b></td>
                                                <td>{{ ucfirst($detail->father_first_name) .' '.ucfirst($detail->father_middle_name).' '.ucfirst($detail->father_last_name) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Mother's Name</b></td>
                                                <td>{{ ucfirst($detail->mother_first_name) .' '.ucfirst($detail->mother_middle_name).' '.ucfirst($detail->mother_last_name) }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Father's Mobile</b></td>
                                                <td>{{ $detail->father_mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Mother's Mobile</b></td>
                                                @if($detail->mother_mobile!= null)
                                                    <td>{{$detail->mother_mobile }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><b>Father's Profession</b></td>
                                                @if($detail->father_occupation)
                                                    <td>{{ ucfirst($detail->father_occupation) }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><b>Mother's Profession</b></td>
                                                @if($detail->mother_occupation)
                                                    <td>{{ ucfirst($detail->mother_occupation) }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="schoolarship" class="tab-pane">
                                        <table class="table table-custom" width="100%">
                                            <tbody>
                                            <tr>
                                                <td><b>Schoolarship Percentage</b></td>
                                                @if($detail->percentage)
                                                    <td>{{ ucfirst($detail->percentage)}}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            <br>
                                            <tr>
                                                <td><b>Siblings</b></td>
                                                <td>{{ ucfirst($detail->siblings)}}</td>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td><b>Reason for Schoolarship</b></td>
                                                @if($detail->raeson)
                                                    <td>{{ $detail->raeson }}</td>
                                                @else
                                                    <td>N/A</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

            <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <h4 class="card-title">Change Password
                        <small class="category"></small>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{URL::to('/password/change/'.Auth::user()->id)}}"
                          enctype="multipart/form-data">
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Old Password</label>
                                    <input type="password" name="opass" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">New Password</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rose btn-round pull-right">Change Password</button>
                        <div class="clearfix"></div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop