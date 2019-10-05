@extends('master')

@section('title', get_school_info('site_title').' | Guardian')
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
                        <h4 class="card-title">Guardian Information</h4>
                        @can('guardian-create')
                            <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                    data-target="#noticeModal">
                                <i class="material-icons">games</i>Advance Options
                            </button>
                        @endcan
                        @can('guardian-create')
                            <a href="{{url('/guardian/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Guardian
                                </button>
                            </a>
                        @endcan
                        @can('guardian-create')
                            <a href="{{url('/guardians/import')}}">
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

                        <div class="material-datatables">
                            <table id="example_guardian" data-role="table" data-mode="columntoggle" class="ui-responsive"
                                   class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th data-priority="1">ID</th>
                                    <th data-priority="2">Full Name</th>
                                    <th data-priority="3">Contact No.</th>

                                    <th data-priority="4">Address</th>




                                    @can('guardian-edit')
                                        <th class="disabled-sorting ">Actions</th>
                                    @elsecan('guardian-delete')
                                        <th class="disabled-sorting ">Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th data-priority="1">ID</th>
                                    <th data-priority="2">Full Name</th>
                                    <th data-priority="3">Contact No.</th>

                                    <th data-priority="4">Address</th>


                                    @can('guardian-edit')
                                        <th class="disabled-sorting ">Actions</th>
                                    @elsecan('guardian-delete')
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function(){
            $('table tr td:not(:last-child)').click(function(){
                window.location = $(this).parent().attr('href');
                return false;
            });

        });</script>
    <script>
        $(document).ready(function(){
            $('#example_guardian').DataTable({
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
                    url:"{{route('guardian.index')}}",
                },
                columns:[
                    {
                        data:'id',
                        name:'id',
                    },
                    {
                        data:'full_name',
                        name:'full_name',
                    },
                    {
                        data:'guardian_mobile',
                        name:'guardian_mobile',
                    },

                    {
                        data:'guardian_permanent_address',
                        name:'guardian_permanent_address',
                    },

                    {
                        data:'action',
                        name:'action',
                        orderable:false
                    }
                ],

            });
        })


    </script>
    <script>
        $('#example_guardian').on('click', '.btn-delete[data-remote]', function (e) {
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
            if (confirm('Are you sure you want to delete guardian record along with its children?')) {
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
                            // $('#example_student').DataTable().ajax.reload(null,false);
                            window.location = "{{route('guardian.index')}}"




                        },


                    }

                ).always(function (data) {

                });
            }else
                alert("You have cancelled!");
        });


        $(document).ready(function () {
            var json = { d: "aaData.............THE STRING......."}; // the same object you see in the debugger;
            $('#example_guardian').DataTable({
                "columns": [{ "data": "id" }, { "data": "guardian_first_name" }, { "data": "guardian_last_name" }],
                "aaData": jQuery.parseJSON(json.d).aaData
            });
        });
    </script>
@stop
