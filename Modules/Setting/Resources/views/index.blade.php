@extends('master')

@section('title', get_school_info('site_title').' | System Setting')
@section('Body')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-icon">
                            <i class="material-icons">today</i>
                        </div>
                        <h4 class="card-title">System Setting</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-profile">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{get_school_info("logo_url")}}" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-category text-gray">{{get_school_info("school_name")}}</h4>
                                        <h6 class="card-category text-gray">{{get_school_info("address")}}</h6>
                                        <h4 class="card-title">Established in {{get_school_info("establish_date")}}</h4>
                                        <p class="card-description">
                                            {{get_school_info("tagline")}}
                                        </p>
                                        <a href="{{url('/settings/edit')}}" class="btn btn-rose btn-round">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-profile">
                                    <div class="card-body">
                                        <h6 class="card-category text-gray">
                                            <i class="material-icons">phone</i>{{get_school_info("school_phone")}}</h6>
                                        <h6 class="card-category text-gray">
                                            <i class="material-icons">mail</i>{{get_school_info("school_email")}}</h6>
                                        <h6 class="card-category text-gray">
                                            <i class="fa fa-facebook-official" style="font-size:24px"></i>
                                            {{get_school_info("fb_link")}}
                                        </h6>
                                        <h6 class="card-category text-gray">
                                            <i class="fa fa-twitter" style="font-size:24px"></i>&nbsp;
                                            {{get_school_info("twitter_link")}}
                                        </h6>
                                        <h6 class="card-category text-gray">
                                            <i class="fa fa-instagram" style="font-size:24px"></i>
                                            {{get_school_info("instagram_link")}}
                                        </h6>
                                        <h6 class="card-category text-gray">
                                            <i class="fa fa-linkedin" style="font-size:24px"></i>
                                            {{get_school_info("linkedin_link")}}
                                        </h6>
                                        <a href="{{url('/settings/edit')}}" class="btn btn-rose btn-round">Edit</a>
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
@stop