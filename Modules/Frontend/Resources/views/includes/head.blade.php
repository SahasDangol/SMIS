<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
@laravelPWA
<!-- favicon -->
<link rel="shortcut icon" href="{{Module::asset('frontend:images/favicon.png')}}" type="image/x-icon">
<!-- fontawesome css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/fontawesome.min.css')}}">
<!-- flaticon css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/flaticon.css')}}">
<!-- bootstrap css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/bootstrap.min.css')}}">
<!-- owl carousel css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/owl.carousel.min.css')}}">
<!-- lightcase css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/lightcase.css')}}">
<!-- main style css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/style.css')}}">
<!-- responsive css link -->
<link rel="stylesheet" href="{{Module::asset('frontend:css/responsive.css')}}">

@yield('head')