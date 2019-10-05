@extends('master')

@section('title', get_school_info('site_title').' | Transportation Report')
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
                        <h4 class="card-title">Transportation Report</h4>
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

                                    <th data-priority="1">S.N.</th>

                                    <th data-priority="2">Route's Name</th>
                                    <th data-priority="3">Route's Fare</th>
                                    <th data-priority="4">Vehicle Name</th>
                                    <th data-priority="5">Driver's Name</th>
                                    @can('student-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('student-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th data-priority="1">S.N.</th>
                                    <th data-priority="2">Route's Name</th>
                                    <th data-priority="3">Route's Fare</th>
                                    <th data-priority="4">Vehicle's Name</th>
                                    <th data-priority="5">Driver's Name</th>
                                    @can('student-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('student-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $i = 1 ?>

                                @foreach($transportroutes as $route)

                                    <tr href="{{url('report/transportation/profile/'.$route->vehicle_id)}}">
                                        <td>{{$i}}</td>
                                        <?php  $i++;
                                        ?>

                                        <td>{{ucfirst($route->route_name)}}</td>
                                        <td>{{ucfirst($route->route_fare)}} </td>
                                        <td>{{ucfirst($route->vehicle_name)." (".($route->serial_number).")"}}</td>
                                        <td>{{ucfirst($route->first_name)." ".ucfirst($route->middle_name)." ".ucfirst($route->last_name)}}</td>
                                        <td class="text-right">
                                            @can('student-list')
                                                <a href="{{url('report/transportation/profile/'.$route->vehicle_id)}}"
                                                   class="btn btn-link btn-info btn-just-icon like"><i
                                                            title="View" class="material-icons">dvr</i></a>
                                            @endcan

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
