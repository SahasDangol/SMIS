@extends('master')

@section('title', get_school_info('site_title').' | Add Photos')
@section('head')
    <style>
        img{
            max-height: 100px;
            padding: 15px;
        }
        .pip {
            position: relative;
            display: inline-block;
            font-size: 0;
        }
        .pip .remove {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #FFF;
            padding: 5px 2px 2px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            opacity: .2;
            text-align: center;
            font-size: 22px;
            line-height: 10px;
            border-radius: 50%;
        }
        .pip:hover .remove {
            opacity: 1;
        }
    </style>
@endsection
@section('Body')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Create Gallery</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="post" action="{{url('gallery')}}" class="form-horizontal process" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control">
                            <span class="bmd-help">Enter title that best describes your Album, eg.School Day, Cultural Pogram 2019, etc..</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" name="description" class="form-control">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="container" id="container">

                    </div>
                </div>
                <div class="col-md-3">
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <input type="file" id="files" multiple="multiple" name="image[]">
                    </span>
                </div>
                <div class="col-md-3 float-right">
                    <div class="row">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-round btn-success">Save<div class="ripple-container"></div></button>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{url('gallery')}}"  class="btn btn-round btn-success">Cancel<div class="ripple-container"></div></a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    $("#container").empty();
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<span class=\"remove\"><i class=\"fa fa-window-close\" aria-hidden=\"true\"></i></span>"+
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/>" +
                                "</span>").appendTo("#container");
                            $(".remove").click(function(){
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>
    @stop
