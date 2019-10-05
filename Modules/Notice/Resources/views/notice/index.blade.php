@extends('master')

@section('title', get_school_info('site_title').' | Notice')
@section('Body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Notice Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('notice-create')
                            <a href="{{url('/notice/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Notice
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Notice ID</th>
                                    <th>Title</th>

                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Notice ID</th>
                                    <th>Title</th>

                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($notice as $aa)
                                        <tr>
                                            <td>{{$aa->id}}</td>
                                            <td>{{$aa->title}}</td>

                                            <td class="text-right">
                                                @can('notice-show')
                                                    <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                                @endcan
                                                @can('notice-edit')
                                                    <a href="{{url('/notice/'.$aa->id.'/edit')}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('notice-delete')
                                                    <a href="#" onclick="
                                                            on(); if(confirm('Are You sure, You Want To Delete?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$aa->id}}').submit();
                                                            }
                                                            else{
                                                            event.preventDefault();
                                                            }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                    </a>
                                                    <form method="post" action="{{route('notice.destroy',$aa->id)}} " id="delete-form-{{$aa->id}}">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                    </form>
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



