@extends('master')

@section('title', get_school_info('site_title').' | Add Routine')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/routines/')}}" method="post"
              enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Add New Routine</h4>
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

                                        <option disabled selected>Class*</option>
                                    @foreach($classroom as $aa)
                                        <option value="{{$aa->id}}">{{$aa->class_name}}</option>
                                    @endforeach
                                </select>


                            </div>


                            <div class="form-group">

                                <select class="select2" data-size="7" name="section_id" id="section"
                                        data-style="select-with-transition"
                                        required="true">

                                        <option disabled selected>Section*</option>

                                </select>


                            </div>

                            <label>Routine photo*</label>

                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                {{--<div class="fileinput-new thumbnail">--}}
                                {{--<img src="{{Storage::url($staff->citizenship_photo)}}">--}}
                                {{--</div>--}}
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                  <span class="btn btn-primary  btn-round btn-file">
                                    <label for="logo" class="fileinput-new" >Choose Photo</label>
                                      <span for="logo" class="fileinput-exists">Change Photo</span>
                                      <input type="file" value="{{old('routine_photo')}} " id="routine_photo"
                                             name="routine_photo" required="true"/>
                                  </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>



                    </div>
                    </div>
                    <button class="btn btn-primary btn-round float-right mr-1">
                        Add Routine
                    </button>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop

@section('script')
     <script>
   {{--section from class--}}
   $(document).ready(function () {
       $('#classroom').change(function () {


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
         {{--attendance for student--}}
     </script>
@stop