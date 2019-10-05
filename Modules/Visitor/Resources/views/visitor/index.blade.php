@extends('master')

@section('title', get_school_info('site_title').' | Visitor Detail')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('visitor-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/visitors/')}}" method="post"
                          enctype="multipart/form-data">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Visitor</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Visitor Name</label>
                                            <input class="form-control" value="{{ old('name') }}" type="text"
                                                   maxlength="100" name="name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label">Date</label>
                                            <br>
                                            <input id="date" type="text" value="{{get_nepali_date(date('Y-m-d'))}}" name="date" class="form-control nepali_datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="card ">
                                            <div class="card-body ">
                                                <div class="form-group">
                                                    <label class="bmd-label">Entry Time</label>
                                                    <br>
                                                    <input name="entry_time" type="text"
                                                           class="form-control timepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Purpose of Visiting</label>
                                            <input class="form-control" value="{{ old('purpose') }}" type="text"
                                                   maxlength="100" name="purpose" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Visitor Card No.</label>
                                            <input class="form-control" value="{{ old('visitor_card_no') }}" type="text"
                                                   maxlength="4" name="visitor_card_no"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1" >
                                        Add New Visitor
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('visitor-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Visitors Detail</h4>
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
                                                <th>Visitor Name</th>
                                                <th>Purpose</th>
                                                <th>Date</th>
                                                <th>Entry Time</th>
                                                <th>Leave Time</th>
                                                <th>Visitor Card No.</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Visitor Name</th>
                                                <th>Purpose</th>
                                                <th>Date</th>
                                                <th>Entry Time</th>
                                                <th>Leave Time</th>
                                                <th>Visitor Card No.</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($visitors as $visitor)

                                                    <tr>
                                                        <td>{{ucfirst($visitor->name)}}</td>
                                                        <td>{{ucfirst($visitor->purpose)}}</td>
                                                        <td>{{get_nepali_date($visitor->date)}}</td>
                                                        <td>{{$visitor->entry_time}}</td>

                                                        @if($visitor->leave_time==null)
                                                            <td>Still Inside</td>
                                                            <td>{{$visitor->visitor_card_no}}</td>
                                                            <td class="text-right">
                                                                <a href="#" onclick="on()
                                                                        document.getElementById('delete-form-{{$visitor->id}}').submit();"
                                                                   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                            title="Leave"
                                                                            class="material-icons">check</i>
                                                                </a>
                                                                <form method="post" class="process"
                                                                      action="{{route('visitors.destroy',$visitor->id)}} "
                                                                      id="delete-form-{{$visitor->id}}" >
                                                                    @csrf
                                                                    {{method_field('DELETE')}}
                                                                </form>
                                                            </td>
                                                        @else
                                                            <td>{{$visitor->leave_time}}</td>
                                                            <td>{{$visitor->visitor_card_no}}</td>
                                                            <td>No Action Needed</td>
                                                        @endif

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
    </div>
@stop



