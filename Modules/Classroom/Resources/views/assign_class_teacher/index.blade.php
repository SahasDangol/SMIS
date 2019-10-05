@extends('master')
@section('title', get_school_info('site_title').' | Classroom Detail')
@section('head')
    <style>
        #div1 {
            width: 100%;
            height: 70px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }
    </style>
@stop
@section('Body')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card ">
                    <div class="card-header card-header-success card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Teachers List</h4>
                        </div>
                    </div>
                    <div class="card-body " ondrop="drop(event)"
                         ondragover="allowDrop(event)">
                        <br>
                        @foreach($teachers as $teacher)
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input id="{{$teacher->id}}" class="form-control class_teacher"
                                               value="{{$teacher->first_name}} {{$teacher->middle_name}} {{$teacher->last_name}}  #{{$teacher->staff_id}}"
                                               type="text" name="vehicle_name"
                                               required="true" draggable="true" ondragstart="drag(event)" readonly/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form id="TypeValidation" class="form-horizontal process"
                              action="{{route('section.storeClassTeacher')}}" method="post">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0"
                                   width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Teacher Name</th>
                                </tr>
                                </thead>
                                <tbody id="teacher">
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{$section->classrooms->class_name}}</td>
                                        <td>{{$section->name}}</td>
                                        <td>
                                            <div class="row">
                                                <label class="col-sm-1 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <div class="form-group" id="div1" ondrop="drop(event)"
                                                         ondragover="allowDrop(event)">

                                                        @if($section->class_teacher_id!="")
                                                            <input id="{{$section->class_teachers->id}}" class="form-control class_teacher"
                                                                   value="{{$section->class_teachers->first_name}} {{$section->class_teachers->middle_name}} {{$section->class_teachers->last_name}}  #{{$section->class_teachers->staff_id}}"
                                                                   type="text" name="vehicle_name"
                                                                   required="true" draggable="true" ondragstart="drag(event)" readonly/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                <div class="form-group">
                                    <button
                                            class="btn btn-primary btn-block btn-round" onclick="swap()">Save Information
                                    </button>
                                </div>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }

        function swap() {
            var i = 1;
            var sub = "sec";


            jQuery("#teacher > tr").each(function () {
                var id = sub + i;
                var name = "select_" + i;

                $(this).closest("tr").find(".class_teacher").removeAttr('id');
                $(this).closest("tr").find(".class_teacher").attr('id', id);
                $(this).closest("tr").find(".class_teacher").attr('name', name);
                i++;
            });
            // event.preventDefault();
        }
    </script>
@stop