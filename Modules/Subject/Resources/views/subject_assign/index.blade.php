@extends('master')

@section('title', get_school_info('site_title').' | Assign Subject')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Optional Subject Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('subject-assign-create')
                            <a href="{{url('/subject_assign/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Assign subject
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th><b>Roll No.</b></th>
                                    {{--<th>Class</th>--}}
                                    {{--<th>Section</th>--}}
                                    <th><b>Name</b></th>
                                    <th><b>Optional Subject 1</b></th>
                                    <th><b>Optional Subject 2</b></th>


                                    {{--<th class="disabled-sorting text-right">Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($optionals as $optional)

                                    <tr>
                                        <td>
                                            @foreach($students as $student)
                                                @if($optional->student_id==$student->id)
                                                    {{$student->roll_no}}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach($students as $student)
                                                @if($optional->student_id==$student->id)
                                                    {{ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name)}}
                                                @endif
                                            @endforeach
                                        </td>

                                        @foreach($subjects as $subject)
                                            @if($optional->optional_subject1_id==$subject->id)
                                                <td>{{$subject->subject_name}}</td>
                                            @endif
                                            @if($optional->optional_subject2_id==$subject->id)
                                                <td>{{$subject->subject_name}}</td>
                                            @endif
                                        @endforeach

                                        {{--<td class="text-right">
                                            @can('subject-assign-edit')
                                                <a href="{{route('subject_assign.edit',$optional->id)}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                            @endcan
                                            @can('subject-assign-delete')
                                                <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$optional->id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                </a>
                                                <form method="post" action="{{route('subject_assign.destroy',$optional->id)}} " id="delete-form-{{$optional->id}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                </form>
                                            @endcan
                                        </td>--}}
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

