@extends('master')
@section('title', get_school_info('site_title').' | Staff Attendance')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Staff Attendance For {{\Carbon\Carbon::today()->toFormattedDateString()}}</h4>
                    </div>
                    <div class="card-body">
                       <div class="float-right pt-2 mb-3 mr-4" style="box-shadow: 5px 5px 10px #aaa">{{$staffs->links()}}</div>
                        <table class="table table-responsive-md table-bordered">
                            <thead>
                                <th>S.No.</th>
                                <th class="text-center">Name</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Leave</th>
{{--                                <th>Remarks</th>--}}
                            </thead>
                            @php($counter=1)
                            @foreach($staffs as $staff)

                            <tr>
                                <td>{{$counter++}}</td>
                                <td class="text-center">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}
                                    <a tabindex="0" class="float-right badge badge-primary popup-ajax" role="button"
                                       rel="popover" data-img="{{url('/').Storage::url($staff->personal_photo)}}">
                                        <i class="fa fa-play" aria-hidden="true"></i> Photo
                                    </a>
                                </td>
                                <td><a id="present-{{$staff->id}}" class=" btn btn-sm btn-round
                                {{$attendance->where('staff_id',$staff->id)->where('attendance',1)->first()? "btn-success" : "btn-outline-success"}}" onclick="storeTAttendance(1,{{$staff->id}})">Present</a></td>
                                <td><a id="absent-{{$staff->id}}" class="btn btn-sm btn-round
                                {{$attendance->where('staff_id',$staff->id)->where('attendance',2)->first()? "btn-danger" : "btn-outline-danger"}}" onclick="storeTAttendance(2,{{$staff->id}})">Absent</a></td>
                                <td><a id="leave-{{$staff->id}}" class="btn btn-sm btn-round
                               {{$attendance->where('staff_id',$staff->id)->where('attendance',3)->first()? "btn-info" : "btn-outline-info"}}" onclick="storeTAttendance(3,{{$staff->id}})">Leave</a></td>
{{--                                <td><input type="text" class="form-control" placeholder="remarks"></td>--}}
                            </tr>
                            @endforeach
                        </table>
                        <div class="float-right pt-2">{{$staffs->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('a[rel=popover]').popover({
                html: true,
                trigger: 'hover',
                placement: 'right',
                content: function(){return '<img class="img-thumbnail" src="'+$(this).data('img') + '" />';}
            });
        });
        function storeTAttendance(status, id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{url('staff/attendance/store')}}',
                method: "POST",
                data: {"status": status, "id": id},
                success: function (data) {
                    const present = $('#present-' + id);
                    const absent = $('#absent-' + id);
                    const leave = $('#leave-' + id);

                    if(status === 1){
                        absent.removeClass('btn-danger').addClass('btn-outline-danger');
                        leave.removeClass('btn-warning').addClass('btn-outline-info');
                        present.removeClass('btn-outline-success').addClass('btn-success');
                    }

                    if(status === 2){
                        present.removeClass('btn-success').addClass('btn-outline-success');
                        leave.removeClass('btn-warning').addClass('btn-outline-info');
                        absent.removeClass('btn-outline-danger').addClass('btn-danger');
                    }

                    if(status === 3){
                        present.removeClass('btn-success').addClass('btn-outline-success');
                        absent.removeClass('btn-danger').addClass('btn-outline-danger');
                        leave.removeClass('btn-outline-info').addClass('btn-info');
                    }
                },
                error: function(data){
                    console.log(data)
                }
            })
        }


    </script>
    @endsection
