<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    @include('includes.head')
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>

<body class="rtl">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
    @include('includes.library_sidebar')
    <div class="main-panel">
        @include('includes.navbar')
        <div class="content">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
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
