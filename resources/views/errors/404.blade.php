<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets/backendimg/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('assets/backend/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        {{get_school_info('site_title')}} | 404 Errors
    </title>

    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link href="{{url('assets/backend/css/material-dashboard.minf066.css?v=2.1.0')}}" rel="stylesheet"/>
</head>

<body class="off-canvas-sidebar">
<div class="wrapper wrapper-full-page">
    <div class="page-header error-page header-filter"
         style="background-image: url({{asset('assets/backend/img/school3.jpg')}})">
        <div class="content-center">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title">404</h1>
                    <h1><b>Page not found </b></h1>
                    <h4>Ooooups! Looks like you got lost.</h4>
                    <br>
                    <a href="javascript:history.go(-1)" class="btn btn-outline-info btn-round">Go Back</a>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">

                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    , made by
                    <a href="#" target="_blank">TuringSoft</a> for a better MIS.
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>