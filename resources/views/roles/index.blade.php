@extends('master')

@section('title', get_school_info('site_title').' | Roles Detail')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Roles Detail</h4>
                        @can('role-create')
                        <a href="{{url('/roles/create')}}">
                            <button class="btn btn-primary btn-round float-right mr-1">
                                <i class="material-icons">add</i> Add Roles
                            </button>
                        </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Roles Name</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Roles Name</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->name}}</td>
                                            <td class="text-right">
                                                <a href="{{url('/roles/'.$role->id)}}" title="View" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">favorite</i></a>
                                                <a href="{{url('/roles/'.$role->id.'/edit')}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$role->id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                </a>
                                                <form method="post" action="{{route('roles.destroy',$role->id)}} " id="delete-form-{{$role->id}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                </form>
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

