@extends('account')

@section('title', get_school_info('site_title').' | Group')
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
                        <h4 class="card-title">Group Information</h4>
                       </div>
                    {{--<div class="toolbar">--}}

                    {{--</div>--}}
                    <div class="card-body">

                        <div class="material-datatables">
                            <table id="datatables"
                                   class="table table-striped table-bordered table-hover ui-responsive"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th data-priority="1">S.No.</th>
                                    <th data-priority="2">Name</th>
                                    <th data-priority="3">Parent</th>




                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th data-priority="1">S.No.</th>
                                    <th data-priority="2">Name</th>
                                    <th data-priority="3">Parent</th>


                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($groups as $group)

                                        <tr>
                                            <td>{{$group->id}}</td>
                                           <td>{{$group->name}}</td>
                                            <td>
                                                @if($group->parent_id==$group->id)
                                                    N/A
                                                @else
                                                @foreach($groups as $g)
                                                    @if($g->id==$group->parent_id)
                                                        {{ ucfirst($g->name)}}

                                                    @endif
                                                @endforeach
                                                    @endif
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
