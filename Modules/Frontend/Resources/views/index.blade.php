@extends('frontend::layouts.master')

@section('Body')

<title>Home</title>
    <!-- preloader start -->

    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- preloader end -->

    <!--  header-section start  -->

    <!--  header-section end  -->

    <!-- banner-section start -->

    <section class="banner-section">
        <div class="banner-content-area">
            <div class="container">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="banner-content text-center">
                                <h1 class="banner-title">Welcome to {{get_school_info("school_name")}}</h1>
                                <p>Established in {{get_school_info("establish_date")}}</p>
                                {{--<a href="{{url('frontend/about_us')}}" class="cmn-button">about us</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- info-section start -->
    <section class="info-section style-one bottom-shadow color-style-one">
        <div class="info-items-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 pr-0 pl-0 info-item">
                        <div class="info-item-inner">
                            <div class="info-item-head d-flex align-items-center">
                                <div class="info-item-icon"><i class="flaticon-college-graduation"></i></div>
                                <h4 class="info-title">Admission Center</h4>
                            </div>
                            <div class="content">
                                <p>It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                                <a href="#" class="simple-btn">learn more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- info-item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- info-section end -->

   {{-- <!-- about-section start -->
    <section class="about-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <h2 class="section-title">Principle's Message</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of the modern.</p>
                        <p>And scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <img src="{{Module::asset('frontend:images/about/1.jpg')}}" alt="about-image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->--}}

    @if(count($notices)>0)
    <!-- Recent Notice start -->
    <section class="subject-section section-padding section-bg">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">Most Recent Notices</h2>
                        <p>Official notice section of our school.</p>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="row mt-mb-15">
                    @foreach($notices as $notice)
                        <div class="col-lg-4 col-sm-6">
                            <div class="post-item">
                                <div class="post-thumb">
                                    <a href="{{route('frontend.single_notice',$notice->id)}}">
                                        <img class="lazy" src="{{asset('img/loading.gif')}}" data-src="{{url('/').Storage::url($notice->image)}}" alt="post-image">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="post-details">
                                        <h5 class="post-title">
                                            <a href="{{route('frontend.single_notice',$notice->id)}}">{{$notice->title}}</a>
                                        </h5>
                                        {{--<p>{!!$notice->body!!}</p>--}}
                                        <p>{!!str_limit(strip_tags($notice->body,150))!!}</p>
                                        <a href="{{route('frontend.single_notice',$notice->id)}}" class="simple-btn">
                                            Read More<i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <ul class="d-flex justify-content-center">
                                        <li><a href="{{route('frontend.single_notice',$notice->id)}}"><i class="fa fa-clock-o"></i>{{date('d-M, Y',strtotime($notice->updated_at))}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Recent Notice end -->
    @endif
{{--
    <!-- benefits-facilities-section start -->
    <section class="benefits-facilities-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">Discover Benefits and Facilities</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="row mt-mb-15">
                    <div class="col-lg-4">
                        <div class="single-item-style-two">
                            <div class="single-item-head d-flex align-items-center">
                                <h5 class="item-title">Student Hostel</h5>
                                <span class="item-number">01</span>
                            </div>
                            <div class="content">
                                <p>Many desktop publishing packages and web on page editors now use Lorem Ipsum as their default model text, and a search form.</p>
                            </div>
                        </div>
                    </div><!--benefits-item end -->
                    <div class="col-lg-4">
                        <div class="single-item-style-two">
                            <div class="single-item-head d-flex align-items-center">
                                <h5 class="item-title">Open Laboratory</h5>
                                <span class="item-number">02</span>
                            </div>
                            <div class="content">
                                <p>Many desktop publishing packages and web on page editors now use Lorem Ipsum as their default model text, and a search form.</p>
                            </div>
                        </div>
                    </div><!--benefits-item end -->
                    <div class="col-lg-4">
                        <div class="single-item-style-two">
                            <div class="single-item-head d-flex align-items-center">
                                <h5 class="item-title">Sports Ground</h5>
                                <span class="item-number">03</span>
                            </div>
                            <div class="content">
                                <p>Many desktop publishing packages and web on page editors now use Lorem Ipsum as their default model text, and a search form.</p>
                            </div>
                        </div>
                    </div><!--benefits-item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- benefits-facilities-section end -->--}}

    <!-- achievement-section start -->
    <section class="achievement-section section-padding section-overlay">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">Our Achievements</h2>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-language"></i>
                            <p>Total Courses</p>
                            <span class="counter">{{get_count('subjects')}}</span><span>+</span>
                        </div>
                    </div><!-- counter-item end -->
                    <div class="col-lg-3 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-study"></i>
                            <p>Total Student</p>
                            <span class="counter">{{get_count('students')}}</span><span>K+</span>
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
                            <p>Total Staff</p>
                            <span class="counter">{{get_count('staffs')}}</span>
                        </div>
                    </div><!-- counter-item end -->
                </div>
            </div>
        </div>
    </section>
    <!-- achievement-section end -->

    @if(count($news_and_events)>0)
        <!-- coming-events-section start -->
        <section class="coming-events-section section-padding">
            <div class="container">
                <div class="section-header text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="section-title">Our Upcoming Events</h2>
                            {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>--}}
                        </div>
                    </div>
                </div>
                <div class="section-wrapper">
                    <div class="row justify-content-center mt-mb-10">
                        <div class="col-lg-10">
                            @foreach($news_and_events as $news_and_event)
                            <div class="event-item d-flex align-items-center">
                                <div class="event-left ">
                                    <div class="event-date text-center">
                                        <span class="date">{{date('d', strtotime($news_and_event->date))}}</span>
                                        <span class="month">{{date('F', strtotime($news_and_event->date))}}</span>
                                    </div>
                                </div>
                                <div class=" event-content">

                                    <h4 class="event-title">{{$news_and_event->title}}</h4>
                                    <p>{!! $news_and_event->description !!}</p><br>
                                </div>
                                <ul class="event-time-add-list d-flex align-items-center">
                                    <li><i class="flaticon-place"></i><p>{{$news_and_event->location}}</p></li>
                                </ul>
                            </div><!-- event-item end -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- coming-events-section end -->
    @endif

    <!-- features-section start -->
    <section class="features-section">
        <div class="row mr-0 ml-0">
            <div class="col-lg-6 features-video-block">
                <a class="video-button lazy" href="https://www.youtube.com/embed/aFYlAzQHnY4" data-rel="lightcase:myCollection"><i class="fa fa-play"></i></a>
            </div>
            <div class="col-lg-6 features-content-block section-bg">
                <div class="section-header">
                    <h2 class="section-title">Best place to build your career</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. The concept lorem Ipsum has been the industry's standard dummy text</p>
                </div>
                <div class="section-wrapper">
                    <div class="row mt-mb-15">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-item-style-three">
                                <div class="single-item-head d-flex align-items-center">
                                    <div class="icon"><i class="flaticon-trophy"></i></div>
                                    <h5 class="item-title">We Are Always Top</h5>
                                </div>
                                <div class="content">
                                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                                </div>
                            </div>
                        </div><!-- features-item end -->
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-item-style-three">
                                <div class="single-item-head d-flex align-items-center">
                                    <div class="icon"><i class="flaticon-college-graduation"></i></div>
                                    <h5 class="item-title">Better Education</h5>
                                </div>
                                <div class="content">
                                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                                </div>
                            </div>
                        </div><!-- features-item end -->
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-item-style-three">
                                <div class="single-item-head d-flex align-items-center">
                                    <div class="icon"><i class="flaticon-university-campus"></i></div>
                                    <h5 class="item-title">Biggest Campus</h5>
                                </div>
                                <div class="content">
                                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                                </div>
                            </div>
                        </div><!-- features-item end -->
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-item-style-three">
                                <div class="single-item-head d-flex align-items-center">
                                    <div class="icon"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></div>
                                    <h5 class="item-title">Incamparable Quality</h5>
                                </div>
                                <div class="content">
                                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                                </div>
                            </div>
                        </div><!-- features-item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-section end -->

    <!-- testimonial-section start -->
    <section class="testimonial-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">What our students say</h2>
                    </div>
                </div>
            </div>
            <div class="section-wrapper">
                <div class="owl-carousel testmonial-slider">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <div class="testimonial-head d-flex align-items-center">
                            <div class="thumb">
                                <img class="lazy" src="{{asset('img/loading.gif')}}" data-src="{{url('/').Storage::url($testimonial->image)}}" alt="testimonial-image">
                            </div>
                            <div class="client-details">
                                <h4 class="name">{{$testimonial->name}}</h4>
                                <span class="designation">{{$testimonial->position}}</span>
                            </div>
                        </div>
                        <div class="testimonial-conetnt">
                           {!! $testimonial->testimonial !!}
                        </div>
                    </div><!-- testimonial-item end -->
                        @endforeach

                </div>
            </div><!-- section-wrapper end -->
        </div>
    </section>


    <!-- testimonial-section end -->

@endsection

