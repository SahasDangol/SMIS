@extends('master')

@section('title', get_school_info('site_title').' | Section Detail')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('classroom-create')
            {{---------Start of Add Detail--------}}
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/sections/')}}" method="post"
                          enctype="multipart/form-data">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Section Setting</h4>
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
                                            <option disabled selected>Select Classroom</option>
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
                                            <input class="form-control" value="{{ old('name') }}"
                                                   type="text" maxlength="100" name="name"
                                                   required="true"/>
                                        </div>
                                    </div>
                                <br>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                           <label class="bmd-label-floating">Capacity</label>
                                            <input class="form-control" value="{{ old('capacity') }}"
                                                    type="number" name="capacity"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-7 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Add Section
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            {{------------End of Add Detail-------------}}

            {{--------------Start Of Show Detail----------------}}
                <div class="col-md-8">
                    @endcan
                    @cannot('classroom-create')
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
                                            @foreach($sections as $section)
                                                <tr>
                                                    <td>{{ucfirst($section->classrooms->class_name)}}
                                                    </td>
                                                    <td>{{ucfirst($section->name)}}</td>
                                                    <td>
                                                        @if($section->class_teachers)
                                                        {{ucfirst($section->class_teachers->first_name)." ".ucfirst($section->class_teachers->middle_name)." ".ucfirst($section->class_teachers->last_name)}}</td>
                                                        @else
                                                            Not Assigned
                                                        @endif
                                                    <td>
                                                        @if($section->remarks!="")
                                                            {{ucfirst($section->remarks)}}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="text-right">

                                                        @can('section-edit')
                                                            <a href="{{url('/sections/'.$section->id.'/edit')}}"
                                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                    title="Edit"    class="material-icons">dvr</i></a>
                                                        @endcan
                                                        @can('section-delete')

                                                            <a href="#" onclick="
                                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{$section->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"
                                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                 title="Delete"       class="material-icons">close</i>
                                                            </a>
                                                            <form method="post"
                                                                  action="{{route('sections.destroy',$section->id)}} "
                                                                  id="delete-form-{{$section->id}}">
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
            {{-------------------End Of Show Detail-----------------}}
                <!-- end row -->
        </div>
        @include('includes.advancedOption')
    </div>
@stop

