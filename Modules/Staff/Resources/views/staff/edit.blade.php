@extends('master')

@section('title', get_school_info('site_title').' | Edit Staff')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="rose" id="wizardProfile">
                        <form class="form-horizontal process" action="{{URL::to('/staff/'.$staff->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Edit Staff
                                </h3>
                                <h5 class="card-description">This information will let us know more about you.</h5>
                            </div>

                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#personal" data-toggle="tab" role="tab">
                                            Personal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#father" data-toggle="tab" role="tab">
                                            Father
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#mother" data-toggle="tab" role="tab">
                                            Mother
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#health" data-toggle="tab" role="tab">
                                            Health
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#qualification" data-toggle="tab" role="tab">
                                            Qualilfication
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#work_experience" data-toggle="tab" role="tab">
                                            Work Experience
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#training" data-toggle="tab" role="tab">
                                            Training
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#official" data-toggle="tab" role="tab">
                                            Official
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body ">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personal">

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        @if($staff->personal_photo==null)
                                                            <img class="picture-src" src="{{url('assets/backend/img/default-avatar.png')}}">
                                                        @else
                                                            <img src="{{url('/').Storage::url($staff->personal_photo)}}"
                                                             class="picture-src" id="wizardPicturePreview"
                                                             title=""/>
                                                        @endif
                                                        <input type="file" id="wizard-picture" name="personal_photo"
                                                               accept="image/*" >
                                                    </div>
                                                    <h6 class="description">Choose Personal Picture</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-md-8">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FirstName" class="bmd-label-floating">First
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   id="FirstName" name="first_name"
                                                                   value="{{ucfirst($staff->first_name)}}"
                                                                   >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MiddleName" class="bmd-label-floating">Middle
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                   id="MiddleName" name="middle_name"
                                                                   value="{{ucfirst($staff->middle_name)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="LastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   id="LastName" name="last_name"
                                                                   value="{{ucfirst($staff->last_name)}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select id="Gender" class="select2" data-size="7"
                                                                    name="gender"
                                                                    data-style="select-with-transition"
                                                                    title="Select Gender" required="true">
                                                                <option selected disabled>Select Gender*</option>
                                                                <option value="Male"
                                                                        @if($staff->gender=='Male') selected @endif>Male
                                                                </option>
                                                                <option value="Female"
                                                                        @if($staff->gender=='Female') selected @endif>
                                                                    Female
                                                                </option>
                                                                <option value="Others"
                                                                        @if($staff->gender=='Others') selected @endif>
                                                                    Others
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input class="form-control nepali_datepicker" type="text"
                                                                   name="dob"
                                                                   maxlength="10" placeholder="Birthday*"
                                                                   value="{{get_nepali_date($staff->dob)}}" required="true"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select id="MaritalStatus" class="select2"
                                                                    data-size="7"
                                                                    name="marital_status"
                                                                    data-style="select-with-transition"
                                                                    title="Select Martital Status" required="true">
                                                                <option disabled selected>Marital Status</option>
                                                                <option value="Single"
                                                                        @if($staff->marital_status=='Single') selected @endif>
                                                                    Single
                                                                </option>
                                                                <option value="Married"
                                                                        @if($staff->marital_status=='Married') selected @endif>
                                                                    Married
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        @if($staff->citizenship_photo==null)
                                                            <img class="picture-src" src="{{url('assets/backend/img/default-avatar.png')}}">
                                                        @else
                                                            <img src="{{url('/').Storage::url($staff->citizenship_photo)}}"
                                                                 class="picture-src" id="wizardPicturePreview"
                                                                 title=""/>
                                                        @endif
                                                        <input type="file" onchange="changeImage(this)"
                                                               name="citizenship_photo" accept="image/*">
                                                    </div>
                                                    <h6 class="description">Choose Citizenship Photo</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 col-md-8">
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="Permanent" class="bmd-label-floating">Permanent
                                                                Address*</label>
                                                            <input type="text" class="form-control"
                                                                   id="Permanent" name="permanent_address"
                                                                   value="{{ucfirst($staff->permanent_address)}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="Temporary" class="bmd-label-floating">Temporary
                                                                Address</label>
                                                            <input type="text" class="form-control"
                                                                   id="Temporary" name="temporary_address"
                                                                   value="{{ucfirst($staff->temporary_address)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Email*</label>
                                                            <input class="form-control" type="text" maxlength="50"
                                                                   name="email" email="true"
                                                                   value="{{$staff->email}}" required="true"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Phone Number
                                                            </label>
                                                            <input class="form-control" name="phone" type="number" min="100000" max="9999999999"
                                                                   maxlength="15"
                                                                   value="{{$staff->phone}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="Mobile" class="bmd-label-floating">Mobile
                                                                Number*
                                                            </label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{$staff->mobile}}" id="mobile" name="mobile"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="citizenship_no" class="bmd-label-floating">Citizenship
                                                                No.*
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   id="citizenship_no" name="citizenship_no"
                                                                   value="{{$staff->citizenship_no}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="Nationality" class="bmd-label-floating">Nationality*
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   id="Nationality" name="nationality"
                                                                   value="{{ucfirst($staff->nationality)}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane" id="father">
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-8 col-md-8">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="FatherFirstName" class="bmd-label-floating">First
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ucfirst($staff->father_first_name)}}"
                                                                   id="FatherFirstName" name="father_first_name"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherMiddleName"
                                                                   class="bmd-label-floating">Middle
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                   id="FatherMiddleName" name="father_middle_name"
                                                                   value="{{ucfirst($staff->father_middle_name)}}" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherLastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ucfirst($staff->father_last_name)}}"
                                                                   id="FatherLastName" name="father_last_name"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="FatherPhone" class="bmd-label-floating">Phone
                                                            </label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{$staff->father_phone}}" id="FatherPhone"
                                                                   name="father_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherMobile" class="bmd-label-floating">Mobile*
                                                            </label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{$staff->father_mobile}}" id="FatherMobile"
                                                                   name="father_mobile">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherOccupation"
                                                                   class="bmd-label-floating">Occupation
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ucfirst($staff->father_occupation)}}"
                                                                   id="FatherOccupation" name="father_occupation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="mother">
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-8 col-md-8">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="MotherFirstName" class="bmd-label-floating">First
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   id="MotherFirstName" name="mother_first_name"
                                                                   value="{{ucfirst($staff->mother_first_name)}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherMiddleName"
                                                                   class="bmd-label-floating">Middle
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$staff->mother_middle_name}}"
                                                                   id="MotherMiddleName" name="mother_middle_name"
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherLastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ucfirst($staff->mother_last_name)}}"
                                                                   id="MotherLastName" name="mother_last_name"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="MotherPhone" class="bmd-label-floating">Phone
                                                            </label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{$staff->mother_phone}}" id="MotherPhone"
                                                                   name="mother_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherMobile" class="bmd-label-floating">Mobile
                                                                *</label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{$staff->mother_mobile}}" id="MotherMobile"
                                                                   name="mother_mobile"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherOccupation"
                                                                   class="bmd-label-floating">Occupation
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ucfirst($staff->mother_occupation)}}"
                                                                   id="MotherOccupation" name="mother_occupation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="health">
                                        <br>
                                        <br>
                                        <div class="row justify-content-center">

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select id="BloodGroup" class="select2" data-size="7"
                                                            name="blood_group"
                                                            value="Select Your Blood Group"
                                                            data-style="select-with-transition"
                                                            title="Select Blood Group" required="true">
                                                        <option selected disabled>Select Your Blood Group</option>
                                                        <option value="A+"
                                                                @if($staff->blood_group=='A+') selected @endif>A+
                                                        </option>
                                                        <option value="A-"
                                                                @if($staff->blood_group=='A-') selected @endif>A-
                                                        </option>
                                                        <option value="B+"
                                                                @if($staff->blood_group=='B+') selected @endif>B+
                                                        </option>
                                                        <option value="B-"
                                                                @if($staff->blood_group=='B-') selected @endif>B-
                                                        </option>
                                                        <option value="O+"
                                                                @if($staff->blood_group=='O+') selected @endif>O+
                                                        </option>
                                                        <option value="O-"
                                                                @if($staff->blood_group=='O-') selected @endif>O-
                                                        </option>
                                                        <option value="AB+"
                                                                @if($staff->blood_group=='AB+') selected @endif>AB+
                                                        </option>
                                                        <option value="AB-"
                                                                @if($staff->blood_group=='AB-') selected @endif>AB-
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Comment" class="bmd-label-floating">Comment (Only if any
                                                        Special Health Issue)</label>
                                                    <textarea id="Comment" class="form-control" name="comments"
                                                              rows="5">{{ucfirst($staff->comments)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="official">
                                        <br>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4">
                                                <div class="form-group">

                                                    <select class="select2" data-size="7" name="department_id"

                                                            data-style="select-with-transition" title="department"
                                                            required="true">
                                                        <option disabled selected>Department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{$department->id}}"
                                                                    @if($staff->department_id==$department->id)
                                                                    selected
                                                            @endif>{{$department->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">

                                                    <select class="select2" data-size="7" name="designation_id"
                                                            data-style="select-with-transition" required="true">
                                                        <option disabled>Designation</option>
                                                        @foreach($designations as $designation)
                                                            <option value="{{$designation->id}}"
                                                                    @if($staff->designation_id==$designation->id)
                                                                    selected
                                                                    @endif
                                                            >{{$designation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="qualification">
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="higher_education_degree" class="bmd-label-floating">Higher
                                                        Education Degree*</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->higher_education_degree)}}"
                                                           id="higher_education_degree" name="higher_education_degree"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">

                                                    <select id="grade" class="select2"
                                                            data-size="7"
                                                            name="grade"
                                                            data-style="select-with-transition"
                                                            title="Obtained Grade in Previous School"
                                                            required="true">
                                                        <option selected disabled>Grade*</option>
                                                        @foreach($grades as $grade)
                                                            <option value="{{$grade->id}}"
                                                                    @if($staff->grade==$grade->id)
                                                                    selected
                                                            @endif>{{$grade->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="Institution" class="bmd-label-floating">Institution
                                                        Name*</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->institution)}}" id="institution"
                                                           name="institution"
                                                           required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="InstitutionAddress"
                                                           class="bmd-label-floating">Address of Institution</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->institution_address)}}"
                                                           id="institution_address" name="institution_address"
                                                          >
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="work_experience">
                                        <br>
                                        <br>
                                        <div class="row ">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="InstitutionName" class="bmd-label-floating">Name of
                                                        Institution</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->institution_name)}}" id="institution_name"
                                                           name="institution_name"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="InstitutionAddress" class="bmd-label-floating">Address
                                                        of Institution</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->address)}}" id="address" name="address"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="WorkDuration" class="bmd-label-floating">Work
                                                        Duration</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->work_duration)}}" id="work_duration"
                                                           name="work_duration"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label for="Reason" class="bmd-label-floating">Reason (Only if any
                                                        Special Reason)</label>
                                                    <textarea id="Reason" class="form-control" name="reason_to_leave"
                                                              rows="5" required>{{ucfirst($staff->reason_to_leave)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="training">
                                        <br>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="TrainingName" class="bmd-label-floating">Training
                                                        Name</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->training_title)}}" id="training_title"
                                                           name="training_title"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="TrainingDuration" class="bmd-label-floating">Training
                                                        Duration</label>
                                                    <input type="text" class="form-control"
                                                           value="{{ucfirst($staff->training_duration)}}" id="training_duration"
                                                           name="training_duration"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="InstitutionName" class="bmd-label-floating">Name of
                                                        Institution</label>
                                                    <input type="text" class="form-control"
                                                           id="training_institution_name"
                                                           value="{{ucfirst($staff->training_institution_name)}}"
                                                           name="training_institution_name"
                                                    >
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <div class="mr-auto">
                                            <input type="button"
                                                   class="btn btn-previous btn-fill btn-default btn-wd disabled"
                                                   name="previous" value="Previous">
                                        </div>
                                        <div class="ml-auto">
                                            <input type="button" class="btn btn-next btn-fill btn-rose btn-wd"
                                                   name="next"
                                                   value="Next">
                                            <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"
                                                   name="finish" value="Finish" style="display: none;">
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        function changeImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picturePreview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
