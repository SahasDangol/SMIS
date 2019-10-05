<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/lock.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jan 2019 07:03:31 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets/backend/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('assets/backend/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Code Pass
    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="../../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{url('assets/backend/css/material-dashboard.minf066.css?v=2.1.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{url('assets/backend/demo/demo.css')}}" rel="stylesheet" />

</head>

<body class="off-canvas-sidebar">
<!-- Extra details for Live View on GitHub Pages -->
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Turing Soft</a>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper wrapper-full-page">
    <div class="page-header lock-page header-filter" style="background-image: url('{{url('assets/backend/img/lock.jpg')}}')">
        <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-profile text-center card-hidden">
                        <div class="card-header ">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="{{url('assets/backend/img/faces/avatar.jpg')}}">
                                </a>
                            </div>
                        </div>
                        <form action="{{url('/lockscreen')}}" method="post">
                        <div class="card-body ">
                            <h4 class="card-title">{{Auth::user()->name}}</h4>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Enter Password</label>
                                <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit"  class="btn btn-rose btn-round">Unlock</button>
                        </div>
                        @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com/" target="_blank">Turing Soft</a> for a better web.
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{url('assets/backend/js/core/jquery.min.js')}}"></script>
<script src="{{url('assets/backend/js/core/popper.min.js')}}"></script>
<script src="{{url('assets/backend/js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{url('assets/backend/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('assets/backend/js/material-dashboard.minf066.js?v=2.1.0')}}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{url('assets/backend/demo/demo.js')}}"></script>

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


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/lock.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jan 2019 07:03:32 GMT -->
</html>