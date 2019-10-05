@extends('master')

@section('title', get_school_info('site_title').' | News & Events | Add')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/news_and_events/')}}" method="post"
              enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">News & Events</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-11 row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">News & Events Title*</label>
                                    <input class="form-control" type="text" maxlength="100" name="title"
                                           required="true"/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group ">
                                    <input type="text" class="form-control datepicker" name="date"
                                           placeholder="MM/DD/YYYY*" required="true">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating"><i class="fa fa-map-marker"
                                                                         aria-hidden="true"></i> Location*</label>
                                    <input type="text" class="form-control" name="location" required="true">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <input type="text" placeholder="Start Time*" class="form-control timepicker" name="start" required="true">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group ">
                                    <input type="text" placeholder="End Time*" class="form-control timepicker" name="end" required="true">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">
                                        No Of Days*
                                    </label>
                                    <input type="number" min="1" class="form-control" name="no_of_days" required="true">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">

                                {{--tinymce beginning--}}
                                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                                <textarea name="description" class="form-control my-editor"></textarea>
                                <script>
                                    var editor_config = {
                                        path_absolute: "{{url('/')}}/",
                                        selector: "textarea.my-editor",
                                        plugins: [
                                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                                            "insertdatetime media nonbreaking save table contextmenu directionality",
                                            "emoticons template paste textcolor colorpicker textpattern"
                                        ],
                                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                                        relative_urls: false,
                                        file_browser_callback: function (field_name, url, type, win) {
                                            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                                            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                                            if (type == 'image') {
                                                cmsURL = cmsURL + "&type=Images";
                                            } else {
                                                cmsURL = cmsURL + "&type=Files";
                                            }

                                            tinyMCE.activeEditor.windowManager.open({
                                                file: cmsURL,
                                                title: 'Filemanager',
                                                width: x * 0.8,
                                                height: y * 0.8,
                                                resizable: "yes",
                                                close_previous: "no"
                                            });
                                        }
                                    };

                                    tinymce.init(editor_config);
                                </script>
                                {{---------end of tiny mce---------}}


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Add News & Events
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop