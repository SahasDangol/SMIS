@extends('master')

@section('title', get_school_info('site_title').' | Department Detail')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('department-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/departments/')}}"
                          method="post">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Department</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Department Name</label>
                                            <input class="form-control" value="{{ old('name') }}" type="text"
                                                   maxlength="100" name="name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Add New Department
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('class-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Department Detail</h4>
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
                                                <th>Department Name</th>
                                                <th>Remarks</th>
                                                @can('department-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('department-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Department Name</th>
                                                <th>Remarks</th>
                                                @can('department-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('department-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($departments as $department)
                                                <tr>
                                                    <td>{{$department->name}}</td>
                                                    @if($department->remarks!="")
                                                        <td>{{$department->remarks}}</td>
                                                    @else
                                                        <td>N/A</td>
                                                    @endif
                                                    <td class="text-right">
                                                        @can('department-edit')
                                                            <a href="{{url('/departments/'.$department->id.'/edit')}}"
                                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                      title="Edit"  class="material-icons">dvr</i></a>
                                                        @endcan
                                                        @can('department-delete')
                                                            <a href="#" onclick="
                                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{$department->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"
                                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                   title="Delete"     class="material-icons">close</i>
                                                            </a>
                                                            <form method="post"
                                                                  action="{{route('departments.destroy',$department->id)}} "
                                                                  id="delete-form-{{$department->id}}">
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

