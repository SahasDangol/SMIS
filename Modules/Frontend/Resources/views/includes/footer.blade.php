<!-- footer-section start -->
<footer class="footer-section">
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 col-md-6">
                    <div class="widget company-widget">
                        <a href="#" class="site-logo"><img src="{{Module::asset('frontend:images/logo2.png')}}" alt="logo"></a>
                        <p>{{get_school_info('tagline')}}</p>
                        <ul class="company-address-list">

                                <li>
                                    <a href="mailto:{{get_school_info("school_email")}}" class="form-inline" >
                                        <i class="fa fa-envelope"></i>
                                        <p>{{get_school_info("school_email")}}
                                        </p>
                                    </a>
                                </li>

                            <br>
                            <li>
                            <a href="tel:{{get_school_info("school_phone")}}" class="form-inline" >
                                <i class="fa fa-phone"></i><p>{{get_school_info("school_phone")}}</p>
                            </a>
                            </li>
                            <li><i class="flaticon-place"></i><p>{{get_school_info("school_address")}}</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget quick-links-widget">
                        <h5 class="widget-title">Quick Links</h5>
                        <div class="short-links-list">
                            <ul class="widget-links-list">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Admission</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Helpline</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Information</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Career Guide</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Courses</a></li>
                            </ul>
                            <ul class="widget-links-list">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Library</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Notice Board</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Semesters</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Subjects</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Events</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="widget hot-links-widget">
                        <h5 class="widget-title">Hot Links</h5>
                        <div class="hot-links-list">
                            <ul class="widget-links-list">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Admission</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Helpline</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Information</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Career Guide</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Courses</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-conetnt">
                <p>Copyright © 2019 |  All Right Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!-- footer-section end -->
