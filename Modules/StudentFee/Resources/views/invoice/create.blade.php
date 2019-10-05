@extends('account')

@section('title', get_school_info('site_title').' | Generate Invoice')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/invoices/')}}" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">New Invoice</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2" data-size="13" id="classroom" name="classroom_id"
                                                data-style="select-with-transition" title="Select Classroom"
                                                required="true">
                                            <option disabled selected>Select Classroom</option>
                                            @foreach($classrooms as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2-multiple" data-size="13" id="feeType"
                                                name="fee_type_id[]"
                                                data-style="select-with-transition" title="Select Fee Types"
                                                required="true" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2 " data-size="7" id="student" name="student_id"
                                                data-style="select-with-transition" title="Select Student"
                                                required="true">
                                            <option disabled selected>Select Student</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>

                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <input class="form-control" value="{{ old('description') }}"
                                               type="text" maxlength="250" name="description"
                                               title="Any Information about Fee "/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-9 col-form-label"></label>
                                <input type="submit" class="btn btn-primary btn-round float-right mr-1"
                                       value="Save Invoice">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-md-12 -->
            </div>
            {{csrf_field()}}
        </form>
        <!-- end row -->
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.select2-multiple').select2({
                placeholder: "Select Fee Types"
            });

            /*ajax part*/
            $('#classroom').change(function () {
                $("#section option").remove();
                let ClassroomId = $(this).val();
                let csrf = $('meta[name="csrf-token"]');

                getStudent(ClassroomId);

                $("#feeType option").remove();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrf.attr('content')
                    },
                    url: "{{url('get_fee_types')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        $.each(data1, function (key, value) {

                            $('#feeType')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.fee_title));
                        });
                    }
                });


            });


        });

        function getStudent(classroomId) {
            $("#student option").remove();
            let student = $('#student');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('get_invoice_student')}}",
                method: "POST",
                data: {"classroom_id": classroomId},

                success: function (data2) {

                    student.append($("<option selected disabled></option>")
                        .attr("value", "")
                        .text(" Choose Student"));

                    student.append($("<option ></option>")
                        .attr("value", "all")
                        .text(" All Student"));

                    $.each(data2, function (key, value) {
                        $('#student')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.first_name + ' ' + value.last_name+ ' ('+value.section_name+')'));
                    });
                }
            })


        }
    </script>

@stop


