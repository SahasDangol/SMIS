@extends('master')

@section('title', get_school_info('site_title').' | Student Leave Application')
@section('head')
    <style>
        table tr {
            cursor: pointer;
        }    </style>
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
                        <h4 class="card-title">Student Leave Application</h4>
                        @can('student-create')
                            <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                    data-target="#noticeModal">
                                <i class="material-icons">games</i>Advance Options
                            </button>
                        @endcan
                    </div>
                    <div class="card-body">

                        <div class="material-datatables">
                            <table id="datatables" data-role="table" data-mode="columntoggle" class="ui-responsive"
                                   class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th>Date</th>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Student Name</th>
                                    <th>Subject</th>
                                    <th>Content</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Student Name</th>
                                    <th>Subject</th>
                                    <th>Content</th>

                                    <th class="disabled-sorting text-right">Actions</th>

                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($applications as $application)

                                    <tr>
                                        <td>{{get_nepali_date($application->date)}} B.S</td>
                                        <td>{{$application->students->classrooms->class_name}}</td>
                                        <td>{{$application->students->sections->name}}</td>
                                        <td>{{$application->students->first_name}} {{$application->students->middle_name_name}} {{$application->students->last_name}}</td>
                                        <td>{{$application->subject}}</td>
                                        <td>{{$application->content}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-info btn-round" data-toggle="modal"
                                               data-target="#myModal[{{$application->id}}]"
                                               class="btn btn-link btn-info btn-just-icon like"><i
                                                        data-placement="bottom" title="See Leave Application" rel="tooltip" class="material-icons">dvr</i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="myModal[{{$application->id}}]" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">
                                                        <i class="material-icons">clear</i>
                                                    </button>
                                                </div>
                                                <div class="card-header">
                                                    <h3 class="float-right">{{get_nepali_date($application->date)}} B.S</h3>
                                                </div>
                                                <div class="card-title ml-2">
                                                    <h4>Dear Class Teacher, </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{$application->content}}
                                                    </p>
                                                    <div class="form-group bmd-form-group is-filled float-right">
                                                        <label class="label-control">Sincere</label>
                                                        <input type="text" class="form-control"
                                                               value="{{$application->students->first_name}} {{$application->students->middle_name_name}} {{$application->students->last_name}}" disabled="">
                                                        <span class="material-input"></span>
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger btn-link"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
    <script>
        $(document).ready(function () {
            $('table tr td:not(:last-child)').click(function () {
                window.location = $(this).parent().attr('href');
                return false;
            });

        });
    </script>
@stop
