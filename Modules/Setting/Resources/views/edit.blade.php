@extends('master')

@section('title', get_school_info('site_title').' | System Setting Update')
@section('Body')
    <div class="container-fluid">
        <div class="col-md-12 col-12">
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <form id="TypeValidation" class="form-horizontal process" action="{{route('setting.update')}}" method="post"
                          enctype="multipart/form-data">
                        @method('PUT')

                        <div class="card-header text-center">
                            <h3 class="card-title">
                                School Setting
                            </h3>
                            {{--<div class="card-header card-header-rose card-header-text">--}}
                            {{--<div class="card-text">--}}
                            {{--<h4 class="card-title">School Setting</h4>--}}
                            {{--</div>--}}
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#general" data-toggle="tab" role="tab"
                                       aria-expanded="true">
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#principal" data-toggle="tab" aria-expanded="false">
                                        Principal's Voice
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body ">
                            <div class="tab-content">
                                <div class="tab-pane active" id="general">
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="school_name" class="bmd-label-floating">School Full Name*
                                                   </label>
                                                <input class="form-control"  type="text"
                                                       maxlength="100" value="{{get_school_info("school_name")}}"
                                                       name="school_name" required="true"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="site_title" class="bmd-label-floating">Short Name*
                                                </label>
                                                <input class="form-control" name="short_name" type="text" maxlength="50"
                                                       value="{{get_school_info("short_name")}}"
                                                       required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="tagline" class="bmd-label-floating">School Tagline*
                                                </label>
                                                <input value="{{get_school_info("tagline")}}" class="form-control"

                                                       maxlength="150" type="text" name="tagline" required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="school_email" class="bmd-label-floating">School Email*
                                                </label>
                                                <input value="{{get_school_info("school_email")}}" class="form-control"
                                                       type="text"  maxlength="50" name="school_email"
                                                       email="true" required="true"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="school_phone" class="bmd-label-floating">School Phone*
                                                </label>
                                                <input value="{{get_school_info("school_phone")}}" class="form-control"
                                                       type="text" name="school_phone" maxlength="10" placeholder="Phone"
                                                       number="true" required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="address" class="bmd-label-floating">School Address
                                                </label>
                                                <input value="{{get_school_info("school_address")}}"
                                                       class="form-control" type="text"
                                                       maxlength="100" name="school_address" required="true"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="established_date" class="bmd-label-floating">Established In*
                                                </label>
                                                <input value="{{get_school_info("establish_date")}}"
                                                       class="form-control"
                                                       name="establish_date" type="text" maxlength="10"
                                                        required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="fb_link" class="bmd-label-floating">Facebook Link
                                                </label>
                                                <input value="{{get_school_info("fb_link")}}" class="form-control"
                                                       type="text"
                                                       name="fb_link" />
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="twitter_link" class="bmd-label-floating">Twitter Link
                                                </label>
                                                <input value="{{get_school_info("twitter_link")}}" class="form-control"
                                                     type="text" name="twitter_link" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="instagram_link" class="bmd-label-floating">Instagram Link
                                                </label>
                                                <input value="{{get_school_info("instagram_link")}}"
                                                       class="form-control"
                                                    type="text" name="instagram_link" />
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="linkedin_link" class="bmd-label-floating">LinkedIn Link
                                                </label>
                                                <input value="{{get_school_info("linkedin_link")}}" class="form-control"
                                                      type="text" name="linkedin_link" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{url('/').Storage::url(get_school_info("logo"))}}"
                                                         alt="{{ get_school_info("logo") }}">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                  <span class="btn btn-rose btn-sm btn-round btn-file">
                                    <label for="logo" class="fileinput-new">Choose Logo</label>
                                      <span for="logo" class="fileinput-exists">Change Logo</span>
                                      <input type="file" id="logo" name="logo">
                                  </span>
                                                    <a href="#pablo" class="btn btn-sm btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="principal">

                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="form-group">

                                                {{--tinymce--}}
                                                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                                                <label for="principal_voice" class="bmd-label-floating">Principal's Voice*
                                                    </label>
                                                <textarea name="principal_voice" class="form-control my-editor">

                                                    {{ get_school_info("principal_voice") }}
                                                </textarea>
                                                <script>
                                                    var editor_config = {
                                                        path_absolute : "{{url('/')}}/",
                                                        selector: "textarea.my-editor",
                                                        plugins: [
                                                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                                                            "insertdatetime media nonbreaking save table contextmenu directionality",
                                                            "emoticons template paste textcolor colorpicker textpattern"
                                                        ],
                                                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                                                        relative_urls: false,
                                                        file_browser_callback : function(field_name, url, type, win) {
                                                            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                                            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                                                            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                                                            if (type == 'image') {
                                                                cmsURL = cmsURL + "&type=Images";
                                                            } else {
                                                                cmsURL = cmsURL + "&type=Files";
                                                            }

                                                            tinyMCE.activeEditor.windowManager.open({
                                                                file : cmsURL,
                                                                title : 'Filemanager',
                                                                width : x * 0.8,
                                                                height : y * 0.8,
                                                                resizable : "yes",
                                                                close_previous : "no"
                                                            });
                                                        }
                                                    };

                                                    tinymce.init(editor_config);
                                                </script>
                                                {{---------end of tiny mce---------}}


                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="card-footer ml-auto mr-auto float-right">
                            <button type="submit" class="btn btn-round btn-primary">Update Information</button>
                        </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop