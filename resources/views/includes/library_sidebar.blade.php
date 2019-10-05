@php
    use Illuminate\Support\Facades\Cache;
     if (!Cache::has('settings')) {
     get_sidebar_setting();
     }
     $settings=Cache::get('settings');
@endphp

<div class="sidebar" data-color="{{$settings[1]->value}}" data-background-color="{{$settings[2]->value}}"
     data-image="{{$settings[3]->value}}">

    <div class="logo">
        <a href="{{url('/dashboard')}}" class="simple-text logo-mini">
            {{getInitials($settings[0]->value)}}
        </a>
        <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
            {{$settings[0]->value}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('assets/backend/img/faces/avatar.jpg')}}"/>
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                {{Auth::user()->name}}
                  <b class="caret"></b>
              </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/profile')}}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/profile')}}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav nav-sm" id="sidebar-menu">

            {{--home--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <i class="material-icons">home</i>
                    <p> Home </p>
                </a>
            </li>
            {{--home--}}

            {{--dashboard--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/library')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            {{--dashboard--}}






            {{--Book--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/book')}}">
                    <i class="material-icons">library_books</i>
                    <p> Manage Book </p>
                </a>
            </li>
            {{--Book--}}

            {{--Issue Book--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/book_issue')}}">
                    <i class="material-icons">how_to_reg</i>
                    <p> Issue Book </p>
                </a>
            </li>
            {{--Issue Book--}}

            {{--Return Book--}}
            <li class="nav-item  nav-item-sm">
                <a class="nav-link" href="{{url('/book_return')}}">
                    <i class="material-icons">undo</i>
                    <p> Return Book </p>
                </a>
            </li>
            {{--Return Book--}}



            {{--Balance Sheet--}}


        </ul>
    </div>
</div>
