@extends('master')
@section('title', get_school_info('site_title').' | Student Section Status')

@section('head')
    <style>
        div.ex1 {
            /*background-color: lightblue;*/
            width: 100%;
            height: 30rem;
            overflow: scroll;
        }

        .div1 {
            width: 100%;
            height: 7rem;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }

        .div2 {
            width: 100%;
            height: 2rem;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }
    </style>
@endsection

@section('Body')
    <div class="container-fluid">
        @if($status == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Student Section Status</h4>
                        </div>
                        <br>
                        <br>
                        <div class="card-body">
                            <form id="search_form" class="params-panel validate process"
                                  action="{{ url('students/swap_sections') }}"
                                  method="post" autocomplete="off" accept-charset="utf-8">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <select id="classroom" name="class_id" class="select2"
                                                data-style="select-with-transition"
                                                title="Choose Class" data-size="7">

                                            <option selected disabled> Select Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->class_name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit"
                                                class="btn btn-primary btn-round float-right mr-1 attendance">
                                            Search
                                        </button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        @else

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Student Section Status</h4>
                </div>
                <div class="card-body">
                <br>
                <br>
                    <form id="search_form" class="params-panel validate process"
                          action="{{ url('students/swap_sections') }}"
                          method="post" autocomplete="off" accept-charset="utf-8">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <select id="classroom" name="class_id" class="select2"
                                        data-style="select-with-transition"
                                        title="Choose Class" data-size="7">

                                    <option selected disabled> Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}"
                                                @if ($class->id==$class_id)
                                                selected
                                                @endif
                                        >{{$class->class_name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                        class="btn btn-primary btn-round float-right mr-1 attendance">
                                    Search
                                </button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
                <!-- end content-->
                </div>
                <!--  end card  -->
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" id="all">
                            <form class="params-panel validate process row"
                                  action="{{route('student.section_swap_store') }}" method="post">
                                <input type="hidden" name="class_id" value="{{$class_id}}">
                                @php
                                    $num=0;
                                @endphp
                                @foreach($sections as $section)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-title">
                                                <h6 style="position:sticky;top:0;">Section : {{$section->name}}</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive ex1">
                                                    <table class="table table-responsive-sm border table-striped table-bordered">
                                                        <thead class=" text-primary">
                                                        <th>Roll No.</th>
                                                        <th>Student Name</th>
                                                        </thead>
                                                        <tbody id="section{{$num+1}}">
                                                        @php
                                                            $capacity=$section->capacity;
                                                            $counter=1;
                                                        @endphp
                                                        @foreach(get_student_by_section($section->id) as $student)
                                                            <tr>
                                                                <td>{{$counter}}</td>
                                                                <td>
                                                                    <div class="form-group div1" id="div1">
                                                                        <input id="{{$student->id}}"
                                                                               class="form-control class_teacher"
                                                                               value="{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}  #{{$student->id}}"
                                                                               type="text" name="section{{$num+1}}[]"
                                                                               required="true" draggable="true"
                                                                               ondragstart="drag(event)" readonly/>
                                                                        <hr>
                                                                        <div class="form-group div2"
                                                                             ondrop="drop(event)"
                                                                             ondragover="allowDrop(event)">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $capacity--;
                                                                $counter++;
                                                            @endphp
                                                        @endforeach
                                                        @for($i=1;$i<=$capacity;$i++)
                                                            <tr>
                                                                <td>{{$counter}}</td>
                                                                <td>
                                                                    <div class="form-group div1" id="div1">
                                                                        <hr>
                                                                        <div class="form-group div2"
                                                                             ondrop="drop(event)"
                                                                             ondragover="allowDrop(event)">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $counter++;
                                                            @endphp
                                                        @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $num++;
                                    @endphp
                                @endforeach
                                <div class="col-lg-2 col-md-2 col-sm-2 offset-10">
                                    <div class="form-group">
                                        <button class="form-control btn btn-sm btn-primary btn-round"
                                                onclick="click_all({{$num}})">
                                            Save
                                        </button>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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

        function click_all(num)
        {
            var i;
            for (i = 1; i < num+1; i++) {
                var jid = "#section"+i + " > tr";
                jQuery(jid).each(function () {
                    // console.log("hello");
                    var name = "section"+i +"[]";

                    // console.log(name);

                    $(this).closest("tr").find(".class_teacher").removeAttr('name');
                    $(this).closest("tr").find(".class_teacher").attr('name', name);
                });
            }
        }
    </script>
@stop

