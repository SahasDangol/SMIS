@extends('frontend::layouts.master')
@section('Body')
    <title>Notice</title>
    <!-- preloader start -->
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- preloader end -->
    <!-- banner-section start -->
    <section class="single-banner blog-grid-one-banner">
        <div class="banner-content-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="banner-content text-center">
                            <h1 class="banner-title">Notices</h1>
                        </div>
                        <div class="page-breadcums">
                            <div class="container">
                                <ul class="page-list">
                                    <li><a href="{{url('frontend/home')}}">Home</a></li>
                                    <li>Notice grid</li>
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
    <section class="blog-grid-section section-bg">
        <div class="container">
            <div class="blog-grid-wrapper blog-grid-style-two">
                <div class="row">
                    @if(count($notices)==0)
                        <div class="col-md-12 text-center">
                            <h3>No Notice Found!!</h3>
                        </div>

                        @endif
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
                                <div class="post-footer">
                                    <ul class="d-flex justify-content-center">
                                        <li><a href="{{route('frontend.single_notice',$notice->id)}}"><i class="fa fa-clock-o"></i>{{date('d-M, Y',strtotime($notice->updated_at))}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="float-right">
                {{$notices->links()}}
            </div>
        </div>
    </section>
    <!-- blog-grid-section end -->
@endsection