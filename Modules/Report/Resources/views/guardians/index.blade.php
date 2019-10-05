@extends('master')

@section('title', get_school_info('site_title').' | Guardian')
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
                        <h4 class="card-title">Guardian Report</h4>
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

                                    <th data-priority="2">Guardian's Name</th>
                                    <th data-priority="3">Student's Name</th>


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
                                    <th data-priority="2">Guardian's Name</th>
                                    <th data-priority="3">Student's Name</th>


                                    @can('student-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('student-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($guardians as $guardian)

                                        <tr href="{{url('/report/guardian/profile/'.$guardian->guardians->id)}}">
                                            <td>{{$i}}</td>
                                            <?php  $i++;
                                            ?>

                                            <td>{{ucfirst($guardian->guardians->guardian_first_name)}} {{ucfirst($guardian->guardians->guardian_middle_name)}} {{ucfirst($guardian->guardians->guardian_last_name)}}</td>
                                             <td>{{ucfirst($guardian->first_name)}} {{ucfirst($guardian->middle_name)}} {{ucfirst($guardian->last_name)}}</td>

                                            <td class="text-right">
                                                @can('student-list')
                                                    <a href="{{url('report/guardian/profile/'.$guardian->id)}}" class="btn btn-link btn-info btn-just-icon like"><i
                                                                title="View"  class="material-icons">dvr</i></a>
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
        $(document).ready(function(){
            $('table tr td:not(:last-child)').click(function(){
                window.location = $(this).parent().attr('href');
                return false;
            });

        });
    </script>
@stop
