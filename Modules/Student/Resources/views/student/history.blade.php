@extends('master')

@section('title', get_school_info('site_title').' | Student History')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Student History</h4>
                        @can('student-create')
                            <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                    data-target="#noticeModal">
                                <i class="material-icons">games</i>Advance Options
                            </button>
                        @endcan
                    </div>
                    {{--<div class="toolbar">--}}

                    {{--</div>--}}
                    <div class="card-body">

                        <div class="material-datatables">
                            <table id="datatables" data-role="table" data-mode="columntoggle" class="ui-responsive"
                                   class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th data-priority="1">Roll No.</th>
                                    <th data-priority="2">Class</th>
                                    <th data-priority="3">Student Name</th>
                                    <th data-priority="4">Previous School</th>
                                    <th data-priority="5">Previous Class</th>
                                    <th data-priority="6">Obtained Grade</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th data-priority="1">Roll No.</th>
                                    <th data-priority="2">Class</th>
                                    <th data-priority="3">Student Name</th>
                                    <th data-priority="4">Previous School</th>
                                    <th data-priority="5">Previous Class</th>
                                    <th data-priority="6">Obtained Grade</th>
                                </tfoot>
                                <tbody>
                                @foreach($student as $aa)

                                        <tr>
                                            <td>{{$aa->roll_no}}</td>
                                            <td>
                                                @foreach($classrooms as $classroom)
                                                    @if($classroom->id==$aa->classroom_id)
                                                        {{ ucfirst($classroom->class_name)}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ucfirst($aa->first_name)}} {{ucfirst($aa->middle_name)}} {{ucfirst($aa->last_name)}}</td>
                                            <td>{{ucfirst($aa->previous_school_name)}}</td>
                                            <td>
                                                @foreach($classrooms as $classroom)
                                                    @if($classroom->id==$aa->previous_class)
                                                        {{ ucfirst($classroom->class_name)}}
                                                    @else
                                                        N/A
                                                    @endif

                                                @endforeach
                                            </td>
                                            <td>

                                                @foreach($grades as $grade)
                                                    @if($grade->id==$aa->grade)
                                                        {{ucfirst( $grade->name)}}

                                                    @endif

                                                @endforeach

                                            </td>
                                        </tr>

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

