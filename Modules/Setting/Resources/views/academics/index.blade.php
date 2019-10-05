@extends('master')

@section('title', get_school_info('site_title').' | Academics Year Detail')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/academics_year/')}}"
                      method="post">
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">New Session</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Session Year in B.S *</label>
                                        <input class="form-control" value="{{ old('year') }}" type="text"
                                               maxlength="100" name="year" required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Session Name *</label>
                                        <input class="form-control" value="{{ old('session') }}" type="text"
                                               maxlength="100" name="session" required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Remarks</label>
                                        <input class="form-control" value="{{ old('remarks') }}" type="text"
                                               maxlength="100" name="remarks"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-5 col-form-label"></label>
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    Add New Session
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
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Session Name</th>
                                    <th>Session Year</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{$detail->session}}</td>
                                        <td>{{$detail->year}}</td>
                                        @if($detail->remarks!="")
                                            <td>{{$detail->remarks}}</td>
                                        @else
                                            <td>N/A</td>
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
@stop

