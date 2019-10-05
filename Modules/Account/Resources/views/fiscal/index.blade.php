@extends('account')

@section('title', get_school_info('site_title').' | Fiscal Year Detail')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/fiscal_year/')}}"
                      method="post">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-sm-12">
                                <h4 class="card-title"><center>New Fiscal Year</center></h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Fiscal Year Name (*)</label><br>
                                        <input class="form-control" value="{{ old('name') }}" type="text"
                                               maxlength="100" name="name" required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Fiscal Year Start From (*)</label>
                                        <br>
                                        <input class="form-control nepali_datepicker" value="{{ old('starting_date') }}" type="text"
                                               maxlength="100" name="starting_date" placeholder="Starting Date" required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Fiscal Year Ends At (*)</label><br>
                                        <input class="form-control nepali_datepicker" value="{{ old('ending_date') }}" type="text"
                                               maxlength="100" name="ending_date" placeholder="Ending Date" required="true"/>
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
                                    <th>Fiscal Year</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Fiscal Year</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{$detail->name}}</td>
                                        <td>{{get_nepali_date($detail->starting_date)}}</td>
                                        <td>{{get_nepali_date($detail->ending_date)}}</td>
                                        @if($detail->remarks!="")
                                            <td>{{$detail->remarks}}</td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        <td class="text-right">
                                            @can('route-edit')
                                            <a href="{{url('/fiscal_year/'.$detail->id.'/edit')}}"
                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                        title="Edit"    class="material-icons">dvr</i></a>
                                            @endcan
                                            @can('route-delete')
                                            <a href="#" onclick="
                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$detail->id}}').submit();
                                                    }
                                                    else{
                                                    event.preventDefault();
                                                    }"
                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                        title="Delete" class="material-icons">close</i>
                                            </a>
                                            <form method="post"
                                                  action="{{route('fiscal_year.destroy',$detail->id)}} "
                                                  id="delete-form-{{$detail->id}}">
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
        @include('includes.advancedOption')
    </div>
@stop

