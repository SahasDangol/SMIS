<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.head')
    <title>Login</title>
</head>
<body class="off-canvas-sidebar">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Login Page</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="material-icons">Home</i> Home
                    </a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url({{asset('img/login.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header card-header-success text-center">
                                <h4 class="card-title">Login</h4>
                            </div>
                            <br>
                            <div class="card-body ">
                                    <span class="bmd-form-group">
                                        <div class="input-group">
                                          <label for="" class="bmd-label-floating">Email</label>
                                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                      </span>
                            </div>
                            <div class="card-footer justify-content-center">
                                <button type="submit" class="btn btn-rose">
                                    {{ __('Change') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('assets/backend/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/backend/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript')}}"></script>

<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
</body>
</html>
