@extends('master')

@section('title', get_school_info('site_title').' | Grade List')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('grade-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/exams/grade/')}}"
                          method="post">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Grade</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <div class="container">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Grade Name</label>
                                            <input class="form-control" value="{{ old('name') }}" type="text"
                                                   maxlength="15" name="name" required="true"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Percentage From</label>
                                            <input class="form-control" value="{{ old('from') }}" type="text"
                                                   maxlength="3" name="from" required="true"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Percentage Upto</label>
                                            <input class="form-control" value="{{ old('upto') }}" type="text"
                                                   maxlength="3" name="upto" required="true"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Remarks</label>
                                            <input class="form-control" value="{{ old('remarks') }}" type="text"
                                                   name="remarks"/>
                                        </div>
                                    </div>
                                    <br>
                                    <label class="col-sm-6 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Add New Grade
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('grade-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Grade List</h4>
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
                                                <th>Grade Name</th>
                                                <th>Percentage From</th>
                                                <th>Percentage Upto</th>
                                                <th>Remarks</th>
                                                @can('grade-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('grade-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Grade Name</th>
                                                <th>Percentage From</th>
                                                <th>Percentage Upto</th>
                                                <th>Remarks</th>
                                                @can('grade-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('grade-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($grades as $grade)
                                                <tr>
                                                    <td>{{$grade->name}}</td>
                                                    <td>{{$grade->from}}%</td>
                                                    <td>{{$grade->upto}}%</td>
                                                    @if($grade->remarks!="")
                                                        <td>{{$grade->remarks}}</td>
                                                    @else
                                                        <td>N/A</td>
                                                    @endif
                                                    <td class="text-right">
                                                        @can('grade-edit')
                                                            <a href="{{url('/exams/grade/'.$grade->id.'/edit')}}"
                                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                   title="Edit"     class="material-icons">dvr</i></a>
                                                        @endcan
                                                        @can('grade-delete')
                                                            <a href="#" onclick="
                                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{$grade->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"
                                                        title="Delete"       class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                        class="material-icons">close</i>
                                                            </a>
                                                            <form method="post"
                                                                  action="{{route('grade.destroy',$grade->id)}} "
                                                                  id="delete-form-{{$grade->id}}">
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
        @include('includes.advancedOption')
    </div>
@stop

