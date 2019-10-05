@extends('frontend::layouts.master')
@section('Body')
    <title>Notice Details</title>
<!-- preloader start -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- preloader end -->



<!-- banner-section start -->
<section class="single-banner blog-details-banner">
    <div class="banner-content-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="banner-content text-center">
                        <h1 class="banner-title">Notice details</h1>
                    </div>
                    <div class="page-breadcums">
                        <div class="container">
                            <ul class="page-list">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li>Notice details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

<!-- blog-grid-section start -->
<section class="single-blog-section section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="entry-single">
                    <div class="entry-single-thumb">
                        <img src="{{url('/').Storage::url($notice->image)}}" alt="single-post-image">
                    </div>
                    <div class="entry-single-content">
                        <h3 class="entry-single-title">{{$notice->title}}</h3>
                        <p>{!! $notice->body !!}</p>
                           </div>
                </div>

            </div><!-- blog-list-wrapper end -->
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <div class="widget share-link-widget">
                        <h5 class="widget-title">share blog</h5>
                        <ul class="d-flex">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="widget subscribe-widget">
                        <h5 class="widget-title">subscribe newsletter</h5>
                        <form class="widget-subscribe-form">
                            <div class="frm-group">
                                <i class="fa fa-envelope"></i>
                                <input type="email" name="name" id="name" placeholder="Email address...">
                            </div>
                            <div class="frm-group">
                                <button class="apply-btn">subscribe</button>
                            </div>
                        </form>
                    </div><!-- widget end -->

                </div>
            </div><!-- sidebar-area end -->
        </div>
    </div>
</section>
<!-- blog-grid-section end -->

@stop