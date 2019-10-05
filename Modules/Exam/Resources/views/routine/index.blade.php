@extends('master')

@section('title', get_school_info('site_title').' | Routine List')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('exam-routine-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/exams/routine')}}"
                          method="post" enctype="multipart/form-data">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Exam Routine</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Exam Name</label>
                                            <select class="select2" data-size="7" name="exam_id"
                                                    data-style="select-with-transition" title="Select Exam"
                                                    required="true">
                                                <option disabled selected>Select Exam</option>
@if($exams!=null)
                                                    <option value="{{$exams->id}}">{{$exams->name}}</option>

    @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-md-10 col-sm-10">
                                        <h5 class="title">Routine Photo</h5>
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail">
                                                <img src="{{url('assets/backend/img/image_placeholder.jpg')}}" alt="..."
                                                     style="width: 100px">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                          <span class="btn btn-primary btn-round btn-file">
                                            <span class="fileinput-new">Select Routine</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="file"/>
                                          </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>

                                            </div>
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
                                        Add New Examination
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('exam-routine-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Exam Routine List</h4>
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
                                                <th>Examination Name</th>
                                                <th>Remarks</th>
                                                @can('exam-routine-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('exam-routine-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Examination Name</th>
                                                <th>Remarks</th>
                                                @can('exam-routine-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('exam-routine-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @if(!empty($routines) )

                                                @foreach($routines as $routine)
                                                    <tr>
                                                        <td>{{$routine->exam_list->name}}</td>
                                                        @if( !empty($routine->remarks) )
                                                        <td>{{$routine->remarks}}</td>
                                                        @else
                                                            <td>N/A</td>
                                                        @endif
                                                        <td class="text-right">
                                                            @can('exam-routine-edit')
                                                                <a href="{{url('exams/routine/'.$routine->id.'/edit')}}"
                                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                       title="Edit"     class="material-icons">dvr</i></a>
                                                            @endcan
                                                            @can('exam-routine-delete')
                                                                <a href="#" onclick="
                                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                        {
                                                                        event.preventDefault();
                                                                        document.getElementById('delete-form-{{$routine->id}}').submit();
                                                                        }
                                                                        else{
                                                                        event.preventDefault();
                                                                        }"
                                                                title="Delete"   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                            class="material-icons">close</i>
                                                                </a>
                                                                <form method="post"
                                                                      action="{{route('routine.destroy',$routine->id)}} "
                                                                      id="delete-form-{{$routine->id}}">
                                                                    @csrf
                                                                    {{method_field('DELETE')}}
                                                                </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                    @endif

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


