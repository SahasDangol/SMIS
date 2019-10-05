@extends('account')

@section('title', get_school_info('site_title').' | Collect Fee')

@section('Body')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-sm-12 ml-auto mr-auto">
                <form class="form" method="POST" action="{{url('/payment/student')}}">
                    @csrf
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
                                        <select class="select2 " data-size="7" id="student" name="student_id"
                                                data-style="select-with-transition" title="Select Student"
                                                required="true">
                                            <option disabled selected>Select Student</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <label class="col-sm-9 col-form-label"></label>
                                <input type="submit" class="btn btn-primary btn-round float-right mr-1"
                                       value="Show Fees">
                                </input>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        $(document).ready(function () {

            /*ajax part*/
            $('#classroom').change(function () {
                $("#section option").remove();
                let ClassroomId = $(this).val();
                let csrf = $('meta[name="csrf-token"]');

                getStudent(ClassroomId);
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