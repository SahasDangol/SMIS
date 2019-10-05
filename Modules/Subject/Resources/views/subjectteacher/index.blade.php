@extends('master')

@section('title', get_school_info('site_title').' | Subject Teacher Lists')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Subject Teacher's Lists</h4>
                        <button class="btn btn-primary btn-sm btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('subject-create')
                            <a href="{{url('/subject_teacher/create')}}">
                                <button class="btn btn-sm btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Assign Subject Teacher
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th><b><b>Class</b></b></th>
                                    <th><b><b>Section</b></b></th>
                                    <th><b><b>Subject</b></b></th>
                                    <th><b><b>Subject Teacher</b></b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjectteachers as $subject)

                                    <tr>
                                        <td>
                                            @foreach($classrooms as $class)
                                                @if($class->id==$subject->classroom_id)
                                                    {{$class->class_name}}
                                                @endif
                                            @endforeach
                                            </td>
                                        <td> @foreach($sections as $section)
                                                @if($section->id==$subject->section_id)
                                                    {{$section->name}}
                                                @endif
                                            @endforeach</td>
                                        <td> @foreach($subjects as $sub)
                                                @if($sub->id==$subject->subject_id)
                                                    {{$sub->subject_name}}
                                                @endif
                                            @endforeach</td>
                                        <td> @foreach($teachers as $teacher)
                                                @if($teacher->id==$subject->teacher_id)
                                                    {{ucfirst($teacher->first_name).' '.ucfirst($teacher->middle_name).' '.ucfirst($teacher->last_name)}}
                                                @endif
                                            @endforeach</td>
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

