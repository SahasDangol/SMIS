<div class="fixed-plugin">
    <div class="dropdown show-dropdown click" onclick="showMessage()">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-warning" data-color="orange"></span>
                        <span class="badge filter badge-danger" data-color="danger"></span>
                        <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="ml-auto mr-auto">
                        <span class="badge filter badge-black active" data-background-color="black"></span>
                        <span class="badge filter badge-white" data-background-color="white"></span>
                        <span class="badge filter badge-red" data-background-color="red"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Mini</p>
                    <label class="ml-auto">
                        <div class="togglebutton switch-sidebar-mini">
                            <label>
                                <input type="checkbox">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Images</p>
                    <label class="switch-mini ml-auto">
                        <div class="togglebutton switch-sidebar-image">
                            <label>
                                <input type="checkbox" checked="">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)" id="id1">
                    <img id="id1" class="lazy" src="{{asset('img/loading.gif')}}"
                         data-src="{{asset('assets/backend/img/sidebar-1.jpg')}}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)" id="id1">
                    <img class="lazy" src="{{asset('img/loading.gif')}}"
                         data-src="{{asset('assets/backend/img/sidebar-2.jpg')}}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)" id="id1">
                    <img class="lazy" src="{{asset('img/loading.gif')}}"
                         data-src="{{asset('assets/backend/img/sidebar-3.jpg')}}" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)" id="id1">
                    <img class="lazy" src="{{asset('img/loading.gif')}}"
                         data-src="{{asset('assets/backend/img/sidebar-4.jpg')}}" alt="">
                </a>
            </li>
            {{--<li>--}}
            {{--<a class="img-holder switch-trigger" href="javascript:void(0)">--}}
            {{--<img src="{{asset('assets/backend/img/sidebar-5.png')}}" alt="">--}}
            {{--</a>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>

<script src="{{asset('js/lazyload.js')}}"></script>
<script>
    // $("img.lazy").lazyload();
</script>
<script>
    function showMessage() {
        document.getElementById('id1').style.maxHeight = "200px";
        var images = document.querySelectorAll("#id1 img");
        for (var i = 0; i < images.length; i++) {
            images[i].src = images[i].getAttribute('data-src');
        }
    }
    // $("img.lazy").one("click", function(event) {
    //     $(this).attr("src", $(this).attr("data-original"));
    // });
</script>