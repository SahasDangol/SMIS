@extends('master')

@section('title', get_school_info('site_title').' | Routine')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Routine Lists</h4>
                        @can('routine-create')
                            <a href="{{url('/routines/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Routine
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

                                    <th>Routine ID</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>

                                    <th>Routine ID</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($routine as $aa)

                                        <tr>
                                            {{--<td><img src="{{url('/').Srorage::url($aa->)}}" alt=""></td>--}}
                                            <td>{{$aa->id}}</td>
                                            <td>@foreach($classrooms as $classroom)
                                                @if($aa->classroom_id==$classroom->id)

                                            {{$classroom->class_name}}
                                            @endif
                                            @endforeach</td>
                                            <td>
                                                @foreach($sections as $section)
                                                    @if($section->id==$aa->section_id)
                                                {{$section->name}}
                                            @endif
                                                    @endforeach
                                            </td>
                                            <td class="text-right">
                                                @can('routine-show')
                                                    <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                                @endcan
                                                @can('routine-edit')
                                                    <a href="{{url('routines/'.$aa->id.'/edit')}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('routine-delete')
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
                                                    <form method="post" action="{{route('routines.destroy',$aa->id)}} " id="delete-form-{{$aa->id}}">
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



