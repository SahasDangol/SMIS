@extends('frontend::layouts.master')
@section('banner-head')
    <h1 class="banner-title">Contact Informations</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br/> standard dummy text ever since the 1500s.</p>
    <a href="#" class="cmn-button">admission</a>
    @stop
@section('Body')
    <title>Contact Us</title>
<!-- preloader start -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- preloader end -->

<!-- contact-section start -->
<section class="contact-section section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="company-contact-info-area">
                    <div class="company-info-item d-flex align-items-center">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="content">
                            <span class="title">Phone Number</span>
                            <p>{{get_school_info("school_phone")}}</p>
                        </div>
                    </div><!-- company-info-item end -->
                    <div class="company-info-item d-flex align-items-center">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="content">
                            <span class="title">Email Address</span>
                            <p>{{get_school_info("school_email")}}</p>
                        </div>
                    </div><!-- company-info-item end -->
                    <div class="company-info-item d-flex align-items-center">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="content">
                            <span class="title">location</span>
                            <p>{{get_school_info("school_address")}}</p>
                        </div>
                    </div><!-- company-info-item end -->
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form-area form-area">
                    <h4 class="form-title">Send message</h4>
                    <p>Please fill the form and enquire us about our school if there are any difficulties.</p>
                    <form class="contact-form form-style-one" action="{{route('enquiry.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="text" name="name" id="name" placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="email" name="email" id="email" placeholder="Email address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="tel" name="phone" id="phone" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="frm-group">
                                    <input type="text" name="subject" id="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="frm-group">
                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="frm-group">
                                    <button type="submit" class="cmn-button">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-section end -->




@endsection