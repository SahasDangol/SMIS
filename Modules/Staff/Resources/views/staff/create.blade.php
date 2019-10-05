@extends('master')

@section('title', get_school_info('site_title').' | Add New Staff')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="wizard-container">
                    <div class="card card-wizard" data-color="rose" id="wizardProfile">
                        <form id="TypeValidation" class="form-horizontal process" action="{{url('staff')}}"
                              method="post" enctype="multipart/form-data">
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    New Staff
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
                                                        <img src="{{url('assets/backend/img/default-avatar.png')}}"
                                                             class="picture-src" id="wizardPicturePreview"
                                                             title=""/>
                                                        <input type="file" id="wizard-picture" name="personal_photo"
                                                               value="{{old('personal_photo')}}"  accept="image/*">
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
                                                                   value="{{old('first_name')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MiddleName" class="bmd-label-floating">Middle
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{old('middle_name')}}" id="MiddleName"
                                                                   name="middle_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="LastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{old('last_name')}}" id="LastName"
                                                                   name="last_name"
                                                                   required>
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
                                                                        @if(old('gender')=="Male")
                                                                        selected
                                                                        @endif>Male
                                                                </option>
                                                                <option value="Female"
                                                                        @if(old('gender')=="Female")
                                                                        selected
                                                                        @endif>Female
                                                                </option>
                                                                <option value="Others"
                                                                        @if(old('gender')=="Others")
                                                                        selected
                                                                        @endif>Others
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input class="form-control nepali_datepicker" type="text"
                                                                   name="dob"
                                                                   maxlength="10" placeholder="Birthday*"
                                                                   value="{{old('dob')}}" required="true"/>
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
                                                                        @if(old('marital_status')=="Single")
                                                                        selected
                                                                        @endif>Single
                                                                </option>
                                                                <option value="Married"
                                                                        @if(old('marital_status')=="Married")
                                                                        selected
                                                                        @endif>Married
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
                                                        <img src="{{url('assets/backend/img/default-avatar.png')}}"
                                                             class="picture-src" id="picturePreview"
                                                             title=""/>
                                                        <input type="file" onchange="changeImage(this)"
                                                               name="citizenship_photo"
                                                               value="{{old('citizenship_photo')}}"  accept="image/*">
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
                                                                   value="{{old('permanent_address')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="Temporary" class="bmd-label-floating">Temporary
                                                                Address</label>
                                                            <input type="text" class="form-control"
                                                                   id="Temporary" name="temporary_address"
                                                                   value="{{old('temporary_address')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Email*</label>
                                                            <input class="form-control" type="text" maxlength="50"
                                                                   name="email" email="true"
                                                                   value="{{old('email')}}" required="true"/>
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
                                                                   value="{{old('phone')}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="Mobile" class="bmd-label-floating">Mobile
                                                                Number*
                                                            </label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   id="mobile" name="mobile"
                                                                   value="{{old('mobile')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="citizenship_no" class="bmd-label-floating">Citizenship
                                                                No.*
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   id="citizenship_no" name="citizenship_no"
                                                                   value="{{old('citizenship_no')}}">
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
                                                                   value="{{old('nationality')}}" required>
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
                                                                   value="{{old('father_first_name')}}"
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
                                                                   value="{{old('father_middle_name')}}"
                                                                   id="FatherMiddleName" name="father_middle_name"
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherLastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{old('father_last_name')}}"
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
                                                                   value="{{old('father_phone')}}" id="FatherPhone"
                                                                   name="father_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherMobile" class="bmd-label-floating">Mobile*
                                                            </label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{old('father_mobile')}}" id="FatherMobile"
                                                                   name="father_mobile" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FatherOccupation"
                                                                   class="bmd-label-floating">Occupation
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   value="{{old('father_occupation')}}"
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
                                                                   value="{{old('mother_first_name')}}"
                                                                   id="MotherFirstName" name="mother_first_name"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherMiddleName"
                                                                   class="bmd-label-floating">Middle
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                   id="MotherMiddleName" name="mother_middle_name"
                                                                   value="{{old('mother_middle_name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherLastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{old('mother_last_name')}}"
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
                                                                   value="{{old('mother_phone')}}" id="MotherPhone"
                                                                   name="mother_phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MotherMobile" class="bmd-label-floating">Mobile
                                                                *</label>
                                                            <input type="number" min="100000" max="9999999999" class="form-control"
                                                                   value="{{old('mother_mobile')}}" id="MotherMobile"
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
                                                                   value="{{old('mother_occupation')}}"
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

                                                            data-style="select-with-transition"
                                                            title="Select Blood Group" required="true">
                                                        <option selected disabled>Select Your Blood Group</option>
                                                        <option value="A+"
                                                                @if(old('blood_group')=='A+')
                                                                selected
                                                                @endif>A+
                                                        </option>
                                                        <option value="A-"
                                                                @if(old('blood_group')=='A-')
                                                                selected
                                                                @endif>A-
                                                        </option>
                                                        <option value="B+"
                                                                @if(old('blood_group')=='B+')
                                                                selected
                                                                @endif>B+
                                                        </option>
                                                        <option value="B-"
                                                                @if(old('blood_group')=='B-')
                                                                selected
                                                                @endif>B-
                                                        </option>
                                                        <option value="O+"
                                                                @if(old('blood_group')=='O+')
                                                                selected
                                                                @endif>O+
                                                        </option>
                                                        <option value="O-"
                                                                @if(old('blood_group')=='O-')
                                                                selected
                                                                @endif>O-
                                                        </option>
                                                        <option value="AB+"
                                                                @if(old('blood_group')=='AB+')
                                                                selected
                                                                @endif>AB+
                                                        </option>
                                                        <option value="AB-"
                                                                @if(old('blood_group')=='AB-')
                                                                selected
                                                                @endif>AB-
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Comment" class="bmd-label-floating">Comment (Only if any
                                                        Special Health Issue)</label>
                                                    <textarea id="Comment" class="form-control" name="comments"
                                                              rows="5">{{old('comments')}}</textarea>
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
                                                           value="{{old('higher_education_degree')}}"
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
                                                                    @if(old('grade')==$grade->id)
                                                                    selected
                                                                    @endif>{{$grade->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-sm btn-round btn-primary" data-toggle="modal"
                                                            data-target="#grades">Quick Add
                                                    </button>
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
                                                           value="{{old('institution')}}" id="institution"
                                                           name="institution"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="InstitutionAddress"
                                                           class="bmd-label-floating">Address of Institution</label>
                                                    <input type="text" class="form-control"
                                                           value="{{old('institution_address')}}"
                                                           id="institution_address" name="institution_address"
                                                           value="">
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
                                                           value="{{old('institution_name')}}" id="institution_name"
                                                           name="institution_name"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="InstitutionAddress" class="bmd-label-floating">Address
                                                        of Institution</label>
                                                    <input type="text" class="form-control"
                                                           value="{{old('address')}}" id="address" name="address"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="WorkDuration" class="bmd-label-floating">Work
                                                        Duration</label>
                                                    <input type="text" class="form-control"
                                                           value="{{old('work_duration')}}" id="work_duration"
                                                           name="work_duration"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row ">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="Reason" class="bmd-label-floating">Reason To
                                                        Leave</label>
                                                    <textarea id="Reason" class="form-control" name="reason_to_leave"
                                                              rows="5" required="true" >{{old('reason_to_leave')}} </textarea>
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
                                                           value="{{old('training_title')}}" id="training_title"
                                                           name="training_title"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="TrainingDuration" class="bmd-label-floating">Training
                                                        Duration</label>
                                                    <input type="text" class="form-control"
                                                           value="{{old('training_duration')}}" id="training_duration"
                                                           name="training_duration"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">

                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="InstitutionName" class="bmd-label-floating">Name of
                                                        Institution</label>
                                                    <input type="text" class="form-control"
                                                           value="{{old('training_institution_name')}}"
                                                           id="training_institution_name"
                                                           name="training_institution_name"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="official">
                                        <br>
                                        <br><br>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <select id="staff_department" class="select2" data-size="7" name="department_id"
                                                            data-style="select-with-transition" title="department"
                                                            required="true">
                                                        <option disabled selected>Department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{$department->id}}"
                                                                    @if(old('department_id')==$department->id)
                                                                    selected
                                                                    @endif>{{$department->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-sm btn-round btn-primary" data-toggle="modal"
                                                            data-target="#departments">Quick Add
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <select id="staff_designation" class="select2" data-size="7" name="designation_id"
                                                            data-style="select-with-transition" required="true">
                                                        <option disabled selected>Designation</option>
                                                        @foreach($designations as $designation)
                                                            <option value="{{$designation->id}}"
                                                                    @if(old('designation_id')==$designation->id)
                                                                    selected
                                                                    @endif
                                                            >{{$designation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-sm btn-round btn-primary" data-toggle="modal"
                                                            data-target="#designations">Quick Add
                                                    </button>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
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
                {{--Quick Add Grade--}}
                <div class="modal fade" id="grades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: rgba(0,0,0,0.5);">
                            <div class="modal-body">
                                <button type="button" class="close btn btn-round btn-primary" data-dismiss="modal"
                                        aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">New Grade (Quick)</h4>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <br>
                                        <div class="row">
                                            <div class="container">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Grade Name</label>
                                                    <input id="grade_name" class="form-control"
                                                           value="{{ old('name') }}"
                                                           type="text"
                                                           maxlength="15" name="name" required="true"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Percentage From</label>
                                                    <input id="grade_from" class="form-control"
                                                           value="{{ old('from') }}"
                                                           type="text"
                                                           maxlength="3" name="from" required="true"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Percentage Upto</label>
                                                    <input id="grade_upto" class="form-control"
                                                           value="{{ old('upto') }}"
                                                           type="text"
                                                           maxlength="3" name="upto" required="true"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Remarks</label>
                                                    <input id="grade_remarks" class="form-control"
                                                           value="{{ old('remarks') }}"
                                                           type="text"
                                                           name="remarks"/>
                                                </div>
                                            </div>
                                            <br>
                                            <label class="col-sm-6 col-form-label"></label>
                                            <button class="btn btn-primary btn-round float-right mr-1"
                                                    onclick="add_grade();">
                                                Add New Grade
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Quick Add Grade--}}

                {{--Quick Add Department--}}
                <div class="modal fade" id="departments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: rgba(0,0,0,0.5);">
                            <div class="modal-body">
                                <button type="button" class="close btn btn-round btn-primary" data-dismiss="modal"
                                        aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">New Department</h4>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <br>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Department Name</label>
                                                    <input id="department_name" class="form-control" value="{{ old('name') }}" type="text"
                                                           maxlength="100" name="name" required="true"/>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="col-sm-5 col-form-label"></label>
                                            <button class="btn btn-primary btn-round float-right mr-1" onclick="add_department();">
                                                Add New Department
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Quick Add Department--}}

                {{--Quick Add Designation--}}
                <div class="modal fade" id="designations" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: rgba(0,0,0,0.5);">
                            <div class="modal-body">
                                <button type="button" class="close btn btn-round btn-primary" data-dismiss="modal"
                                        aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">New Designation</h4>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <br>
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Designation Name</label>
                                                    <input id="designation_name" class="form-control" value="{{ old('name') }}" type="text"
                                                           maxlength="100" name="name" required="true"/>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="col-sm-5 col-form-label"></label>
                                            <button class="btn btn-primary btn-round float-right mr-1" onclick="add_designation();">
                                                Add New Designation
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Quick Add Designation--}}
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
        function add_grade() {
            var Grade_Name = document.getElementById("grade_name").value;
            var From = document.getElementById("grade_from").value;
            var Upto = document.getElementById("grade_upto").value;
            var Remarks = document.getElementById("grade_remarks").value;

            // alert(Grade_Name);

            if (Grade_Name != " " || From != " " || Upto != " ") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('exams/grade/quick')}}",
                    method: "POST",
                    data: {"grade_name": Grade_Name, "from": From, "upto": Upto, "remarks": Remarks},
                    success: function (data1) {
                        // alert("hello");

                        $("#grade option").remove();
                        $("#grade")
                            .selectpicker('refresh');

                        $('#grade')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Section"));

                        $('#grade')
                            .append($("<option selected></option>")
                                .attr("value", "N/A")
                                .text(" None"));


                        $.each(data1, function (key, value) {
                            $('#grade')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.name));
                        });

                        $("#grade")
                            .selectpicker('refresh');
                    }
                })

                $('#grades').modal('hide');
            }
        }

        function add_department() {
            var Department_Name = document.getElementById("department_name").value;

            alert(Department_Name);

            if (Department_Name != " " ) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('departments/quick')}}",
                    method: "POST",
                    data: {"department_name": Department_Name},
                    success: function (data1) {
                        alert("hello");

                        $("#staff_department option").remove();
                        $("#staff_department")
                            .selectpicker('refresh');

                        $('#staff_department')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Department"));

                        $.each(data1, function (key, value) {
                            $('#staff_department')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.name));
                        });

                        $("#staff_department")
                            .selectpicker('refresh');
                    }
                })
                document.getElementById("department_name").value=" ";

                $('#departments').modal('hide');
            }
        }

        function add_designation() {
            var Designation_Name = document.getElementById("designation_name").value;

            alert(Designation_Name);

            if (Designation_Name != " " ) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('designations/quick')}}",
                    method: "POST",
                    data: {"designation_name": Designation_Name},
                    success: function (data1) {
                        alert("hello");

                        $("#staff_designation option").remove();
                        $("#staff_designation")
                            .selectpicker('refresh');

                        $('#staff_designation')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Department"));

                        $.each(data1, function (key, value) {
                            $('#staff_designation')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.name));
                        });

                        $("#staff_designation")
                            .selectpicker('refresh');
                    }
                })
                document.getElementById("designation_name").value=" ";

                $('#designations').modal('hide');
            }
        }
    </script>
@stop
