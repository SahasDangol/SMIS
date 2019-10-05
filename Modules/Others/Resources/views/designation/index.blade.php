@extends('master')

@section('title', get_school_info('site_title').' | Designation Detail')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('designation-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/designations/')}}"
                          method="post">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Designation</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Designation Name</label>
                                            <input class="form-control" value="{{ old('name') }}" type="text"
                                                   maxlength="100" name="name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Add New Designation
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('designation-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Designation Detail</h4>
                                    <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                            data-target="#noticeModal">
                                        <i class="material-icons">games</i>Advance Options
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Designation Name</th>
                                                @can('designation-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('designation-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Designation Name</th>
                                                @can('designation-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('designation-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($designations as $designation)
                                                <tr>
                                                    <td>{{$designation->name}}</td>
                                                    <td class="text-right">
                                                        @can('designation-edit')
                                                            <a href="{{url('/designations/'.$designation->id.'/edit')}}"
                                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                        title="Edit" class="material-icons">dvr</i></a>
                                                        @endcan
                                                        @can('designation-delete')
                                                            <a href="#" onclick="
                                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{$designation->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"
                                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                     title="Delete"   class="material-icons">close</i>
                                                            </a>
                                                            <form method="post"
                                                                  action="{{route('designations.destroy',$designation->id)}} "
                                                                  id="delete-form-{{$designation->id}}">
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

