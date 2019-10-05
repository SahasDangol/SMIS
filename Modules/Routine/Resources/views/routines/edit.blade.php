@extends('master')

@section('title', get_school_info('site_title').' | Edit Routine')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/routines/'.$routine->id)}}" method="post"
              enctype="multipart/form-data">
            @method('PUT')
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Edit Routine</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-4 ">

                            <div class="form-group">

                                <select class="select2" data-size="7" name="classroom_id" id="classroom"
                                        data-style="select-with-transition"
                                        required="true">
                                    <option disabled>Class*</option>

                                    @foreach($classroom as $aa)
                                        <option value="{{$aa->id}}"
                                                @if($routine->classroom_id==$aa->id)
                                                selected
                                                @endif>{{$aa->class_name}}</option>
                                    @endforeach
                                </select>


                            </div>


                            <div class="form-group">

                                <select class="select2" data-size="7" name="section_id" id="section"
                                        data-style="select-with-transition"
                                        required="true">
                                    <option disabled>Section*</option>
                                    @if( !empty($routine->section_id) )
                                        @foreach($section as $sec)
                                            <option value="{{$sec->id}}"
                                                    @if($sec->id==$routine->section_id) selected @endif>{{$sec->name}}</option>
                                        @endforeach
                                    @endif

                                </select>


                            </div>

                            <label>Routine photo*</label>

                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img class="img" src="{{url('/').Storage::url($routine->routine_photo)}}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                  <span class="btn btn-primary  btn-round btn-file">
                                    <label for="logo" class="fileinput-new">Choose Photo</label>
                                      <span for="logo" class="fileinput-exists">Change Photo</span>
                                      <input type="file" value="{{old('routine_photo')}} " id="routine_photo"
                                             name="routine_photo">
                                  </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <button class="btn btn-primary btn-round float-right mr-1">
                        Update Routine
                    </button>
                </div>

            </div>

            {{csrf_field()}}
        </form>
    </div>
@stop
@section('script')
    <script> $(document).ready(function () {
            $('#classroom').change(function () {
                // alert("vayo");

                $("#section option").remove();


                var ClassroomId = $(this).val();
                // alert(ClassroomId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        // alert("hell yeah");
                        if (data1.length == 1) {
                            $.each(data1, function (key, value) {
                                $('#section')
                                    .append($("<option selected></option>")
                                        .attr("value", value.id)
                                        .text(value.name));
                            });
                        } else {
                            $('#section')
                                .append($("<option selected disabled></option>")
                                    .attr("value", "")
                                    .text(" Choose Section"));


                            $.each(data1, function (key, value) {
                                $('#section')
                                    .append($("<option></option>")
                                        .attr("value", value.id)
                                        .text(value.name));
                            });
                        }


                    }
                })

            });
        });
    </script>
@stop