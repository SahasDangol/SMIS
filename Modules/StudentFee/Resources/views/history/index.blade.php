@extends('account')

@section('title', get_school_info('site_title').' | Student Payment History')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Payment History Information</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        {{--<a href="{{url('/students/import')}}">--}}
                            {{--<button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"--}}
                                    {{--data-target="#myModal">--}}
                                {{--<i class="material-icons">add</i>Import Excel--}}
                            {{--</button>--}}
                        {{--</a>--}}
                    </div>
                    <div class="card-body">

                        <div class="material-datatables">
                            <table id="datatables" data-role="table" data-mode="columntoggle" class="ui-responsive"
                                   class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th data-priority="1">Invoice Id</th>
                                    <th data-priority="2">Date</th>
                                    <th data-priority="3">Amount</th>
                                    <th data-priority="4">Remarks</th>
                                    {{--<th class="disabled-sorting text-right">Actions</th>--}}
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th data-priority="1">Invoice Id</th>
                                    <th data-priority="2">Date</th>
                                    <th data-priority="3">Amount</th>
                                    <th data-priority="4">Remarks</th>
                                    {{--<th class="disabled-sorting text-right">Actions</th>--}}
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($history as $aa)
                                    <tr>
                                        <td>{{$aa->invoice_id}}</td>
                                        <td>{{$aa->date}}</td>
                                        <td>{{$aa->amount}}</td>
                                        @if($aa->remarks=="")
                                            <td>N/A</td>
                                        @else
                                            <td>{{$aa->remarks}}</td>
                                        @endif


                                        {{--<td class="text-right">--}}
                                            {{--@can('student-show')--}}
                                                {{--<a href="#" class="btn btn-link btn-info btn-just-icon like"><i--}}
                                                            {{--class="material-icons">favorite</i></a>--}}
                                            {{--@endcan--}}
                                            {{--@can('student-edit')--}}
                                                {{--<a href="{{url('/student/'.$aa->id.'/edit')}}"--}}
                                                   {{--class="btn btn-link btn-warning btn-just-icon edit"><i--}}
                                                            {{--class="material-icons">dvr</i></a>--}}
                                            {{--@endcan--}}
                                            {{--@can('student-delete')--}}
                                                {{--<a href="#" onclick="--}}
                                                        {{--on(); if(confirm('Are You sure, You Want To Delete?'))--}}
                                                        {{--{--}}
                                                        {{--event.preventDefault();--}}
                                                        {{--document.getElementById('delete-form-{{$aa->id}}').submit();--}}
                                                        {{--}--}}
                                                        {{--else{--}}
                                                        {{--event.preventDefault();--}}
                                                        {{--}" class="btn btn-link btn-danger btn-just-icon remove"><i--}}
                                                            {{--class="material-icons">close</i>--}}
                                                {{--</a>--}}
                                                {{--<form method="post"--}}
                                                      {{--action="{{route('student_payments.destroy',$aa->id)}} "--}}
                                                      {{--id="delete-form-{{$aa->id}}">--}}
                                                    {{--@csrf--}}
                                                    {{--{{method_field('DELETE')}}--}}
                                                {{--</form>--}}
                                            {{--@endcan--}}
                                        {{--</td>--}}
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

