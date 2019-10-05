@extends('master')

@section('title', get_school_info('site_title').' | Edit Testimonial')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/testimonial/'.$testimonial->id)}}" method="post" enctype="multipart/form-data">
           @method('PUT')
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Testimonial</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Testimonial Name*</label>
                                <input class="form-control" placeholder="Testimonial Name" type="text" maxlength="100"
                                       value="{{$testimonial->name}}" name="name" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Position*</label>
                                <input class="form-control"  type="text" maxlength="191" name="position" value="{{$testimonial->position}}"  required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 ml-5 col-form-label">Image*</label>

                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img class="img" src="{{url('/').Storage::url($testimonial->image)}}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                  <span class="btn btn-primary  btn-round btn-file">
                                    <label for="logo" class="fileinput-new" >Choose Photo</label>
                                      <span for="logo" class="fileinput-exists">Change Photo</span>
                                      <input type="file" value="{{old('image')}} " id="image"
                                             name="image">
                                  </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                   data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">

                                {{--tinymce--}}
                                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                                <textarea name="testimonial" class="form-control my-editor">{{$testimonial->testimonial}}</textarea>
                                <script>
                                    var editor_config = {
                                        path_absolute : "{{url('/')}}/",
                                        selector: "textarea.my-editor",
                                        plugins: [
                                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                                            "insertdatetime media nonbreaking save table contextmenu directionality",
                                            "emoticons template paste textcolor colorpicker textpattern",
                                            "fullscreen",
                                        ],
                                        menubar: "view",
                                        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                                        toolbar: "fullscreen | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media |fontselect |  fontsizeselect",
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
                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Update Testimonial
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop