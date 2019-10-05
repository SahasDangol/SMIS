@extends('account')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{url('public/css/print.css')}}" media="print"/>
    <style>

        @media print {
            .head, .no-print * {
                display: none !important;
            }
        }
    </style>

@stop
@section('title', get_school_info('site_title').' | Collect Fee')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Student Payment History</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="material-datatables">
                            <table id="datatables" data-role="table" data-mode="columntoggle" class="ui-responsive"
                                   class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Invoice Id</th>
                                    <th>Roll No.</th>
                                    <th>Class / Section</th>
                                    <th>Student Name</th>
                                    <th>Actual Fee</th>
                                    <th>Paid</th>
                                    <th>Discount</th>
                                    <th>Remaining Due</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Invoice Id</th>
                                    <th>Roll No.</th>
                                    <th>Class / Section</th>
                                    <th>Student Name</th>
                                    <th>Actual Fee</th>
                                    <th>Paid</th>
                                    <th>Discount</th>
                                    <th>Remaining Due</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->id}}</td>
                                        <td>{{$invoice->students->roll_no}}</td>
                                        <td>{{$invoice->students->classrooms->class_name}}</td>
                                        <td>{{$invoice->students->first_name}} {{$invoice->students->middle_name}} {{$invoice->students->last_name}}</td>
                                        <td>{{$invoice->total}}</td>
                                        <td>{{$invoice->paid}}</td>
                                        <td>{{$invoice->discount}}</td>
                                        <td>Rs.{{$invoice->balance}}/-</td>
                                        @if($invoice->status=="0")
                                            <td>
                                                <span class="badge badge-danger">Unpaid</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="badge badge-success">Paid</span>
                                            </td>
                                        @endif
                                        <td class="">
                                            <a title="Print Invoice" href="#"
                                               class="btn btn-link btn-info btn-just-icon like"
                                               onclick="event.preventDefault();printFrame('{{url('invoices/'.$invoice->id)}}','frame{{$invoice->id}}');"><i
                                                        class="material-icons">print</i></a>
                                            {{--<a title="Take Payment" href="#"--}}
                                               {{--class="btn btn-link btn-success btn-just-icon like"><i--}}
                                                        {{--class="material-icons" data-toggle="modal"--}}
                                                        {{--data-target="#payment[{{$invoice->id}}]">monetization_on</i></a>--}}

                                            {{--<div class="modal fade" id="payment[{{$invoice->id}}]" tabindex="-1"--}}
                                                 {{--role="dialog" aria-labelledby="myModalLabel"--}}
                                                 {{--aria-hidden="true">--}}
                                                {{--<div class="modal-dialog">--}}
                                                    {{--<div class="modal-content">--}}
                                                        {{--<div class="modal-header">--}}
                                                            {{--<h4 class="modal-title">Take Payment{{$invoice->id}}</h4>--}}
                                                            {{--<button type="button" class="close" data-dismiss="modal"--}}
                                                                    {{--aria-hidden="true">--}}
                                                                {{--<i class="material-icons">clear</i>--}}
                                                            {{--</button>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="modal-body">--}}
                                                            {{--<form id="TypeValidation" class="form-horizontal process"--}}
                                                                  {{--action="{{URL::to('/student_payments')}}"--}}
                                                                  {{--method="post">--}}
                                                                {{--@if(count(get_payment_history($invoice->id)))--}}
                                                                    {{--<div class="card ">--}}
                                                                        {{--<div class="card-header card-header-success card-header-text">--}}
                                                                            {{--<div class="card-text">--}}
                                                                                {{--<h4 class="card-title">Payment--}}
                                                                                    {{--History</h4>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="card-body ">--}}

                                                                            {{--<table id="datatables" data-role="table"--}}
                                                                                   {{--data-mode="columntoggle"--}}
                                                                                   {{--class="ui-responsive"--}}
                                                                                   {{--class="table table-striped table-no-bordered table-hover"--}}
                                                                                   {{--style="width:100%">--}}

                                                                                {{--<thead>--}}
                                                                                {{--<tr>--}}
                                                                                    {{--<th>Date</th>--}}
                                                                                    {{--<th>Amount</th>--}}
                                                                                    {{--<th>Remarks</th>--}}
                                                                                {{--</tr>--}}
                                                                                {{--</thead>--}}
                                                                                {{--<tfoot>--}}
                                                                                {{--<tr>--}}
                                                                                    {{--<th>Date</th>--}}
                                                                                    {{--<th>Amount</th>--}}
                                                                                    {{--<th>Remarks</th>--}}
                                                                                {{--</tr>--}}
                                                                                {{--</tfoot>--}}
                                                                                {{--<tbody>--}}

                                                                                {{--@foreach(get_payment_history($invoice->id) as $history)--}}
                                                                                    {{--<tr>--}}

                                                                                        {{--<td>abc</td>--}}
                                                                                        {{--<td>Rs.{{$history->amount}}/---}}
                                                                                        {{--</td>--}}
                                                                                        {{--@if($history->remarks=="")--}}
                                                                                            {{--<td>N/A</td>--}}
                                                                                        {{--@else--}}
                                                                                            {{--<td>{{$history->remarks}}</td>--}}
                                                                                        {{--@endif--}}
                                                                                    {{--</tr>--}}
                                                                                {{--@endforeach--}}
                                                                                {{--</tbody>--}}
                                                                            {{--</table>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                {{--@endif--}}
                                                                    {{--<div class="card ">--}}
                                                                        {{--<div class="card-header card-header-success card-header-text">--}}
                                                                            {{--<div class="card-text">--}}
                                                                                {{--<h4 class="card-title">Payment--}}
                                                                                    {{--Details</h4>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="card-body ">--}}
                                                                            {{--<div class="row">--}}
                                                                                {{--<label class="col-sm-1 col-form-label"></label>--}}
                                                                                {{--<div class="col-sm-5">--}}
                                                                                    {{--<div class="form-group">--}}
                                                                                        {{--<label class="bmd-label-floating">Due--}}
                                                                                            {{--Fees (in Rs.)</label>--}}
                                                                                        {{--<input--}}
                                                                                                {{--class="form-control"--}}
                                                                                                {{--value="{{get_total_due($invoice->id)}}"--}}
                                                                                                {{--type="text"--}}
                                                                                                {{--maxlength="6"--}}
                                                                                                {{--readonly/>--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="col-sm-5">--}}
                                                                                    {{--<div class="form-group">--}}
                                                                                        {{--<label class="bmd-label-floating">Remaining--}}
                                                                                            {{--Due (in Rs.)</label>--}}
                                                                                        {{--<input id="remaining[{{$invoice->id}}]"--}}
                                                                                               {{--class="form-control"--}}
                                                                                               {{--value="{{floatval(get_total_due($invoice->id))-floatval(get_paid_due($invoice->id))}}"--}}
                                                                                               {{--type="text" maxlength="6"--}}
                                                                                               {{--readonly/>--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                            {{--@if((floatval(get_total_due($invoice->id))-floatval(get_paid_due($invoice->id)))!=0.00)--}}
                                                                                {{--<br>--}}
                                                                                {{--<div class="row">--}}
                                                                                    {{--<label class="col-sm-1 col-form-label"></label>--}}
                                                                                    {{--<div class="col-sm-5">--}}
                                                                                        {{--<div class="form-group">--}}
                                                                                            {{--<label class="bmd">Payment--}}
                                                                                                {{--Date</label>--}}
                                                                                            {{--<input class="form-control datepicker"--}}
                                                                                                   {{--type="text"--}}
                                                                                                   {{--name="date"--}}
                                                                                                   {{--maxlength="10"--}}
                                                                                                   {{--placeholder="MM/DD/YYYY"--}}
                                                                                                   {{--value="{{old('date')}}"--}}
                                                                                                   {{--required="true"/>--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}
                                                                                    {{--<div class="col-sm-5">--}}
                                                                                        {{--<div class="form-group">--}}
                                                                                            {{--<label class="bmd">Payable--}}
                                                                                                {{--Amount (in Rs.)</label>--}}
                                                                                            {{--<input class="form-control"--}}
                                                                                                   {{--value="{{$invoice->id}}"--}}
                                                                                                   {{--type="hidden"--}}
                                                                                                   {{--maxlength="6"--}}
                                                                                                   {{--name="invoice_id"--}}
                                                                                                   {{--required/>--}}
                                                                                            {{--<input id="total[{{$invoice->id}}]"--}}
                                                                                                   {{--class="form-control"--}}
                                                                                                   {{--value="{{floatval(get_total_due($invoice->id))-floatval(get_paid_due($invoice->id))}}"--}}
                                                                                                   {{--placeholder="Rs. 0.00/-"--}}
                                                                                                   {{--type="text"--}}
                                                                                                   {{--maxlength="6"--}}
                                                                                                   {{--name="amount"--}}
                                                                                                   {{--required--}}
                                                                                                   {{--onkeyup="check({{$invoice->id}})"/>--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--<br>--}}
                                                                                {{--<div class="row">--}}
                                                                                    {{--<label class="col-sm-1 col-form-label"></label>--}}
                                                                                    {{--<div class="col-sm-10">--}}
                                                                                        {{--<div class="form-group">--}}
                                                                                            {{--<label class="bmd">Remarks</label>--}}
                                                                                            {{--<input id="total"--}}
                                                                                                   {{--class="form-control"--}}
                                                                                                   {{--type="text"--}}
                                                                                                   {{--name="remarks"/>--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="row">--}}
                                                                                    {{--<label class="col-sm-8 col-form-label"></label>--}}
                                                                                    {{--<button class="btn btn-primary btn-round float-right mr-1">--}}
                                                                                        {{--Pay--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--@else--}}
                                                                                {{--<div class="row">--}}
                                                                                    {{--<label class="col-sm-1 col-form-label"></label>--}}
                                                                                    {{--<div class="col-sm-10">--}}
                                                                                        {{--<div class="form-group">--}}
                                                                                            {{--<div class="alert alert-info alert-with-icon"--}}
                                                                                                 {{--data-notify="container">--}}
                                                                                                {{--<i class="material-icons"--}}
                                                                                                   {{--data-notify="icon">notifications</i>--}}
                                                                                                {{--<span data-notify="icon"--}}
                                                                                                      {{--class="now-ui-icons ui-1_bell-53"></span>--}}
                                                                                                {{--<span data-notify="message">Payment is Clear</span>--}}
                                                                                            {{--</div>--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}
                                                                            {{--@endif--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                    {{--{{csrf_field()}}--}}
                                                            {{--</form>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                            <a title="Delete Invoice" href="#" onclick="
                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$invoice->id}}').submit();
                                                    }
                                                    else{
                                                    event.preventDefault();
                                                    }" class="btn btn-link btn-danger btn-just-icon remove"><i
                                                        class="material-icons">close</i>
                                            </a>
                                            <form method="post" action="{{route('invoices.destroy',$invoice->id)}} "
                                                  id="delete-form-{{$invoice->id}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $invoices->render() !!}
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

@section('script')
    <script>
        function check(a) {
            var name1 = "total[" + a + "]";
            // alert(name1);
            var payable = document.getElementById(name1).value;
            var name2 = "remaining[" + a + "]";
            var remaining = document.getElementById(name2).value;
            // alert(remaining);

            if (parseInt(payable) > parseInt(remaining)) {
                alert("Payment amount is too big than a amount to be Paid...")
            }
        }
    </script>

    <script>
        function printFrame(link, frame) {
            $("<iframe>")
                .attr("hidden", "true")
                .attr("src", link)
                .attr("name", frame)
                .appendTo("body");
            $(document).ready(function () {
                frames[frame].focus();
                frames[frame].print();
            });
        }
    </script>
@stop

