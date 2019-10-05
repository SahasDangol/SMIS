@extends('master')

@section('title', get_school_info('site_title').' | User List')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('user-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/users')}}"
                          method="post">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New User</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">User Name</label>
                                            <input class="form-control" value="{{ old('name') }}" type="text"
                                                   maxlength="15" name="name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">User Email</label>
                                            <input class="form-control" value="{{ old('email') }}" type="email"
                                                   name="email" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input class="form-control" type="password"
                                                   name="password" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Confirm Password</label>
                                            <input class="form-control"
                                                   type="password"
                                                   name="confirm-password" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Select Role</label>
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'select2','multiple', 'data-style' => 'select-with-transition')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Remarks</label>
                                            <input class="form-control" value="{{ old('remarks') }}" type="text"
                                                   name="remarks"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Add New User
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
            @endcan
            @cannot('user-create')
                <div class="col-md-12">
            @endcannot
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Users List</h4>
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
                                    <th>Users Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Remarks</th>
                                    @can('user-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('user-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Users Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Remarks</th>
                                    @can('user-edit')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @elsecan('user-delete')
                                        <th class="disabled-sorting text-right">Actions</th>
                                    @endcan
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($data as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        @if($user->remarks!="")
                                            <td>{{$user->remarks}}</td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        <td class="text-right">
                                            @can('user-edit')
                                                <a href="{{ route('users.edit',$user->id) }}"
                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                            title="Edit" class="material-icons">dvr</i></a>
                                            @endcan
                                            @can('user-delete')
                                                <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$user->id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }"
                                                   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                            title="Delete" class="material-icons">close</i>
                                                </a>
                                                <form method="post"
                                                      action="{{route('users.destroy',$user->id)}} "
                                                      id="delete-form-{{$user->id}}">
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
        </div>
    </div>
@stop