<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <ul class="header-company-contact">
                        <li><i class="fa fa-phone"></i>{{get_school_info("school_phone")}}</li>
                        <li><i class="fa fa-envelope"></i>

                            {{get_school_info("school_name")}}

                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-5">
                    <ul class="header-user-login-regis">
                        <li><a href="{{route('login')}}">Log in</a></li>
                        {{--<li><a href="{{route('register')}}">Register</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- header-top end -->
    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="site-logo site-title" href="#"><img src="{{url('/').Storage::url(get_school_info("logo"))}}" alt="site-logo" width="50px" height="50px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ml-auto">
                        <li class="menu_has_children"><a href="{{route('frontend.index')}}">Home</a>

                        </li>
                        <li><a href="#" >About <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu">
                                @php($contents=get_content_titles())
                                @foreach($contents as $content)
                                    <li><a href="{{Route('frontend.about',$content->id)}}">{{$content->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu_has_children"><a href="{{route('frontend.events')}}">Events</a>

                        </li>
                        <li class="menu_has_children"><a href="{{url('frontend/gallery')}}">Gallery</a>

                        </li>
                        {{--<li class="menu_has_children"><a href="{{route('frontend.faq')}}">FAQ</a>--}}

                        {{--</li>--}}
                        <li class="menu_has_children"><a href="{{route('frontend.notices')}}">Notices</a>

                        </li>
                        <li class="menu_has_children"><a href="{{route('frontend.contact_us')}}">Contact</a>
                    </ul>
                </div>
            </nav>
        </div>
    </div><!-- header-bottom end -->
</header>