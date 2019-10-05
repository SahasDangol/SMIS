@extends('master')

@section('title', get_school_info('site_title').' | Add Marks')
@section('Body')
  <div class="row">
      <div class="col-md-12">
          <div class="card card-default" data-collapsed="0">
              <div class="card-heading">
                  <span class="card-title">
                      <h3 class="text-center">	Mark Register
                      </h3>
                  </span>
              </div>
              <div class="card-body">
                  <form id="search_form" class="process params-card validate" action="{{ url('marksheet/create') }}"
                        method="post" autocomplete="off" accept-charset="utf-8">
                      <div class="col-md-12 row justify-content-center">
                          <div class="col-sm-5">
                              <select id="classroom" name="classroom_id" class="select2"
                                      data-style="select-with-transition"
                                      title="Choose Class" data-size="7" required="true">
                                  <option selected disabled> Select Class</option>
                                  @foreach($classrooms as $classroom)
                                      <option value="{{$classroom->id}}"
                                              @if($classroom->id==$classroom_id)
                                              @php($class_name = $classroom->class_name)
                                              selected @endif>{{$classroom->class_name}}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-sm-5">
                              <select id="section" name="section_id" class="select2"
                                      title="Choose Section" data-style="select-with-transition"
                                      data-size="7" required="true">
                                  <option selected disabled> Select Section</option>
                                  @if( !empty($section_id) )
                                      @foreach($sections as $section)
                                          <option value="{{$section->id}}"
                                                  @if($section->id==$section_id)
                                                  @php($section_name = $section->name)
                                                  selected @endif>{{$section->name}}
                                          </option>
                                      @endforeach
                                  @endif
                              </select>
                          </div>
                      </div>
                      <br>
                      <div class="col-md-12 row justify-content-center">
                          <div class="col-sm-5">
                              <select id="subjects" name="subject_id" class="select2"
                                      title="Choose Subject" data-style="select-with-transition"
                                      data-size="7" required="true">
                                  <option selected disabled> Select Subject</option>
                                  @if( !empty($subject_id) )
                                      @foreach($subjects as $subject)
                                          <option value="{{$subject->id}}"
                                                  @if($subject->id==$subject_id)
                                                  @php($subject_name = $subject->subject_name)
                                                  selected @endif>{{$subject->subject_name}}
                                          </option>
                                      @endforeach
                                  @endif
                              </select>
                          </div>
                          <div class="col-sm-5">
                              <select id="exam" name="exam_id" class="select2"
                                      title="Choose Exam" data-style="select-with-transition"
                                      data-size="7" required="true">
                                  <option selected disabled> Select Exam</option>
                                  @foreach($exams as $exam)
                                      <option value="{{$exam->id}}"
                                              @if($exam->id==$exam_id)
                                              @php($current_exam = $exam)
                                              selected @endif>{{$exam->name}}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-12 row justify-content-center">
                          <div class="col-sm-2 offset-sm-8">
                              <div class="form-group">
                                  <button type="submit" style="margin-top:24px;"
                                          class="btn btn-primary btn-sm btn-block btn-round float-right p-2">Marks
                                  </button>
                              </div>
                          </div>

                      </div>
                      {{csrf_field()}}
                  </form>
                  @if($marks)
                      @php($final_term_contribution = $current_exam->final_term_contribution/100)
                      <div class="col-md-12">

                          <div class="card">
                              <div class="card-header card-header-success card-header-icon">
                                  <div class="card-icon">
                                      <i class="material-icons">assignment</i>
                                  </div>
                                  <h4 class="card-title">Marks Table for {{$current_exam->name}}</h4>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover">

                                          <button type="button" rel="tooltip" class="btn btn-outline-success btn-sm">
                                              Class: {{$class_name}}
                                          </button>
                                          @if(strtolower($section->name) != 'default')
                                              <button type="button" rel="tooltip"
                                                      class="btn btn-outline-success btn-sm">
                                                  Section: {{$section_name}}
                                              </button>
                                          @endif
                                          <button type="button" rel="tooltip" class="btn btn-outline-success btn-sm">
                                              Subject: {{$subject_name}}
                                          </button>
                                          <button type="button" rel="tooltip" class="btn btn-outline-info btn-sm">
                                              Full Marks : {{$subject_info->full_mark*$final_term_contribution}}
                                          </button>
                                          <button type="button" rel="tooltip" class="btn btn-outline-info btn-sm">
                                              Pass Marks : {{$subject_info->pass_mark*$final_term_contribution}}
                                          </button>
                                          <button type="button" rel="tooltip" class="btn btn-outline-warning btn-sm">
                                              Theory : {{$subject_info->th_full_mark*$final_term_contribution}}(F)
                                              / {{$subject_info->th_pass_mark*$final_term_contribution}}(P)
                                          </button>
                                          @if($subject_info->pr_full_mark!=null)
                                              <button type="button" rel="tooltip"
                                                      class="btn btn-outline-danger btn-sm">
                                                  Practical : {{$subject_info->pr_full_mark*$final_term_contribution}}(F)
                                                  / {{$subject_info->pr_pass_mark*$final_term_contribution}}(P)
                                              </button>
                                          @endif
                                          <input id="th_total" type="hidden"
                                                 value="{{$subject_info->th_full_mark*$final_term_contribution}}">
                                          <input id="th_pass" type="hidden"
                                                 value="{{$subject_info->th_pass_mark*$final_term_contribution}}">
                                          <input id="pr_total" type="hidden"
                                                 value="{{$subject_info->pr_full_mark*$final_term_contribution}}">
                                          <input id="pr_pass" type="hidden"
                                                 value="{{$subject_info->pr_pass_mark*$final_term_contribution}}">
                                          @php($counter =0)
                                          <thead>
                                          <tr>
                                              <th><b><b>#</b></b></th>
                                              <th><b><b>Name</b></b></th>
                                              <th><b><b>Roll No</b></b></th>
                                              <th><b><b>Theory</b></b></th>
                                              @if($subject_info->pr_full_mark!=null)
                                                  <th><b><b>Practical</b></b></th>
                                              @endif
                                              <th><b><b>Total Marks</b></b></th>
                                              <th><b><b>Result</b></b></th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          @foreach($marks as $mark)
                                              <tr>
                                                  <td>{{$counter+=1}}</td>
                                                  <td>{{ucfirst($mark->students->first_name) .' '. ucfirst($mark->students->last_name)}}</td>
                                                  <td>{{explode("-",$mark->students->roll_no)[1]}}</td>
                                                  <td>
                                                      <div class="form-group col-sm-7" id="th_marks{{$mark->id}}">
                                                      <span class="form-control-feedback">
                                                          <i class="material-icons">done</i>
                                                      </span>
                                                          <input type="number" class="form-control valid th" max="6"
                                                                 id="th_marks"
                                                                 name="th_marks" placeholder="Theory Marks"
                                                                 value="{{$mark->th_marks}}"
                                                                 onchange="setth_marks(this.value,{{$mark->id}})"
                                                          >
                                                      </div>
                                                  </td>
                                                  @if($subject_info->pr_full_mark!=null)
                                                      <td>
                                                          <div class="form-group col-sm-7" id="pr_marks{{$mark->id}}">
                                                      <span class="form-control-feedback">
                                                          <i class="material-icons">done</i>
                                                      </span>
                                                              <input type="number" class="form-control pr"
                                                                     id="pr_marks"
                                                                     name="pr_marks" placeholder="Practical Marks"
                                                                     value="{{$mark->pr_marks}}"
                                                                     onchange="setpr_marks(this.value,{{$mark->id}})"
                                                                     min="0">
                                                          </div>
                                                      </td>
                                                  @endif
                                                  <td>
                                                      <div class="form-group col-sm-7" id="marks{{$mark->id}}">
                                                      <span class="form-control-feedback">
                                                          <i class="material-icons">done</i>
                                                      </span>
                                                          <input type="number" class="form-control total" id="marks"
                                                                 name="marks" placeholder="Total Marks"
                                                                 value="{{$mark->marks}}"
                                                                 min="0" readonly>
                                                      </div>
                                                  </td>
                                                  <td class="result">
                                                      @if($mark->result=="0")
                                                          <span id="result{{$mark->id}}" class="badge badge-danger">Fail</span>
                                                      @else
                                                          <span id="result{{$mark->id}}" class="badge badge-success">Pass</span>
                                                      @endif
                                                  </td>

                                              </tr>
                                          @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>

                      </div>
                  @else
                      <br>
                      <br>
                      <h6 class="text-center">
                          No Data Found!!</h6>
                  @endif
              </div>
          </div>
      </div>
  </div>
@stop

@section('script')
  <script>
      $(document).on('keyup', '.th, .pr', function () {
          var th_total = document.getElementById('th_total').value;
          var th = parseFloat($(this).closest("tr").find(".th").val());

          $(this).closest("tr").find(".total").val(th);

          var pr_total = document.getElementById('pr_total').value;
          var pr = parseFloat($(this).closest("tr").find(".pr").val());

          if (pr) {
              $(this).closest("tr").find(".total").val(th + pr);
          } else {
              $(this).closest("tr").find(".total").val(th);

          }
      });

      $(document).on('keyup', '.th', function () {
          var th_total = $('#th_total').val();
          var th = parseFloat($(this).closest("tr").find(".th").val());

          if (parseFloat(th_total) < parseFloat(th)) {
              alert("You enter a marks greater than a Full Marks");
              event.preventDefault();
          }
      });

      $(document).on('keyup', '.pr', function () {
          var pr_total = $('#pr_total').val();
          var pr = parseFloat($(this).closest("tr").find(".pr").val());
          if (parseFloat(pr_total) < parseFloat(pr)) {
              alert("You enter a marks greater than a Full Marks");
              event.preventDefault();
          }

      });

      function setth_marks(th_marks, id) {
          if (parseFloat($('#th_total').val()) < parseFloat(th_marks)) {
              event.preventDefault();
          } else {
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{url('marksheet')}}",
                  method: "POST",
                  data: {"th_marks": th_marks, "id": id },
                  success: function (data) {
                      $('#th_marks' + id).addClass('has-success');
                      let result = $('#result' + id);
                      if (data.result) {
                          result.removeClass('badge-danger').addClass('badge badge-success').html("Pass");
                      } else {
                          result.removeClass('badge-success').addClass('badge badge-danger').html("Fail");
                      }
                  },
                  error: function (data) {
                      console.log(data.responseText);
                  }
              })
          }
      }

      function setpr_marks(pr_marks, id) {
          if (parseFloat($('#pr_total').val()) < parseFloat(pr_marks)) {
              event.preventDefault();
          } else {
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{url('marksheet')}}",
                  method: "POST",
                  data: {"pr_marks": pr_marks, "id": id},
                  success: function (data) {
                      $('#pr_marks' + id).addClass('has-success');
                      let result = $('#result' + id);
                      if (data.result) {
                          result.removeClass('badge-danger').addClass('badge badge-success').html("Pass");
                      } else {
                          result.removeClass('badge-success').addClass('badge badge-danger').html("Fail");
                      }
                  },
                  error: function (data) {
                      console.log(data.responseText);
                  }
              })
          }
      }


      {{--Subjects--}}

      $(document).ready(function () {

          $('#classroom').change(function () {
              $("#subjects option").remove();


              var ClassroomId = $(this).val();

              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{url('getsubject')}}",
                  method: "POST",
                  data: {"classroom_id": ClassroomId},
                  success: function (data1) {
                      $('#subjects')
                          .append($("<option selected disabled></option>")
                              .attr("value", "")
                              .text(" Choose Subject"));


                      $.each(data1, function (key, value) {
                          $('#subjects')
                              .append($("<option></option>")
                                  .attr("value", value.id)
                                  .text(value.subject_name));
                      });
                  }
              })


              /*****************section ajax start**********************/
              $("#section option").remove();
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{url('getsection')}}",
                  method: "POST",
                  data: {"classroom_id": ClassroomId},
                  success: function (data1) {
                      if (data1.length == 1) {
                          $.each(data1, function (key, value) {
                              $('#section')
                                  .append($("<option selected></option>")
                                      .attr("value", value.id)
                                      .text(value.name));
                          });
                      } else {

                          $('#section')
                              .append($("<option selected disabled></option>")
                                  .attr("value", "")
                                  .text(" Choose Section"));

                          var d = 0;
                          $.each(data1, function (key, value) {
                              $('#section')
                                  .append($("<option></option>")
                                      .attr("value", value.id)
                                      .text(value.name));

                              d = d + 1;
                          });
                          if (d === 1) {
                              $("#section").val(data1[0].id);
                          }

                      }
                  }
              })
          });

      });

  </script>

  {{--attendance for student--}}
@stop
