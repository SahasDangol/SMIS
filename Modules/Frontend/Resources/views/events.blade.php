@extends('frontend::layouts.master')
@section('Body')
    <title>Events</title>
<!-- preloader start -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- preloader end -->

<!--  header-section start  -->

<!--  header-section end  -->

<!-- banner-section start -->
<section class="single-banner event-one-banner">
    <div class="page-breadcums">
        <div class="container">
            <ul class="page-list">
                <li><a href="{{url('frontend/home')}}">Home</a></li>
                <li>event page one</li>
            </ul>
        </div>
    </div>
    <div class="banner-content-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="banner-content text-center">
                        <h1 class="banner-title">Our Events and Programs</h1>
                        {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br/>standard dummy text ever since the 1500s.</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

<!-- coming-events-section start -->
<section class="coming-events-section section-padding section-bg">
    <div class="container">
        <div class="section-header text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">upcoming events</h2>
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>--}}
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="row mt-mb-10">
                @if($upcoming_events->count()==0)
                    <div class="col-sm-12 text-center">
                        <h4>No Upcoming Events!!!</h4>
                    </div>

                @endif
                @foreach($upcoming_events as $upcoming_event)
                <div class="col-lg-6">
                    <div class="event-item item-style-two d-flex align-items-center">
                        <div class="event-left">
                            <div class="event-date text-center">
                                <span class="date">{{date('d', strtotime($upcoming_event->date))}}</span>
                                <span class="month">{{date('F', strtotime($upcoming_event->date))}}</span>
                            </div>
                            <span class="join-amount">{{$days=$upcoming_event->no_of_days}}
                                @if($days ==1) Day @else Days @endif</span>
                        </div>
                        <div class="event-content">
                            <h4 class="event-title">{{$upcoming_event->title}}</h4>
                            <ul class="event-time-add-list d-flex align-items-center">
                                <li><i class="flaticon-clock"></i><p>{{$upcoming_event->start}}- {{$upcoming_event->end}}</p></li>
                                <li><i class="flaticon-place"></i><p>{{$upcoming_event->location}}</p></li>
                            </ul>
                            {!! $upcoming_event->description !!}
                        </div>
                    </div>
                </div><!-- event-item end -->
                @endforeach
            </div>
            <div class="float-right">
                {{$upcoming_events->links()}}
            </div>
        </div>
    </div>
</section>
<!-- coming-events-section end -->

<!-- coming-events-section start -->
<section class="coming-events-section section-padding">
    <div class="container">
        <div class="section-header text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">Past Events and Programs</h2>
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>--}}
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="row mt-mb-10">

                @if($past_events->count()==0)
                    <div class="col-sm-12 text-center">
                        <h4>No Past Events!!!</h4>
                    </div>

                @endif
                @foreach($past_events as $past_event)
                    <div class="col-lg-6">
                        <div class="event-item item-style-two d-flex align-items-center">
                            <div class="event-left">
                                <div class="event-date text-center">
                                    <span class="date">{{date('d', strtotime($past_event->date))}}</span>
                                    <span class="month">{{date('F', strtotime($past_event->date))}}</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <h4 class="event-title">{{$past_event->title}}</h4>
                                <ul class="event-time-add-list d-flex align-items-center">
                                    <li><i class="flaticon-clock"></i><p>4:00 PM - 7:00 PM</p></li>
                                    <li><i class="flaticon-place"></i><p>{{$past_event->location}}</p></li>
                                </ul>
                                {!! $past_event->description !!}
                            </div>
                        </div>
                    </div><!-- event-item end -->
                @endforeach
            </div>
            <div class="float-right">
                {{$past_events->links()}}
            </div>

        </div>
    </div>
</section>
<!-- coming-events-section end -->

@endsection

