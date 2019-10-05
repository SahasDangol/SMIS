<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    @include('includes.head')
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>

<body class="wide comments example dt-example-material">
<div id="overlay">
    <div class="loader">
        <center><small><small><small><span>{ </span><span>Processing</span><span> }</span></small></small></small></center>
    </div>
</div>

<div class="wrapper">
    @include('includes.sidebar')
    <div class="main-panel">
        @include('includes.navbar')
        <div class="content">
          {{--  @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif--}}
            @include('includes.error')
            @yield('Body')
        </div>
        {{--@include('includes.footer')--}}
    </div>
</div>
@include('includes.fixed-plugin')
@include('includes.script')

</body>
</html>
