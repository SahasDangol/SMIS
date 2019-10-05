@extends('master')

@section('title', get_school_info('site_title').' | Calender')

@section('Body')
    <div class="container">

        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card">
                    <div class="card-body ">
                        <!-- Start of nepali calendar widget -->
                        <script type="text/javascript"> <!--
                            var nc_width = 'responsive';
                            var nc_height = 610;
                            var nc_api_id = "110132j213"; //-->
                        </script>
                        <script type="text/javascript"
                                src="https://www.ashesh.com.np/nepali-calendar/js/ncf.js"></script>
                        <div id="ncwidgetlink">Powered by © <a href="https://www.ashesh.com.np/nepali-calendar/"
                                                               id="nclink" title="Nepali calendar" target="_blank">nepali
                                calendar</a></div>
                        <!-- End of nepali calendar widget -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


