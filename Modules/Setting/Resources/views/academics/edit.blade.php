@extends('master')

@section('title', get_school_info('site_title').' | Academics Year Update')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            {{--@can('route-edit')--}}
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/academics_year/'.$detail->id)}}" method="post">
                        @method('PUT')
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Edit Session</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Session Year in B.S. *</label>
                                            <input class="form-control" value="{{$detail->year }}" type="text"
                                                   maxlength="100" name="year" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Session Name *</label>
                                            <input class="form-control" value="{{ $detail->session}}" type="text"
                                                   maxlength="100" name="session" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Remarks</label>
                                            <input class="form-control" value="{{$detail->remarks }}" type="text"
                                                   maxlength="100" name="remarks"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                       Update Session
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Academics Year Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Session Name</th>
                                    <th>Session Year</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all as $single)
                                    <tr>
                                        <td>{{$single->session}}</td>
                                        <td>{{$single->year}}</td>
                                        @if($single->remarks!="")
                                            <td>{{$single->remarks}}</td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        <td class="text-right">
                                            {{--@can('route-edit')--}}
                                            <a href="{{url('/academics_year/'.$detail->id)}}"
                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                        class="material-icons">dvr</i></a>
                                            {{--@endcan--}}
                                            {{--@can('route-delete')--}}
                                            <a href="#" onclick="
                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$single->id}}').submit();
                                                    }
                                                    else{
                                                    event.preventDefault();
                                                    }"
                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                        class="material-icons">close</i>
                                            </a>
                                            <form method="post"
                                                  action="{{route('academics_year.destroy',$single->id)}} "
                                                  id="delete-form-{{$single->id}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                            </form>
                                            {{--@endcan--}}
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
                <!-- end row -->
                @include('includes.advancedOption')
        </div>
@stop

