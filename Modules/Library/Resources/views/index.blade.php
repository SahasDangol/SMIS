@extends('library')

@section('title', get_school_info('site_title').' | Library Dashboard')
@section('Body')
    <div class="content">
        <div class="container-fluid br-mainpanel">


            <div class="row">

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
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{url('/staff')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">group</i>
                                </div>
                                <p class="card-category">Staffs</p>
                                <h3 class="card-title">{{count(Modules\Staff\Entities\Staff::select('id')->where('status',1)->get())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{url('/book')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">group</i>
                                </div>
                                <p class="card-category">Books</p>
                                <h3 class="card-title">{{count(Modules\Library\Entities\Book::select('id')->where('status',1)->get())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{url('book_issue')}}">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">group</i>
                                </div>
                                <p class="card-category">Books Issued</p>
                                <h3 class="card-title">{{count(Modules\Library\Entities\Book::select('id')->where('status',1)->where('issue_status',1)->get())}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="#">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">group</i>
                                </div>
                                <p class="card-category">Fines Collected</p>
                                <h3 class="card-title">Rs. {{$fine}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop