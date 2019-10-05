@extends('master')

@section('title', get_school_info('site_title').' | Subject')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Subject Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('subject-create')
                            <a href="{{url('/subject/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add subject
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
                                    <th>Subject Code</th>
                                    <th>Class</th>
                                    <th>Subject Name</th>
                                    <th>Subject Type</th>
                                    <th>Credit Hour</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->subject_code}}</td>
                                    <td>{{$subject->classrooms->class_name}}</td>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>{{ucfirst($subject->subject_type)}}</td>
                                    <td>{{$subject->credit_hour}}</td>
                                    <td>{{$subject->full_mark}}</td>
                                    <td>{{$subject->pass_mark}}</td>
                                    <td class="text-right">
                                        @can('subject-edit')
                                            <a href="{{route('subject.edit',$subject->id)}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                        @endcan
                                        @can('subject-delete')
                                            <a href="#" onclick="
                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$subject->id}}').submit();
                                                    }
                                                    else{
                                                    event.preventDefault();
                                                    }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                            </a>
                                            <form method="post" action="{{route('subject.destroy',$subject->id)}} " id="delete-form-{{$subject->id}}">
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

