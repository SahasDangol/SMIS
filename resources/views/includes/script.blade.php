
<!--   Core JS Files   -->
<script src="{{asset('assets/backend/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{asset('assets/backend/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('assets/backend/js/plugins/sweetalert2.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/backend/js/plugins/jquery.validate.min.js')}}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('assets/backend/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('assets/backend/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{asset('assets/backend/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('assets/backend/js/plugins/bootstrap-tagsinput.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/backend/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('assets/backend/js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assets/backend/js/plugins/nouislider.min.js')}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('assets/backend/js/plugins/arrive.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

<!-- Chartist JS -->
<script src="{{asset('assets/backend/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/backend/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/backend/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript')}}"></script>

<script type="text/javascript" src="{{ asset('assets/backend/js/graphs.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/backend/js/echarts.min.js') }}"></script>

<script src="{{url('assets/backend/lib/jquery-ui/jquery-ui.js')}}"></script>

<script src="{{url('assets/backend/js/ResizeSensor.js')}}"></script>
<script src="{{url('assets/backend/js/chart.echarts.js')}}"></script>

<script type="text/javascript" src="{{url('assets/backend/js/jquery.nepaliDatePicker.min.js')}}"></script>


<script type="text/javascript" src="{{ url('assets/backend/js/select2.min.js') }}"></script>

<script src="{{asset('js/lazyload.js')}}"></script>


<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/demo/demo.js')}}"></script>
<script>

    $(document).ready(function () {

    {{--for not submitting on press Enter--}}
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    {{--for not submitting on press Enter--}}
        $().ready(function () {
            let current = location.pathname;
            $('#sidebar-menu li a').each(function () {
                let $this = $(this);
                // if the current path is like this link, make it active
                if ($this.attr('href').indexOf(current) !== -1) {
                    if ($this.attr('href').indexOf(current) + current.length === $this.attr('href').length) {
                        $this.parent().addClass('active');
                    }
                }
            });

            $sidebar = $('.sidebar');
            $sidebar_img_container = $sidebar.find('.sidebar-background');
            $full_page = $('.full-page');
            $sidebar_responsive = $('body > .navbar-collapse');
            window_width = $(window).width();
            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }
            }
            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });
            $('.fixed-plugin .active-color span').click(function () {
                $full_page_background = $('.full-page-background');
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                var new_color = $(this).data('color');
                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // url:"/gadmin/dynamic_dependent/fetch",
                        url: "{{url('save')}}",
                        method: "POST",
                        data: {"data_color": new_color},
                        success: function (data1) {
                            // alert("sidebar ko color change vayo");
                        }
                    })
                }
                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }
                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });
            $('.fixed-plugin .background-color .badge').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                var new_color = $(this).data('background-color');
                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                    // alert(new_color)
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // url:"/gadmin/dynamic_dependent/fetch",
                        url: "{{url('save1')}}",
                        method: "POST",
                        data: {"data_background_color": new_color},
                        success: function (data1) {
                            // alert("sidebar ko background ko color change vayo");
                        }
                    })
                }
            });

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');
                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');
                var new_image = $(this).find("img").attr('src');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // url:"/gadmin/dynamic_dependent/fetch",
                    url: "{{url('save2')}}",
                    method: "POST",
                    data: {"background_image": new_image},
                    success: function (data1) {
                        // alert("sidebar ko background ko image change vayo");
                    }
                })
                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }
                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
                    $full_page_background.fadeOut('fast', function () {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }
                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }
                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });
            $('.switch-sidebar-image input').change(function () {
                $full_page_background = $('.full-page-background');
                $input = $(this);
                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }
                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }
                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }
                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function () {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function () {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>

<noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"/>
</noscript>

<script>
    $(document).ready(function () {
        // dashboard.admin_init();

        $('#checkall').click(function () {

            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
        @if (Session::has('message'))
            var message = '{{ Session::get('message')}}';
            var type = '{{ Session::get('type')}}';
             showNotification("top", "right", message,type);
        @endif
    });
</script>

{{--data table script--}}
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            },

            "order": [],
            "dom": 'Bfrtipl',
            extend: 'collection',
            "buttons": {
                "dom": {
                    "button": {
                        "tag": "button",
                        "className": "btn btn-sm btn-primary btn"
                    }
                },
                buttons: [
                    {
                        extend:    'copy',
                        titleAttr: 'Copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend:    'csv',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend:    'excel',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend:    'pdf',
                        titleAttr: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        titleAttr: 'Print',
                        exportOptions: {
                            columns: ':visible',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    },
                    {
                        extend: 'columnsToggle',
                        // columns: 0
                    },
                ]
            }
        });
        $('.buttons-copy').detach().appendTo('#buttons')
        $('.buttons-csv').detach().appendTo('#buttons')
        $('.buttons-excel').detach().appendTo('#buttons')
        $('.buttons-pdf').detach().appendTo('#buttons')
        $('.buttons-print').detach().appendTo('#buttons')
        $('.buttons-columnVisibility').detach().appendTo('#column')
    });
</script>
{{--data table script--}}

{{--Account datatable script--}}
<script>
    $(document).ready(function() {
        $('#account_datatable').DataTable({
            // "pagingType": "full_numbers",
            // "lengthMenu": [
            //     [10, 25, 50, -1],
            //     [10, 25, 50, "All"]
            // ],
            // responsive: true,
            // language: {
            //     search: "_INPUT_",
            //     searchPlaceholder: "Search records",
            // },
            //
            // dom: 'Bfrti',
            //
            // extend: 'collection',


            // "ajax": 'https://api.myjson.com/bins/qgcu',
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            "order": [],
            "dom": 'Bfrt',
            "buttons": {
                "dom": {
                    "button": {
                        "tag": "button",
                        "className": "btn btn-sm btn-outline-primary btn-round col-sm-1"
                    }
                },
                "buttons": [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ]
            },
            // "info": false
        });

        $('.buttons-copy').detach().appendTo('#buttons')
        $('.buttons-csv').detach().appendTo('#buttons')
        $('.buttons-excel').detach().appendTo('#buttons')
        $('.buttons-pdf').detach().appendTo('#buttons')
        // $('.buttons-print').detach().appendTo('#buttons')
        //
        // $('.buttons-columnVisibility').detach().appendTo('#column')

    });
</script>
{{--Account datatable script--}}

{{--datepicker and select picker--}}
<script>
    $(document).ready(function () {
        $(".nepali_datepicker").nepaliDatePicker({
            dateFormat: "%y-%m-%d",
            closeOnDateSelect: true,
        });
        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length !== 0) {
            md.initSliders();
        }
        demo.initMaterialWizard();
        setTimeout(function () {
            $('.card.card-wizard').addClass('active');
        }, 600);
    });
</script>
{{--datepicker and select picker--}}

<script>
    $(document).ready(function() {
        // Initialise the wizard
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.card-wizard').addClass('active');
        }, 600);
    });
    </script>

{{--notifications--}}
<script>
    function showNotification(from, align, message,type) {
        $.notify({
            icon: "add_alert",
            message: message

        }, {
            type: type,
            timer: 2000,
            color: Math.floor(6 * Math.random() + 1),
            placement: {
                from: from,
                align: align
            }
        });
    }
    /*----------------print function------------------*/
    function PrintElem() {
        window.print();
    }
</script>
<script>
    $(document).on('focus', 'input[type=number]', function (e) {
        $(this).on('mousewheel.disableScroll', function (e) {
            e.preventDefault()
        })
    })
    $(document).on('blur', 'input[type=number]', function (e) {
        $(this).off('mousewheel.disableScroll')
    })
    $(document).on('keydown', 'input[type=number]', function(e) {
        if ( e.which == 38 || e.which == 40 )
            e.preventDefault();
    });
</script>
{{--notifications--}}

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{asset('assets/backend/github/buttons.js')}}"></script>
<script>
$(document).ready(function () {
    $('.select2').select2();
});
</script>

<script>
    function changeSession(elem){
        if($(elem).val() == ""){
            return;
        }
        window.location = "<?php echo url('change_session') ?>/"+$(elem).val();
    }
</script>

<script>
    $( ".process" ).submit(function( event ) {
        on();
    });

    function on() {
        document.getElementById("overlay").style.display = "block";
    }
    function off() {
        document.getElementById("overlay").style.display = "none";
    }
</script>

@yield('script')






