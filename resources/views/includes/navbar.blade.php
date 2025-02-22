<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-relative fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">@yield('title')</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            @hasanyrole('Accountant|Admin|Principal')
            <form class="navbar-form">
                @include('includes.session')
            </form>
            @endhasanyrole
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        @php($notification_count = notification_count())
                        @if($notification_count['count']!=0)
                        <span class="notification">
                                {{$notification_count['count']}}
                        </span>
                        @endif
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($notification_count['id'] as $data)
                            <a class="dropdown-item"
                               href="{{url('/students_leave',$data)}}">{{unread_notification_title($data)->subject}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{url('/setting')}}">Settings</a>
                        <a class="dropdown-item" href="{{url('/')}}">Visit Site</a>
                        <a class="dropdown-item" href="{{url('/lockscreen')}}">Lock Screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nc-icon nc-button-power"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
