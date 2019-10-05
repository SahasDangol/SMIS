@extends('master')

@section('title', get_school_info('site_title').' | Edit Classroom')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('classroom-edit')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process"
                          action="{{URL::to('/classrooms/'.$classroom->id)}}"
                          method="post">
                        @method('PUT')
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Update Classroom</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Classroom Name</label>
                                            <input class="form-control" value="{{ $classroom->class_name}}" type="text"
                                                   maxlength="100" name="class_name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Remarks</label>
                                            <input class="form-control" value="{{ $classroom->remarks }}" type="text"
                                                   maxlength="100" name="remarks"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-md-1"></label>
                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" onclick="myFunction()" name="section_status"
                                                           value="{{$classroom->section_status}}" @if($classroom->section_status != 0)checked @endif >
                                                    Sections
                                                    <span class="toggle"></span>
                                                    <div class="row" id="mydiv">
                                                        <div class="row">
                                                            <label class="col-sm-1 col-form-label"></label>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Capacity</label>
                                                                    <input class="form-control"
                                                                           value="
                                                                           @if($classroom->section_status == 0)
                                                                           {{$no_section->capacity}}
                                                                                   @endif" type="number"
                                                                           maxlength="3" name="capacity"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Update Classroom
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
                                    <h4 class="card-title">Classroom Detail</h4>

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
                                                <th>Classroom Name</th>
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
                                                <th>Classroom Name</th>
                                                <th>Remarks</th>
                                                @can('classroom-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('classroom-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($classrooms as $classroom)
                                                <tr>
                                                    <td>{{$classroom->class_name}}</td>
                                                    @if($classroom->remarks!="")
                                                        <td>{{$classroom->remarks}}</td>
                                                    @else
                                                        <td>N/A</td>
                                                    @endif
                                                    <td class="text-right">
                                                        @can('classroom-edit')
                                                            <a href="{{url('/classrooms/'.$classroom->id.'/edit')}}"
                                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                        class="material-icons">dvr</i></a>
                                                        @endcan
                                                        @can('classroom-delete')
                                                            <a href="#" onclick="
                                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{$classroom->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"
                                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                        class="material-icons">close</i>
                                                            </a>
                                                            <form method="post"
                                                                  action="{{route('classrooms.destroy',$classroom->id)}} "
                                                                  id="delete-form-{{$classroom->id}}">
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

@section('script')
    <script>

        $('#mydiv').hide();

        function myFunction() {
            var x = document.getElementById("mydiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

    </script>

    @stop