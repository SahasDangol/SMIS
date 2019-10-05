<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/backend/img/apple-icon.png')}}">
<link rel="icon" type="image/png" href="{{asset('assets/backend/img/favicon.png')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
    @yield('title')
</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@laravelPWA
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/MaterialCss.css')}}" />
<link rel="stylesheet"   href="{{asset('assets/backend/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!-- CSS Files -->
<link href="{{asset('assets/backend/css/material-dashboard.minf066.css')}}" rel="stylesheet" media="all"/>
<link rel="stylesheet" href="{{url('assets/backend/css/nepaliDatePicker.min.css')}}" >

<link href="{{ asset('assets/backend/css/select2.css') }}" rel="stylesheet"/>

<link href="{{ asset('assets/backend/css/page_loader.css') }}" rel="stylesheet"/>

<link href="{{asset('/css/print.css')}}" rel="stylesheet"  type="text/css" media="print"/>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
@yield('head')
