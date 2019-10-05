@extends('master')

@section('title', get_school_info('site_title').' | Student')
@section('head')
    <style>
        table tr {
            cursor: pointer;
        }


    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
@stop
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Student Information</h4>
                        @can('student-create')
                            <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                    data-target="#noticeModal">
                                <i class="material-icons">games</i>Advance Options
                            </button>
                        @endcan
                        @can('student-create')
                            <a href="{{url('/student/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Student
                                </button>
                            </a>
                        @endcan
                        @can('student-create')
                            <a href="{{url('/students/import')}}">
                                <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                        data-target="#myModal">
                                    <i class="material-icons">add</i>Import Excel
                                </button>
                            </a>
                        @endcan
                    </div>
                    {{--<div class="toolbar">--}}

                    {{--</div>--}}
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-1 col-form-label"></label>

                        </div>


                    </div>
                    <div class="material-datatables">
                        <table id="example_student" name="example_student" data-role="table" data-mode="columntoggle" class="ui-responsive"
                               class="table table-striped table-no-bordered table-hover"
                               cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>

                            </tr>
                            <tr>
                                {{--<div class="col-sm-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<select class="select2" data-size="8" id="classroom" name="classroom_id"--}}
                                                {{--data-style="select-with-transition" title="Select Classroom"--}}
                                                {{--required="true">--}}
                                            {{--<option disabled selected>Select Classroom</option>--}}
                                            {{--@foreach($classrooms as $classroom)--}}
                                                {{--<option value="{{$classroom->id}}"--}}
                                                        {{--@if( !empty($classroom_id) )--}}
                                                        {{--@if($classroom->id==$classroom_id) selected @endif--}}
                                                    {{--@endif>{{$classroom->class_name}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-5">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<select class="select2" data-size="7" id="section" name="section_id"--}}
                                                {{--data-style="select-with-transition" title="Select Section"--}}
                                                {{--required="true">--}}
                                            {{--<option disabled selected>Select Section</option>--}}
                                            {{--@if( !empty($section_id) )--}}
                                                {{--@foreach($sections as $section)--}}
                                                    {{--<option value="{{$section->id}}"--}}
                                                            {{--@if($section->id==$section_id) selected @endif>{{$section->name}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                        {{--</select>--}}
                                        {{--<button type="submit" class="btn btn-primary btn-round float-right mr-1">View--}}
                                            {{--Report--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{---------------------------------------------------------------------------------------}}
                                {{--<td>--}}
                                    {{--<select data-size="8" data-column="1" class="form-control" id="classroom"--}}
                                            {{--data-style="select-with-transition">--}}
                                        {{--<option value="">Select Class...</option>--}}
                                        {{--@foreach($classes as $class)--}}
                                            {{--<option value=" {{$class->class_name}}">--}}
                                               {{--{{$class->class_name}}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                        {{--@foreach($classrooms as $classroom)--}}
                                            {{--<option value="{{$classroom->class_name}} {{$classroom->id}}"--}}
                                                    {{--@if( !empty($classroom_id) )--}}
                                                    {{--@if($classroom->id==$classroom_id) selected @endif--}}
                                                {{--@endif>{{$classroom->class_name}}</option>--}}
                                        {{--@endforeach--}}

                                    {{--</select>--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<select data-column="2" data-size="7" class="form-control select2" id="section"--}}
                                            {{--data-style="select-with-transition">--}}
                                        {{--<option value="">Select Section...</option>--}}
                                        {{--@foreach($sections as $section)--}}
                                            {{--<option value=" {{$section->name}}">--}}
                                                {{--{{$section->name }}--}}
                                            {{--</option>--}}
                                        {{--@endforeach--}}
                                        {{--@if( !empty($section_id) )--}}
                                            {{--@foreach($sections as $section)--}}
                                                {{--<option value="{{$section->id}}"--}}
                                                        {{--@if($section->id==$section_id) selected @endif>{{$section->name}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}

                                    {{--</select>--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<button id="filter-select" type="submit" class="btn btn-primary btn-round float-right mr-1">Search--}}

                                    {{--</button>--}}
                                {{--</td>--}}
                                <td>
                                    <select data-size="8" data-column="2" class="form-control" id="filter-select1"
                                            data-style="select-with-transition">
                                        <option value="">Select Class...</option>
                                        {{--@foreach($classes as $class)--}}
                                        {{--<option value=" {{$class->class_name}}">--}}
                                        {{--{{$class->class_name}}--}}
                                        {{--</option>--}}
                                        {{--@endforeach--}}
                                        @foreach($sections as $section)
                                            <option value="{{$section->name}}"


                                                >{{$section->classrooms->class_name}} {{$section->name}} </option>
                                        @endforeach

                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <th data-priority="1">Roll No.</th>
                                <th data-priority="2">Class</th>
                                <th data-priority="3">Section</th>
                                <th data-priority="4">Full Name</th>
                                <th data-priority="5">Address</th>
                                <th data-priority="6">Guardian Name</th>
                                <th data-priority="7">Contact no.</th>


                                @can('student-edit')
                                    <th class="disabled-sorting ">Actions</th>
                                @elsecan('student-delete')
                                    <th class="disabled-sorting ">Actions</th>
                                @endcan
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th data-priority="1">Roll No.</th>
                                <th data-priority="2">Class</th>
                                <th data-priority="3">Section</th>
                                <th data-priority="4">Full Name</th>
                                <th data-priority="5">Address</th>
                                <th data-priority="6">Guardian Name</th>
                                <th data-priority="7">Contact no.</th>


                                @can('student-edit')
                                    <th class="disabled-sorting ">Actions</th>
                                @elsecan('student-delete')
                                    <th class="disabled-sorting ">Actions</th>
                                @endcan
                            </tr>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->

    @include('includes.advancedOption')

    </div>
@stop
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    {{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('table tr td:not(:last-child)').click(function () {--}}
                {{--window.location = $(this).parent().attr('href');--}}
                {{--return false;--}}
            {{--});--}}

        {{--});</script>--}}
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            var table = $('#example_student').DataTable({
                "pagingType": "full_numbers",

                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                "order": [],

                "dom": 'Bfrtipl',

                processing: true,
                serverSide: true,

                ajax: {
                    url: "{{route('student.index')}}",
                },
                columns: [
                    {
                        data: 'roll_no',
                        name: 'roll_no',
                    },
                    {
                        data: 'classroom_id',
                        name: 'classroom_id',
                    },
                    {
                        data: 'section_id',
                        name: 'section_id',
                    },
                    {
                        data: 'full_name',
                        name: 'full_name',
                    },
                    {
                        data: 'permanent_address',
                        name: 'permanent_address',
                    },
                    {
                        data: 'guardian_name',
                        name: 'guardian_name',
                    },
                    {
                        data: 'guardian_mobile',
                        name: 'guardian_mobile',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }

                ],
            });
            // $('.filter-input').keyup(function () {
            //     table.column($(this).data('column'))
            //         .search($(this).val())
            //         .draw();
            //
            // });

            // $('#filter-select').change(function () {
            //     table.column($(this).data('column'))
            //         .search($(this).val())
            //         .draw();
            //
            // });

            $('#filter-select').click(function(){
                var category = $('#classroom').val();
                var ses=$('#section').val();
                console.log(ses);
                console.log(category);
                table.column($(this).data('column'))
                        .search(category)
                        .draw();
                // #example-student.fnFilter("^"+ $(this).val() +"$", 2, false, false)

            });




        $('#filter-select1').change(function(){
            var category = $('#filter-select1').val();

            console.log(category);
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
            // #example-student.fnFilter("^"+ $(this).val() +"$", 2, false, false)

        });


        })


    </script>
    <script>
        $('#example_student').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');
            var token = $(this).data("token");
            var id = $(this).data("id");
            // confirm then
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                        url: url,
                        type: 'post',
                        dataType: "json",
                        // contentType: "application/json; charset=utf-8",
                        data: {
                            id: "id",
                            // '_token' : $('input[name="_token"]').val(),
                            _method: 'DELETE',
                            // submit: true,
                            // token:'_token'
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText); // this line will save you tons of hours while debugging
                            // do something here because of error
                        },
                        success: function (json) {
                            // $('#example_student').DataTable().ajax.reload(null,false);
                            window.location = "{{route('student.index')}}"


                        },


                    }
                ).always(function (data) {

                });
            } else
                alert("You have cancelled!");
        });


        $(document).ready(function () {
            var json = {d: "aaData.............THE STRING......."}; // the same object you see in the debugger;
            $('#example_student').DataTable({
                "columns": [{"data": "id"}, {"data": "first_name"}, {"data": "last_name"}],
                "aaData": jQuery.parseJSON(json.d).aaData
            });
        });
    </script>
    <script>

        {{--Dependent Select Options for section--}}
        $(document).ready(function () {
            $('#classroom').change(function () {

                $("#section option").remove();

                var ClassroomId = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        if (data1.length == 1) {
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

            $('#section').change(function () {
                // alert("section change vayo vayo");

                $("#student option").remove();


                var SectionId = $(this).val();
                // alert(ClassroomId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('get_student')}}",
                    method: "POST",
                    data: {"section_id": SectionId},
                    success: function (data2) {
                        $('#student')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Student"));

                        $.each(data2, function (key, value) {
                            $('#student')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.first_name.charAt(0).toUpperCase() + value.first_name.slice(1) + " " + value.last_name.charAt(0).toUpperCase() + value.last_name.slice(1)));
                        });


                    },


                })

            });
        });


    </script>
    {{--<script>--}}
    {{--var oTable = $('#example_student').DataTable({--}}
    {{--dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+--}}
    {{--"<'row'<'col-xs-12't>>"+--}}
    {{--"<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",--}}
    {{--processing: true,--}}
    {{--serverSide: true,--}}
    {{--ajax: {--}}
    {{--url: 'https://datatables.yajrabox.com/fluent/custom-filter-data',--}}
    {{--data: function (d) {--}}
    {{--d.classroom_id = $('input[name=classroom_id]').val();--}}
    {{--// d.email = $('input[name=email]').val();--}}
    {{--}--}}
    {{--},--}}
    {{--columns: [--}}
    {{--{data: 'id', name: 'id'},--}}
    {{--{data: 'name', name: 'name'},--}}
    {{--{data: 'email', name: 'email'},--}}
    {{--{data: 'created_at', name: 'created_at'},--}}
    {{--{data: 'updated_at', name: 'updated_at'}--}}
    {{--]--}}
    {{--});--}}

    {{--$('#search-form').on('submit', function(e) {--}}
    {{--oTable.draw();--}}
    {{--e.preventDefault();--}}
    {{--});--}}
    {{--</script>--}}

@stop
