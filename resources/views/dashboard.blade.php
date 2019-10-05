@extends('master')

@section('title', get_school_info('site_title').' | Dashboard')
@section('head')
    <style>
        .zoom {
            min-width: 137px;
            /*max-width: 106px;*/
            /*background-color: #000;*/
            margin-bottom: 4px;
            /*max-height: 103px;*/
        }
    </style>
@stop
@section('Body')
    <div class="content">
        <div class="container-fluid br-mainpanel">
            @hasanyrole('Accountant|Admin|Principal|Teacher')
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-pills nav-pills-warning nav-pills-icons d-flex flex-wrap "
                        role="tablist">
                        @hasanyrole('Accountant|Admin|Principal')
                        <li class="zoom nav-item" data-header-animation="true">
                            <a class=" nav-link " style="background-color: #ffa726;color: white"
                               href="{{url('/payment/student/roll')}}">
                                <i class="fa fa-money" aria-hidden="true"></i>Payment
                            </a>
                        </li>
                        <li class="zoom nav-item" data-header-animation="true">
                            <a class=" nav-link " style="background-color: #ffa726;color: white"
                               href="{{url('/student/create')}}">
                                <i class="fa fa-money" aria-hidden="true"></i>Student Admission
                            </a>
                        </li>
                        <li class="zoom nav-item">
                            <a class="nav-link " style="background-color: #d81b60;color:white"
                               href="{{url('/overall/marksheet')}}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i> Marksheet
                            </a>
                        </li>
                        <li class="zoom nav-item">
                            <a class="nav-link" style="background-color: green;color:white"
                               href="{{url('/students/attendance')}}">
                                <i class="fa fa-id-badge" aria-hidden="true"></i> Attendance
                            </a>
                        </li>
                        <li class="zoom nav-item">
                            <a class="nav-link" style="background-color: #26c6da;color:white"
                               href="#link10">
                                <i class="fa fa-history" aria-hidden="true"></i> Payment History
                            </a>
                        </li>
                        <li class="zoom nav-item">
                            <a class="nav-link" style="background-color: #ffa726;color: white"
                               href="{{url('/enquiry/')}}">
                                <i class="fa fa-history" aria-hidden="true"></i> Enquiry
                            </a>
                        </li>
                        @endhasanyrole
                        @hasanyrole('Admin|Teacher')
                        <li class="zoom nav-item">
                            <a href="{{ route('publish.results') }}" class="nav-link"
                               style="background-color: #ffa726;color: white">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                Publish Results
                            </a>
                        </li>
                        @endhasanyrole
                    </ul>
                </div>
            </div>
            @endhasanyrole
            <div class="row">
                @hasanyrole('Accountant|Admin|Receptionist|Teacher|Principal')
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{url('/student')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">group</i>
                                </div>
                                <p class="card-category">Students</p>
                                <h3 class="card-title">{{count(Modules\Student\Entities\Student::select('id')->where('status',1)->get())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endhasanyrole

                @hasanyrole('Accountant|Admin|Receptionist|Principal')
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{url('/staff')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">people_outline</i>
                                </div>
                                <p class="card-category">Staffs</p>
                                <h3 class="card-title">{{count(Modules\Staff\Entities\Staff::select('id')->where('status',1)->get())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    {{--<i class="material-icons">local_offer</i> Tracked from Google Analytics--}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">person_outline</i>
                            </div>
                            <p class="card-category">Teachers</p>
                            <h3 class="card-title">{{getTeacherCount()}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">

                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole

                @hasanyrole('Accountant|Admin|Principal')
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">person_outline</i>
                            </div>
                            <p class="card-category">Receptionist</p>
                            <h3 class="card-title">{{getReceptionistCount()}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole
            </div>

            @hasanyrole('Accountant|Admin|Principal')
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card card-chart">
                        <div class="card-header bg-light" data-header-animation="true">
                            <div class="ct-chart" id="income_vs_expense_chart"
                                 style="width: 100%; height:250px;"></div>
                        </div>
                        <div class="card-body">
                            <div class="card-actions">
                                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>

                                <form action="{{URL::to('/refresh_graph/')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-info btn-sm btn-round" rel="tooltip"
                                            data-placement="bottom" title="Refresh">
                                        <i class="material-icons">refresh</i> Refresh
                                    </button>
                                </form>
                                </button>
                            </div>
                            <h4 class="card-title">Income and Expense Summary of {{$fiscal_year}}</h4>
                            <p class="card-category">
                                                <span class="text-success"><i
                                                            class="fa fa-long-arrow-up"></i> 55% </span>
                                increase in today sales.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endhasanyrole

            <div class="row">
                @hasanyrole('Accountant|Admin|Principal')
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">money</i>
                            </div>
                            <p class="card-category">Expected Fees in {{date("M")}}</p>
                            <h3 class="card-title">Rs. {{get_total_payment_to_be_collected()}}/-</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Last 24 Hours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">money_off</i>
                            </div>
                            <p class="card-category">Collected Fees in {{date("M")}}</p>
                            <h3 class="card-title">Rs. {{get_collected_payment()}}/-</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Last 24 Hours
                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole
                @hasanyrole('Admin|Receptionist|Principal')
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">equalizer</i>
                            </div>
                            <p class="card-category">Visitors</p>
                            <h3 class="card-title">{{$visitors}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Tracked from Daily Activities
                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole
                @hasanyrole('Student')
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">equalizer</i>
                            </div>
                            <p class="card-category">Class</p>
                            <h3 class="card-title">{{ucfirst(Auth::user()->students->classrooms->class_name)}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">equalizer</i>
                            </div>
                            <p class="card-category">Section</p>
                            <h3 class="card-title">{{ucfirst(Auth::user()->students->sections->name)}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Class Teacher</p>
                            <h4 class="card-title">{{ucfirst(Auth::user()->students->sections->class_teachers->first_name)}} {{ucfirst(Auth::user()->students->sections->class_teachers->middle_name)}} {{ucfirst(Auth::user()->students->sections->class_teachers->last_name)}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i>Updated
                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole
            </div>
            {{--Quick Payee and Payer Types--}}
            <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                        <h4 class="card-title">Goto Payment(Quick)</h4>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <br>
                                    <form method="post" action="{{url('/payment/student')}}">
                                        <div class="row">
                                            <label class="col-sm-1 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Roll No.</label>
                                                    <input id="p_p_name" class="form-control"
                                                           value="{{ old('roll_no') }}"
                                                           type="text"
                                                           maxlength="100" name="roll_no" required="true"/>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <label class="col-sm-5 col-form-label"></label>
                                            <button class="btn btn-primary btn-round float-right mr-1">
                                                Search
                                            </button>
                                        </div>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--Quick Payee and Payer Types--}}
        </div>
    </div>
@stop

@section('script')
    <script>
        var yearly_income = {{ $yearly_income }};
        var yearly_expense = {{ $yearly_expense }};
        $(document).ready(function () {
            // Initialise the admin graphs
            graphs.admin_init();
        });
    </script>

@stop
