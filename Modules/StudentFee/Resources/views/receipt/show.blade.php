@extends('account')

@section('title', get_school_info('site_title').' | Show Invoice')
@section('Body')
    <div class="row">
        <div class="col-md-10 mr-auto ml-auto">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"><b>View Invoice</b></h4>
                </div>
                <hr>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
                            {{--<b>Invoice No: {{$invoice->id}}</b><br>--}}
                        </div>
                        <div class="col-md-3">
                            <div class="float-right">
                                <img src="{{url('img/apple-icon.png')}}" alt="some image" style="width:100px;">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4><b>Invoice To</b></h4>

                            <b>Name: </b>{{ ucfirst($student->first_name).' '.ucfirst($student->middle_name).' '.ucfirst($student->last_name)}}
                            <br>
                            <b>Class: </b>{{ucfirst($student->classrooms->class_name)}} <br>
                            <b>Section: </b>{{ucfirst($student->sections->name)}}<br>
                            <b>Roll No: </b>{{$student->roll_no}}<br>

                        </div>
                        <div class="col-md-3">
                            <div class="float-right ml-auto">
                                <h4><b>{{get_school_info('school_name')}}</b></h4>
                                <b>Address: </b>{{get_school_info('school_address')}}<br>
                                <b>Email: </b>{{get_school_info('school_email')}}<br>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead style="background:#dce9f9;">
                            <th><b>S.No.</b></th>
                            <th><b>Fee Type</b></th>
                            <th style="text-align:right"><b>Total</b></th>
                            <th style="text-align:right"><b>Discount</b></th>
                            <th style="text-align:right"><b>Payment</b></th>
                            </thead>
                            <tbody id="invoice">
                            @php
                                $count=1;
                                $total =$amount;
                            @endphp
                            @foreach($invoices as $invoice)
                                <tr>
                                    <th>{{$count}}</th>
                                    <td width="40%">
                                        @foreach($invoice->invoice_items as $invoice_item)
                                        {{$invoice_item->title}} <br>
                                        @endforeach
                                    </td>
                                    <td style="text-align:right">NRP {{$invoice->total}}</td>
                                    <td style="text-align:right">NRP {{$invoice->discount}}</td>
                                    @if($count==count($invoices))
                                    <td style="text-align:right">NRP {{$total}}</td>
                                    @else
                                    <td style="text-align:right">NRP {{$invoice->paid}}@php($total-=$invoice->paid)</td>
                                    @endif
                                    @php($count++)
                                </tr>
                            @endforeach
                                <tr>
                                    <td ></td>
                                    <td></td><td></td>
                                    <td><b>Total Payment</b></td>
                                    <td style="text-align:right">NRP {{$amount}}</td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                    <!--End Invoice Product-->
                    <div class="clearfix"></div>
                    <br>
                    <br>

                </div>
            </div>
            <div class="col-md-1 print-button">
                <button class="btn btn-rose " onclick="javascript:window.print()" id="btnPrint"
                        style="position: fixed; bottom: 10px; left: 10px;">Print Invoice</button>
            </div>
        </div>
    </div>
@stop
