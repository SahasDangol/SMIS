@extends('master')

@section('title', get_school_info('site_title').' | Add New Student')
@section('Body')
    <div class="container-fluid">
        <div class="col-md-12 col-12 ">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <form class="process" action="{{url('student')}}" method="post" enctype="multipart/form-data">
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                                New Student Admission

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
                                    <a class="nav-link" href="#guardian" data-toggle="tab" role="tab">
                                        Guardian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#health" data-toggle="tab" role="tab">
                                        Health
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#previous" data-toggle="tab" role="tab">
                                        Previous
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#transportation" data-toggle="tab" role="tab">
                                        Transport
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#scholarship" data-toggle="tab" role="tab">
                                        Scholarship and Official
                                    </a>
                                </li>
                                {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#official" data-toggle="tab" role="tab">--}}
                                {{--Official--}}
                                {{--</a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal">
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="{{url('assets/backend/img/default-avatar.png')}}"
                                                         class="picture-src" id="wizardPicturePreview"
                                                         title=""/>
                                                    <input type="file" id="wizard-picture" name="personal_photo"
                                                           value="{{old('personal_photo')}}" accept="image/*">
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
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="FirstName"
                                                               class="bmd-label-floating">Gender*</label>
                                                        <select id="Gender" class="select2" data-size="4"
                                                                name="gender"
                                                                data-style="select-with-transition"
                                                                title="Select Gender" required="true">
                                                            <option selected disabled>Select Gender*</option>
                                                            <option value="Male"
                                                                    @if(strtoupper(old('gender'))=='MALE')
                                                                    selected
                                                                @endif>Male
                                                            </option>
                                                            <option value="Female"
                                                                    @if(strtoupper(old('gender'))=='FEMALE')
                                                                    selected
                                                                @endif>Female
                                                            </option>
                                                            <option value="Others"
                                                                    @if(strtoupper(old('gender'))=='OTHERS')
                                                                    selected
                                                                @endif>Others
                                                            </option>
                                                            <option value="N/A"
                                                                    @if(strtoupper(old('gender'))=='N/A')
                                                                    selected
                                                                @endif>Male
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="FirstName"
                                                               class="bmd-label-floating">Religion*</label>
                                                        <select id="Religion" class="select2" data-size="7"
                                                                name="religion"
                                                                data-style="select-with-transition"
                                                                title="Select Religion" required="true">
                                                            <option selected disabled>Select Religion*</option>
                                                            <option value="Hindu"
                                                                    @if(strtoupper(old('religion'))=='HINDU')
                                                                    selected
                                                                @endif>Hindu
                                                            </option>
                                                            <option value="Christian"
                                                                    @if(strtoupper(old('religion'))=='CHRISTIAN')
                                                                    selected
                                                                @endif>Christian
                                                            </option>
                                                            <option value="Budhist"
                                                                    @if(strtoupper(old('religion'))=='BUDDHIST')
                                                                    selected
                                                                @endif>Buddhist
                                                            </option>
                                                            <option value="Islam"
                                                                    @if(strtoupper(old('religion'))=='ISLAM')
                                                                    selected
                                                                @endif>Islam
                                                            </option>
                                                            <option value="Others"
                                                                    @if(strtoupper(old('religion'))=='OTHERS')
                                                                    selected
                                                                @endif>Others
                                                            </option>
                                                            <option value="N/A"
                                                                    @if(strtoupper(old('religion'))=='N/A')
                                                                    selected
                                                                @endif>Others
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="DOB"
                                                               class="bmd-label">Date of Birth*</label>
                                                        <br>
                                                        <input class="form-control nepali_datepicker" type="text"
                                                               name="dob"
                                                               maxlength="10"
                                                               placeholder="Click here for your Birthday*"
                                                               value="{{old('dob')}}" required="true"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Permanent" class="bmd-label">Permanent
                                                            Address*</label>
                                                        <br>
                                                        <input type="text" class="form-control"
                                                               id="Permanent" name="permanent_address"
                                                               value="{{old('permanent_address')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Temporary" class="bmd-label-floating">Temporary
                                                            Address</label>
                                                        <input type="text" class="form-control"
                                                               id="Temporary" name="temporary_address"
                                                               value="{{old('temporary_address')}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Nationality" class="bmd-label-floating">Nationality*
                                                        </label>
                                                        <input type="text" class="form-control"
                                                               id="Nationality" name="nationality"
                                                               value="{{!empty(old('nationality')) ? old('nationality') : "Nepali"}}"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="guardian">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="row float-right mr-1">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <div class="sm-2">
                                                        <a class="btn btn-round btn-sm btn-outline-primary"
                                                           data-toggle="modal"
                                                           data-target="#guardian_add">Add New Guardian
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row justify-content-center ">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="CurrentClass" class="bmd-label-floating">Already have
                                                    Guardian?</label>
                                                <select class="select2 guardian_list" data-size="7"
                                                        name="guardian_id"
                                                        value="Select Your Guardian"
                                                        data-style="select-with-transition"
                                                        title="Select Guardian" required="true">
                                                    <option selected disabled>Select Guardian</option>
                                                    @foreach ($guardians as $guardian)
                                                        <option value="{{$guardian->id}}"
                                                        >{{ucfirst($guardian->guardian_first_name).' '.ucfirst($guardian->guardian_middle_name).' '.ucfirst($guardian->guardian_last_name).'('.$guardian->guardian_mobile.')'}}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="CurrentSection" class="bmd-label-floating">Guardian
                                                    Relation*</label>
                                                <select id="guardian_relation" class="select2" data-size="7"
                                                        name="relation"
                                                        value="Select Relation"
                                                        data-style="select-with-transition"
                                                        title="Select Guardian" required="true">
                                                    <option selected disabled>Select Relation</option>

                                                    <option value="father"

                                                    >Father
                                                    </option>
                                                    <option value="mother"

                                                    >Mother
                                                    </option>
                                                    <option value="other"

                                                    >Other
                                                    </option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="health">
                                    <br>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="Height" class="bmd-label-floating">Height</label>
                                                <input type="text" class="form-control"
                                                       value="{{old('height')}}" id="Height" name="height">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="Weight" class="bmd-label-floating">Weight</label>
                                                <input type="text" class="form-control"
                                                       value="{{old('weight')}}" id="Weight" name="weight"
                                                >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <select id="BloodGroup" class="select2" data-size="7"
                                                        name="blood_group"
                                                        value="Select Your Blood Group"
                                                        data-style="select-with-transition"
                                                        title="Select Blood Group" required="true">
                                                    <option selected disabled>Select Your Blood Group</option>
                                                    <option value="N/A"
                                                            @if(strtoupper(old('blood_group'))=='N/A')
                                                            selected
                                                        @endif>N/A
                                                    </option>
                                                    <option value="A+"
                                                            @if(strtoupper(old('blood_group'))=='A+')
                                                            selected
                                                        @endif>A+
                                                    </option>
                                                    <option value="A-"
                                                            @if(strtoupper(old('blood_group'))=='A-')
                                                            selected
                                                        @endif>A-
                                                    </option>
                                                    <option value="B+"
                                                            @if(strtoupper(old('blood_group'))=='B+')
                                                            selected
                                                        @endif>B+
                                                    </option>
                                                    <option value="B-"
                                                            @if(strtoupper(old('blood_group'))=='B-')
                                                            selected
                                                        @endif>B-
                                                    </option>
                                                    <option value="O+"
                                                            @if(strtoupper(old('blood_group'))=='O+')
                                                            selected
                                                        @endif>O+
                                                    </option>
                                                    <option value="O-"
                                                            @if(strtoupper(old('blood_group'))=='O-')
                                                            selected
                                                        @endif>O-
                                                    </option>
                                                    <option value="AB+"
                                                            @if(strtoupper(old('blood_group'))=='AB+')
                                                            selected
                                                        @endif>AB+
                                                    </option>
                                                    <option value="AB-"
                                                            @if(strtoupper(old('blood_group'))=='AB-')
                                                            selected
                                                        @endif>AB-
                                                    </option>
                                                    <option value="N/A"
                                                            @if(strtoupper(old('blood_group'))=='N/A')
                                                            selected
                                                        @endif>N/A
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="Comment" class="bmd-label">Comment (Only if any Special
                                                    Health Issue)</label>
                                                <textarea id="Comment" class="form-control" name="comments"
                                                          rows="5"> {{old('comments')}} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="previous">
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="{{url('assets/backend/img/pdf-outline.png')}}"
                                                         class="picture-src" id="wizardPicturePreview4"
                                                         title=""/>
                                                    <input type="file" value="{{old('file')}}" id="wizard-picture4"
                                                           name="file" accept="image/*">
                                                </div>
                                                <h6 class="description">Upload Marksheet</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-md-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="SchoolName" class="bmd-label-floating">Previous
                                                            School Name*</label>
                                                        <input type="text" class="form-control"
                                                               id="SchoolName" name="previous_school_name"
                                                               value="N/A"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PreviousAddress" class="bmd-label-floating">Previous
                                                            School Address*</label>
                                                        <input type="text" class="form-control"
                                                               id="PreviousAddress" name="previous_school_address"
                                                               value="N/A" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PreviousClass" class="bmd-label-floating">Previous
                                                            Class*</label>
                                                        <input type="text" class="form-control"
                                                               id="PreviousClass" name="previous_class"
                                                               value="N/A" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PreviousSchoolGrade" class="bmd-label-floating">Previous
                                                            Grade*</label>
                                                        <input type="text" class="form-control"
                                                               id="PreviousSchoolGrade" name="grade"
                                                               value="N/A" required>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PreviousSchoolPhone" class="bmd-label-floating">Previous
                                                            School Phone</label>
                                                        <input type="number" min="100000" max="9999999999"
                                                               class="form-control"
                                                               value="N/A"
                                                               id="PreviousSchoolPhone" name="previous_school_phone">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PreviousSchoolEmail" class="bmd-label-floating">Previous
                                                            School Email</label>
                                                        <input type="text" class="form-control"
                                                               id="PreviousSchoolEmail" name="previous_school_email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="transportation">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="RouteName" class="bmd-label-floating">Transport Route Name
                                                    (If interested in School Transportation )</label>
                                                <br>
                                                <select id="RouteName" class="select2" data-size="7"
                                                        name="route_id"
                                                        data-style="select-with-transition"
                                                        title="Select Route">
                                                    <option selected disabled>Select Route</option>
                                                    @foreach($transports as $transport)
                                                        <option value="{{$transport->id}}"
                                                                @if(old('route_id')==$transport->id)
                                                                selected
                                                            @endif>{{$transport->route_name}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="scholarship">
                                    <br>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="CurrentClass" class="bmd-label-floating">Select Class in
                                                    which you want to Admission</label>
                                                <select id="CurrentClass" class="select2" data-size="13"
                                                        name="classroom_id"
                                                        data-style="select-with-transition"
                                                        title="Select Class" required="true">
                                                    <option selected disabled>Select Class*</option>
                                                    @foreach($classrooms as $classroom)
                                                        <option value="{{$classroom->id}}"
                                                                @if(old('classroom_id')==$classroom->id)
                                                                selected
                                                            @endif>{{$classroom->class_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="CurrentSection" class="bmd-label-floating">Select
                                                    Section</label>
                                                <select id="CurrentSection" class="select2" data-size="16"
                                                        name="section_id"
                                                        data-style="select-with-transition"
                                                        title="Select Section" required="true">
                                                    <option selected disabled>Select Section*</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="scholarship_type" class="bmd-label-floating">Scholarship
                                                    In (If any)</label>
                                                <select class="select2-multiple" data-size="13" id="feeType"
                                                        name="fee_type_id[]"
                                                        data-style="select-with-transition" title="Select Fee Types"
                                                        multiple="multiple">
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="Percentage" class="bmd-label-floating">Scholarship
                                                    Percentage (If any)</label>
                                                <select id="Percentage" class="select2" data-size="7"
                                                        name="percentage"
                                                        data-style="select-with-transition"
                                                        title="Select Scholarship Percentage">
                                                    <option disabled selected>Scholarship Percentage</option>
                                                    <option value="100"
                                                            @if(old('percentage')=='100')
                                                            selected
                                                        @endif>100%
                                                    </option>
                                                    <option value="75"
                                                            @if(old('percentage')=='75')
                                                            selected
                                                        @endif>75%
                                                    </option>
                                                    <option value="50"
                                                            @if(old('percentage')=='50')
                                                            selected
                                                        @endif>50%
                                                    </option>
                                                    <option value="25"
                                                            @if(old('percentage')=='25')
                                                            selected
                                                        @endif>25%
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="Reason" class="bmd-label-floating">Reason (Only if any
                                                    Special Reason)</label>
                                                <br>
                                                <textarea id="Reason" class="form-control" name="reason"
                                                          rows="5">{{old('reason')}} </textarea>
                                            </div>
                                        </div>
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
                                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next"
                                       value="Next">
                                <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"
                                       name="finish" value="Finish" style="display: none;">
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        @csrf
                    </form>

                    {{--Quick Add Guardian--}}
                    <div class="modal fade" id="guardian_add" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: rgba(0,0,0,0.5);">
                                <div class="modal-body">
                                    <button type="button" class="close btn btn-round btn-primary float-right"
                                            data-dismiss="modal"
                                            aria-hidden="true">
                                        <i class="material-icons">clear</i>
                                    </button>
                                    <div class="card ">
                                        <div class="card-header card-header-success card-header-text">
                                            <div class="card-text">
                                                <h4 class="card-title">New Guardian (Quick)</h4>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <br>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="FirstName" class="bmd-label-floating">First
                                                                Name*</label>
                                                            <input id="guardian_first_name" class="form-control"
                                                                   value="{{ old('guardian_first_name') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_first_name"
                                                                   required="true"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="MiddleName" class="bmd-label-floating">Middle
                                                                Name</label>
                                                            <input id="guardian_middle_name" class="form-control"
                                                                   value="{{ old('guardian_middle_name') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_middle_name"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="LastName" class="bmd-label-floating">Last
                                                                Name*</label>
                                                            <input id="guardian_last_name" class="form-control"
                                                                   value="{{ old('guardian_last_name') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_last_name"
                                                                   required="true"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Email</label>
                                                            <input id="guardian_email" class="form-control"
                                                                   value="{{ old('guardian_email') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_email"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Phone</label>
                                                            <input id="guardian_phone" class="form-control"
                                                                   value="{{ old('guardian_phone') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_phone"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Mobile*</label>
                                                            <input id="guardian_mobile" class="form-control"
                                                                   value="{{ old('guardian_mobile') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_mobile"
                                                                   required="true"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Temporary Address</label>
                                                            <input id="guardian_temporary_address" class="form-control"
                                                                   value="{{ old('guardian_temporary_address') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_temporary_address"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Permanent Address*</label>
                                                            <input id="guardian_permanent_address" class="form-control"
                                                                   value="{{ old('guardian_permanent_address') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_permanent_address"
                                                                   required="true"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Occupation</label>
                                                            <input id="guardian_occupation" class="form-control"
                                                                   value="{{ old('guardian_occupation') }}"
                                                                   type="text"
                                                                   maxlength="100" name="guardian_occupation"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="col-sm-7 col-form-label"></label>
                                                <button class="btn btn-outline-primary btn-round float-right mr-1"
                                                        id="addGuardian">
                                                    Add Guardian
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Quick Add Guardian--}}
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
@stop

@section('script')
    <script>

        {{--section from class--}}
        $(document).ready(function () {
            $('#addGuardian').click(function (e) {
                var GuardianFirstName = $("#guardian_first_name").val();
                var GuardianMiddleName =$("#guardian_middle_name").val();
                var GuardianLastName = $("#guardian_last_name").val();
                var GuardianEmail = $("#guardian_email").val();
                var GuardianPhone =$("#guardian_phone").val();
                var GuardianMobile =$("#guardian_mobile").val();
                var GuardianTemporaryAddress =$("#guardian_temporary_address").val();
                var GuardianPermanentAddress = $("#guardian_permanent_address").val();
                var GuardianOccupation = $("#guardian_occupation").val();

                if (GuardianFirstName && GuardianLastName && GuardianMobile && GuardianPermanentAddress) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{url('guardian/quick')}}",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "guardian_first_name": GuardianFirstName,
                            "guardian_middle_name": GuardianMiddleName,
                            "guardian_last_name": GuardianLastName,
                            "guardian_email": GuardianEmail,
                            "guardian_phone": GuardianPhone,
                            "guardian_mobile": GuardianMobile,
                            "guardian_temporary_address": GuardianTemporaryAddress,
                            "guardian_permanent_address": GuardianPermanentAddress,
                            "guardian_occupation": GuardianOccupation
                        },
                        success: function (data) {
                            $('.guardian_list')
                                .append($("<option></option>")
                                    .attr("value", data.guardian_id)
                                    .text(GuardianFirstName + GuardianMiddleName + GuardianLastName + "(" + GuardianMobile + ")"));
                            showNotification("top", "right", "New Guardian Added Successfully", "success");
                        },
                        error: function (data1) {
                            console.log(data1.responseText);
                            var err = $.parseJSON(data1.responseText).message;
                            console.log($.parseJSON(data1.responseText).message);

                            showNotification("top", "right", err, "danger");
                            // console.log(data1.responseText['message']);
                        }
                    })

                    $('#guardian_add').modal('hide');
                } else {
                    showNotification("top", "right", "Please fill all of the required field", "danger");
                }

            });


            $('.select2-multiple').select2({
                placeholder: "Scholarship In"
            });


            $('#CurrentClass').change(function () {


                $("#CurrentSection option").remove();


                var ClassroomId = $(this).val();


                load_fees_types(ClassroomId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // url:"/gadmin/dynamic_dependent/fetch",
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        if (data1.length === 1) {
                            $.each(data1, function (key, value) {
                                $('#CurrentSection')
                                    .append($("<option selected></option>")
                                        .attr("value", value.id)
                                        .text(value.name));
                            });
                        } else {
                            $('#CurrentSection')
                                .append($("<option selected disabled></option>")
                                    .attr("value", "")
                                    .text(" Choose Section"));


                            $.each(data1, function (key, value) {
                                $('#CurrentSection')
                                    .append($("<option></option>")
                                        .attr("value", value.id)
                                        .text(value.name));
                            });
                        }

                    }
                })
            });
        });

        {{--section from class--}}

        {{--Fees Types Loading--}}
        function load_fees_types(id) {

            $("#scholarship_in option").remove();
            var ClassroomId = id;
            let csrf = $('meta[name="csrf-token"]');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrf.attr('content')
                },
                url: "{{url('get_fee_types')}}",
                method: "POST",
                data: {"classroom_id": ClassroomId},
                success: function (data1) {
                    $.each(data1, function (key, value) {
                        $('#feeType')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.fee_title));
                    });
                }
            });
        }
        {{--Fees Types Loading--}}

    </script>

@stop
