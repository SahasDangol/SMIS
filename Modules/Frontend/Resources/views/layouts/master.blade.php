<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend::includes.head')

</head>
<body>
@include('frontend::includes.header')
{{--@include('frontend::includes.banner')--}}
@yield('Body')
@include('frontend::includes.footer')
<!-- scroll-to-top start -->
<div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-rocket" aria-hidden="true"></i>
    </span>
</div>
<!-- scroll-to-top end -->

@include('frontend::includes.script')
</body>

</html>