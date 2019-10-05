@extends('master')

@section('title', get_school_info('site_title').' | Syllabus')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">DataTables.net</h4>
                        @can('syllabus-create')
                            <a href="{{url('/syllabus/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Syllabus
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Class</th>

                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Class</th>

                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($syllabus as $aa)

                                        <tr>
                                            <td>{{$aa->id}}</td>
                                            <td>{{$aa->title}}</td>
                                            <td>
                                                @foreach($classrooms as $classroom)
                                                @if($aa->classroom_id==$classroom->id)
                                                {{$classroom->class_name}}
                                            @endif
                                            @endforeach</td>
                                            <td class="text-right">
                                                @can('syllabus-show')
                                                    <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                                @endcan
                                                @can('syllabus-edit')
                                                    <a href="{{url('syllabus/'.$aa->id.'/edit')}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('syllabus-delete')
                                                    <a href="#" onclick="
                                                            on(); if(confirm('Are You sure, You Want To Delete?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$aa->id}}').submit();
                                                            }
                                                            else{
                                                            event.preventDefault();
                                                            }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                    </a>
                                                    <form method="post" action="{{route('syllabus.destroy',$aa->id)}} " id="delete-form-{{$aa->id}}">
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
@stop



