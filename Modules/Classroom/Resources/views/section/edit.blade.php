@extends('master')

@section('title', get_school_info('site_title').' | Section Update')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('classroom-edit')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process"
                          action="{{URL::to('/sections/'.$section->section_id)}}" method="post">
                        @method('PUT')
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Update Section</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <select class="select2" data-size="7" name="classroom_id"
                                                data-style="select-with-transition" title="{{old('classroom_id')}}"
                                                required="true">
                                            <option selected
                                                    value="{{$section->classroom_id}}">{{$section->class_name}}</option>
                                            @foreach($classrooms as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Section Name</label>
                                            <input class="form-control" value="{{$section->name}}"
                                                    type="text" maxlength="100" name="name"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Capacity</label>
                                            <input class="form-control" value="{{$section->capacity }}"
                                                   type="number" name="capacity"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-7 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Update Section
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('classroom-edit')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Section Detail</h4>
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
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Class Teacher</th>
                                                <th>Remarks</th>

                                                @can('classroom-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('classroom-delete')

                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Section Name</th>
                                                <th>Class Teacher</th>
                                                <th>Remarks</th>

                                                @can('classroom-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('classroom-delete')

                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($sections as $aa)

                                                    <tr>
                                                        <td>{{$aa->class_name}}</td>
                                                        <td>{{$aa->name}}</td>
                                                        <td>{{ucfirst($aa->first_name)." ".ucfirst($aa->middle_name)." ".ucfirst($aa->last_name)}}</td>
                                                        @if($aa->remarks!="")
                                                            <td>{{$aa->remarks}}</td>
                                                        @else
                                                            <td>N/A</td>
                                                        @endif
                                                        <td class="text-right">
                                                            @can('classroom-edit')
                                                                <a href="{{url('/sections/'.$aa->id.'/edit')}}"
                                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                            class="material-icons">dvr</i></a>
                                                            @endcan
                                                            @can('classroom-delete')
                                                                <a href="#" onclick="
                                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                        {
                                                                        event.preventDefault();
                                                                        document.getElementById('delete-form-{{$aa->id}}').submit();
                                                                        }
                                                                        else{
                                                                        event.preventDefault();
                                                                        }"
                                                                   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                            class="material-icons">close</i>
                                                                </a>
                                                                <form method="post"
                                                                      action="{{route('sections.destroy',$aa->id)}} "
                                                                      id="delete-form-{{$aa->id}}">
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

