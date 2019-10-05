@extends('account')

@section('title', get_school_info('site_title').' | Fee Type Update')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('studentfee-edit')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/feetypes/'.$feetype->id)}}"
                          method="post">
                        @method('PUT')
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Update Fee Type</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{$feetype->fee_code}}"
                                                   placeholder="Fee Type Code" type="text" maxlength="100"
                                                   name="fee_code" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{ ucfirst($feetype->fee_type)}}"
                                                   placeholder="Fee Type" type="text" maxlength="100" name="fee_type"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{ $feetype->amount}}"
                                                   placeholder="Amount" type="text" maxlength="6" name="amount"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{ucfirst($feetype->remarks)}}"
                                                   placeholder="Note (optional)" type="text" maxlength="200"
                                                   name="remarks"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Update Fee Type
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('studentfee-edit')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Fee Type Detail</h4>
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
                                                <th>Fee Code</th>
                                                <th>Fee Type</th>
                                                <th>Remarks</th>
                                                @can('student-fee-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('student-fee-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Fee Code</th>
                                                <th>Fee Type</th>
                                                <th>Remarks</th>
                                                @can('student-fee-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('student-fee-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($feetypes as $feetype)
                                                @if($feetype->status==1)
                                                    <tr>
                                                        <td>{{$feetype->fee_code}}</td>
                                                        <td>{{ucfirst($feetype->fee_type)}}</td>
                                                        <td>
                                                            @if($feetype->remarks==null)
                                                                N/A
                                                            @else
                                                                {{ucfirst($feetype->remarks)}}
                                                            @endif
                                                        </td>
                                                        <td class="text-right">
                                                            @can('studentfee-edit')
                                                                <a href="{{url('/feetypes/'.$feetype->id.'/edit')}}"
                                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                            class="material-icons">dvr</i></a>
                                                            @endcan
                                                            @can('studentfee-delete')
                                                                <a href="#" onclick="
                                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                        {
                                                                        event.preventDefault();
                                                                        document.getElementById('delete-form-{{$feetype->id}}').submit();
                                                                        }
                                                                        else{
                                                                        event.preventDefault();
                                                                        }"
                                                                   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                            class="material-icons">close</i>
                                                                </a>
                                                                <form method="post"
                                                                      action="{{route('feetypes.destroy',$feetype->id)}} "
                                                                      id="delete-form-{{$feetype->id}}">
                                                                    @csrf
                                                                    {{method_field('DELETE')}}
                                                                </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endif
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

