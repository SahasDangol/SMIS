<!-- jquery js link -->
<script src="{{Module::asset('frontend:js/jquery-3.3.1.min.js')}}"></script>
<!-- bootstrap js link -->
<script src="{{Module::asset('frontend:js/bootstrap.bundle.js')}}"></script>
<script src="{{Module::asset('frontend:js/bootstrap.min.js')}}"></script>
<!-- owl carousel js link -->
<script src="{{Module::asset('frontend:js/owl.carousel.min.js')}}"></script>
<!-- lightcase js link -->
<script src="{{Module::asset('frontend:js/lightcase.js')}}"></script>
<!-- waypoints js link -->
<script src="{{Module::asset('frontend:js/jquery.waypoints.min.js')}}"></script>
<!-- countup js link -->
<script src="{{Module::asset('frontend:js/jquery.countup.min.js')}}"></script>
<!-- circle-progress js link -->
<script src="{{Module::asset('frontend:js/circle-progress.min.js')}}"></script>
<!-- countdown js link -->
<script src="{{Module::asset('frontend:js/jquery.countdown.js')}}"></script>
<!-- goolg-map-activate js link -->
<script src="{{Module::asset('frontend:js/goolg-map-activate.js')}}"></script>
<!-- main js link -->
<script src="{{Module::asset('frontend:js/main.js')}}"></script>

<script src="{{asset('js/lazyload.js')}}"></script>
<script>
    $("img.lazy").lazyload();
</script>
@yield('script')