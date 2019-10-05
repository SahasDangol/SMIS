@extends('frontend::layouts.master')
@section('Body')
    <title>{{$content->title}}</title>
    <!-- preloader start -->
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- preloader end -->
    <!-- banner-section start -->
    <section class="single-banner about-banner">
        <div class="page-breadcums">
        <div class="container">
        <ul class="page-list">
        <li><a href="{{url('frontend/home')}}">Home</a></li>
        <li>About us</li>
        </ul>
        </div>
        </div>
        <div class="banner-content-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="banner-content text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- about-section start -->
    <section class="about-section section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                       {!! $content->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->

    <!-- mission-vission-section start -->
    <section class="mission-vission-section">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="content">
                        <h2 class="section-title">Our Mission and Vision</h2>
                        <p>Our mission is to develop young men with active and creative minds, a sense of understanding and compassion for others, and the courage to act on their beliefs. We stress the total development of each child: spiritual, moral, intellectual, social, emotional, and physical</p>
                        {{--<ul class="mission-vission-list">--}}
                            {{--<li><i class="fa fa-check-circle"></i>Lorem ipsum nullam tortor consequat amet felis--}}
                                {{--dapibus.--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-check-circle"></i>Non ullamcorper nisi duis ut lobortis inceptos--}}
                                {{--sagittis venenatis.--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-check-circle"></i>Cubilia quisque velit primis rhoncus augue id--}}
                                {{--consequat semper rutrum.--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-check-circle"></i>Donec potenti egestas quis in libero enim aliquam.--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-check-circle"></i>venenatis netus ultricies porta eget euismod consequat--}}
                                {{--vivamus.--}}
                            {{--</li>--}}
                            {{--<li><i class="fa fa-check-circle"></i>Auctor aptent purus condimentum curabitur.</li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mission-vission-section end -->

    <!-- welcome-section start -->
    <section class="welcome-section section-padding section-bg">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">Why We Are Different</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="row mt-mb-15 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item-style-four">
                            <div class="single-item-head d-flex align-items-center">
                                <div class="icon"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></div>
                                <h5 class="item-title">Incomparable Quality</h5>
                            </div>
                            <div class="content">
                                <p>It was on popularised in the 1960s with the release of Letraset sheets
                                    containing.</p>
                            </div>
                        </div>
                    </div><!--benefits-item end -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item-style-four">
                            <div class="single-item-head d-flex align-items-center">
                                <div class="icon"><i class="flaticon-college-graduation"></i></div>
                                <h5 class="item-title">Professional Certificate</h5>
                            </div>
                            <div class="content">
                                <p>It was on popularised in the 1960s with the release of Letraset sheets
                                    containing.</p>
                            </div>
                        </div>
                    </div><!--benefits-item end -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item-style-four">
                            <div class="single-item-head d-flex align-items-center">
                                <div class="icon"><i class="flaticon-world"></i></div>
                                <h5 class="item-title">Lifetime Access Globally</h5>
                            </div>
                            <div class="content">
                                <p>It was on popularised in the 1960s with the release of Letraset sheets
                                    containing.</p>
                            </div>
                        </div>
                    </div><!--benefits-item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- welcome-section end -->

    <!-- achievement-section start -->
    <section class="achievement-section section-padding section-overlay">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">Our Achievements</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-language"></i>
                            <p>Total Courses</p>
                            <span class="counter">40</span><span>+</span>
                        </div>
                    </div><!-- counter-item end -->
                    <div class="col-lg-3 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-study"></i>
                            <p>Total Student</p>
                            <span class="counter">50</span><span>K+</span>
                        </div>
                    </div><!-- counter-item end -->
                    <div class="col-lg-3 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-graduate-student-avatar"></i>
                            <p>Graduation Completed</p>
                            <span class="counter">120</span><span>k+</span>
                        </div>
                    </div><!-- counter-item end -->
                    <div class="col-lg-3 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-world"></i>
                            <p>Global Position</p>
                            <span class="counter">120</span>
                        </div>
                    </div><!-- counter-item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- achievement-section end -->

    <!-- teachers-section start -->
    <section class="teachers-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">Our Department Heads</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="teacher-single text-center">
                            <div class="teacher-thumb">
                                <img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/teachers/1.jpg')}}" alt="teacher-image">
                            </div>
                            <div class="teacher-content">
                                <h4 class="teacher-name"><a href="#">Aylina Sakhir</a></h4>
                                <span class="teacher-designation">Computer Science</span>
                                <ul class="teacher-social-links d-flex justify-content-center">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- teacher-single end-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="teacher-single text-center">
                            <div class="teacher-thumb">
                                <img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/teachers/2.jpg')}}" alt="teacher-image">
                            </div>
                            <div class="teacher-content">
                                <h4 class="teacher-name"><a href="#">Mumtahina Juthy</a></h4>
                                <span class="teacher-designation">Computer Science</span>
                                <ul class="teacher-social-links d-flex justify-content-center">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- teacher-single end-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="teacher-single text-center">
                            <div class="teacher-thumb">
                                <img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/teachers/3.jpg')}}" alt="teacher-image">
                            </div>
                            <div class="teacher-content">
                                <h4 class="teacher-name"><a href="#">Muktasina Islam</a></h4>
                                <span class="teacher-designation">Computer Science</span>
                                <ul class="teacher-social-links d-flex justify-content-center">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- teacher-single end-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="teacher-single text-center">
                            <div class="teacher-thumb">
                                <img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/teachers/4.jpg')}}" alt="teacher-image">
                            </div>
                            <div class="teacher-content">
                                <h4 class="teacher-name"><a href="#">Nijhum Rakhis</a></h4>
                                <span class="teacher-designation">Computer Science</span>
                                <ul class="teacher-social-links d-flex justify-content-center">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- teacher-single end-->
                </div>
            </div>
        </div>
    </section>
    <!-- teachers-section end -->

    <!-- testimonial-section start -->
    <section class="testimonial-section section-padding section-bg">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">What our students say</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="owl-carousel testmonial-slider">
                    <div class="testimonial-item">
                        <div class="testimonial-head d-flex align-items-center">
                            <div class="thumb"><img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/testimonial/1.png')}}"
                                                    alt="testimonial-image"></div>
                            <div class="client-details">
                                <h4 class="name">Muktasina Islam</h4>
                                <span class="designation">fashion design</span>
                            </div>
                        </div>
                        <div class="testimonial-conetnt">
                            <div class="client-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Suffered are many variation of passages lorem availle there on alterati of some form by
                                the injected for users.</p>
                        </div>
                    </div><!-- testimonial-item end -->
                    <div class="testimonial-item">
                        <div class="testimonial-head d-flex align-items-center">
                            <div class="thumb"><img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/testimonial/2.png')}}"
                                                    alt="testimonial-image"></div>
                            <div class="client-details">
                                <h4 class="name">Hasibur Rahman</h4>
                                <span class="designation">Comuter Science</span>
                            </div>
                        </div>
                        <div class="testimonial-conetnt">
                            <div class="client-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Suffered are many variation of passages lorem availle there on alterati of some form by
                                the injected for users.</p>
                        </div>
                    </div><!-- testimonial-item end -->
                    <div class="testimonial-item">
                        <div class="testimonial-head d-flex align-items-center">
                            <div class="thumb"><img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/testimonial/3.png')}}"
                                                    alt="testimonial-image"></div>
                            <div class="client-details">
                                <h4 class="name">Sumayea Islam</h4>
                                <span class="designation">Multimedia Technology</span>
                            </div>
                        </div>
                        <div class="testimonial-conetnt">
                            <div class="client-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Suffered are many variation of passages lorem availle there on alterati of some form by
                                the injected for users.</p>
                        </div>
                    </div><!-- testimonial-item end -->
                    <div class="testimonial-item">
                        <div class="testimonial-head d-flex align-items-center">
                            <div class="thumb"><img src="{{asset('img/loading.gif')}}" class="lazy" data-src="{{Module::asset('frontend:images/testimonial/1.png')}}"
                                                    alt="testimonial-image"></div>
                            <div class="client-details">
                                <h4 class="name">Muktasina Islam</h4>
                                <span class="designation">fashion design</span>
                            </div>
                        </div>
                        <div class="testimonial-conetnt">
                            <div class="client-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Suffered are many variation of passages lorem availle there on alterati of some form by
                                the injected for users.</p>
                        </div>
                    </div><!-- testimonial-item end -->
                </div>
            </div><!-- section-wrapper end -->
        </div>
    </section>
    <!-- testimonial-section end -->

@endsection