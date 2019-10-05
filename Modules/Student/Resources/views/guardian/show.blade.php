@extends('master')

@section('title', get_school_info('site_title').' | Guardian Profile')
@section('head')
    <style>

    </style>
@stop
@section('Body')
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">

                        <img class="img" src="{{asset('assets/backend/img/boy.png')}}"/>


                    </a>
                </div>
                <div class="card-body">
                    <h4 class="title">
                        <b>{{ ucfirst($guardian->guardian_first_name) .' '.ucfirst($guardian->guardian_middle_name).' '.ucfirst($guardian->guardian_last_name) }}
                        </b> <br>
                        <a href="{{url('/guardian/'.$guardian->id.'/edit')}}"
                           class="btn btn-primary btn-link btn-sm">Edit</a>
                    </h4>

                    <hr>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <div class="wizard-navigation">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab" href="#profile"
                                   aria-expanded="true">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#children"
                                   aria-expanded="false">Children({{count($childrens)}})</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="profile" class="tab-pane active">
                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td><b>Guardian's Name</b></td>
                                        <td>{{ ucfirst($guardian->guardian_first_name) .' '.ucfirst($guardian->guardian_middle_name).' '.ucfirst($guardian->guardian_last_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>@if($guardian->guardian_email==null)
                                                N/A
                                            @else
                                                {{$guardian->guardian_email  }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>@if($guardian->guardian_phone==null)
                                                N/A
                                            @else
                                                {{$guardian->guardian_phone  }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>

                                        <td><b>Mobile</b></td>
                                        <td>{{$guardian->guardian_mobile}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Temporary Address</b></td>
                                        <td> @if($guardian->guardian_temporary_address==null)
                                                N/A
                                            @else
                                                {{ucfirst($guardian->guardian_temporary_address)}}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td><b>Permanent Address</b></td>
                                        <td>{{ucfirst($guardian->guardian_permanent_address)}}</td>

                                    </tr>
                                    <tr>
                                        <td><b>Occupation</b></td>
                                        <td>@if($guardian->guardian_occupation==null)
                                                N/A
                                            @else
                                                {{$guardian->guardian_occupation  }}
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div id="children" class="tab-pane">
                                <table class="table table-custom" width="100%">
                                    <tbody>

                                    <td></td>
                                    <td><b>No. of Children:</b> {{count($childrens)}}</td>
                                    <td></td>
                                    <tr size="5" bgcolor="#dcdcdc">
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @foreach($childrens as $children)

                                        <tr>
                                            <td><b>Student's Name</b></td>
                                            <td>{{ ucfirst($children->first_name) .' '.ucfirst($children->middle_name).' '.ucfirst($children->last_name) }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Roll No.</b></td>
                                            <td>
                                                {{$children->roll_no  }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Class</b></td>
                                            <td>
                                                {{ucfirst($children->classrooms->class_name)  }}

                                            </td>
                                        </tr>
                                        <tr>

                                            <td><b>Section</b></td>
                                            <td>{{ucfirst($children->sections->name)}}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><b>Relation</b></td>
                                            <td>{{ucfirst($children->relation)}}
                                            </td>
                                        </tr>
                                        <tr size="5" bgcolor="#dcdcdc">
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    data table Payment History Tab script
    <script>
        $(document).ready(function () {
            $('#datatables1').DataTable({
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

                dom: 'Blfrtip',

                extend: 'collection',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Copy</button>',
                        titleAttr: 'Copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<button class=" btn btn-primary btn-round btn-sm">CSV</button>',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Excel</button>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Pdf</button>',
                        titleAttr: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<button class=" btn btn-primary btn-round float-right btn-sm col-sm-12">Print</button>',
                        titleAttr: 'Print',
                        exportOptions: {
                            columns: ':visible',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    },
                    {
                        extend: 'columnsToggle',
                        // columns: 0
                    },
                ]
            });

            $('.buttons-copy').detach().appendTo('#buttons')
            $('.buttons-csv').detach().appendTo('#buttons')
            $('.buttons-excel').detach().appendTo('#buttons')
            $('.buttons-pdf').detach().appendTo('#buttons')
            $('.buttons-print').detach().appendTo('#buttons')

            $('.buttons-columnVisibility').detach().appendTo('#column')

        });
    </script>
    {{--data table script--}}
@stop
