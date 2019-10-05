@extends('master')

@section('title', get_school_info('site_title').' | Human Resources')
@section('head')
<style>
    table tr {
        cursor: pointer;
    }    </style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,700" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
@stop
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Human Resources Information </h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('hr-create')
                            <a href="{{url('/staff/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Human Resource
                                </button>
                            </a>
                            <a href="{{url('/hr/import')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i>Import Excel
                                </button>
                            </a>
                        @endcan

                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="example_staff" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Staff Id</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Full Name</th>
                                    <th>Mobile no.</th>
                                    <th>Email</th>
                                    <th>Blood Group</th>
                                    <th>Joining Date</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Photo</th>
                                    <th>Staff Id</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Full Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Blood Group</th>
                                    <th>Joining Date</th>
                                    <th class="text-right">Actions</th>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function(){
            $('table tr td:not(:last-child)').click(function(){
                window.location = $(this).parent().attr('href');
                return false;
            });

        });
    </script>

    <script>
        $(document).ready(function(){
            $('#example_staff').DataTable({
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

                processing:true,
                serverSide: true,

                ajax:{
                    url:"{{route('staff.index')}}",
                },
                columns:[
                    {
                        data: 'personal_photo',
                        name: 'personal_photo',
                        render: function (data, type, full, meta) {
                            {{--return "<img src="{{URL::asset('/')}}+ data + "  +  height='50' class='img-thumbnail' />";--}}
                               if (data==null){
                                return "<img src=\"{{asset('img/default-avatar.png')}}" +"\" height=\"50\" class=\"img-thumbnail\" />";
                            }else {
                                return "<img src=\"{{url('/').\Illuminate\Support\Facades\Storage::url('')}}" + data + "\" height=\"50\"/>";
                            }
                        },
                        orderable: false
                    },
                    {
                        data:'staff_id',
                        name:'staff_id',
                    },
                    {name:'department',
                        data:'department',
                        // render: function (data, type, row, meta) {
                        //     return (row.classroom_id=class_name);
                        // }
                    },
                    {
                        data:'designation',
                        name:'designation',
                    },  {
                        data:'full_name',
                        name:'full_name',
                    },  {
                        data:'mobile',
                        name:'mobile',
                    },  {
                        name:'email',
                        data:'email',


                    },
                    {
                        data:'blood_group',
                        name:'blood_group',
                    },
                    {
                        data:'joining_date',
                        name:'joining_date',
                    },
                    {
                        data:'action',
                        name:'action',
                        orderable:false
                    }



                ]
            });
        })
    </script>
    <script>
    $('#example_staff').on('click', '.btn-delete[data-remote]', function (e) {
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
        id:"id",
        // '_token' : $('input[name="_token"]').val(),
        _method: 'DELETE',
        // submit: true,
        // token:'_token'
        },
            error: function(xhr) {
                console.log(xhr.responseText); // this line will save you tons of hours while debugging
                // do something here because of error
            },
            success: function(json) {

                window.location = "{{route('staff.index')}}"



            },


    }

    ).always(function (data) {
    // $('#example_staff').DataTable().draw(false);
    });
    }else
    alert("You have cancelled!");
    });


    $(document).ready(function () {
        var json = { d: "aaData.............THE STRING......."}; // the same object you see in the debugger;
        $('#example_staff').DataTable({
            "columns": [{ "data": "id" }, { "data": "first_name" }, { "data": "last_name" }],
            "aaData": jQuery.parseJSON(json.d).aaData
        });
    });
    </script>

@stop


