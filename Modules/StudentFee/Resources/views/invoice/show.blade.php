@extends('account')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{url('public/css/print.css')}}" media="print"/>
    <style>

        @media print {
            .noprint,.alert, .no-print * {
                display: none !important;
            }
        }



    </style>

@stop
@section('title', get_school_info('site_title').' | Show Invoice')

@section('Body')
    <div class="row">
        <div class="col-md-10 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <b>Invoice No: {{$invoice->id}}</b><br>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <img src="{{url('img/apple-icon.png')}}" alt="some image" style="width:100px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Invoice To</b></h4>
                            <b>Name: </b>
                            {{ ucfirst($invoice->students->first_name).
                            ' '.ucfirst($invoice->students->middle_name).' '.ucfirst($invoice->students->last_name)}}
                            <br>
                            <b>Class: </b>{{ucfirst($invoice->students->classrooms->class_name)}} <br>
                            <b>Section: </b>{{ucfirst($invoice->students->sections->name)}}<br>
                            <b>Roll No: </b>{{$invoice->students->roll_no}}<br>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right ml-auto">
                                <h4><b>{{get_school_info('school_name')}}</b></h4>
                                <b>Address: </b>{{get_school_info('school_address')}}<br>
                                <b>Email: </b>{{get_school_info('school_email')}}<br>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead style="background:#dce9f9;">
                            <th><b>Fee Type</b></th>
                            <th style="text-align:right"><b>Amount</b></th>
                            </thead>
                            <tbody id="invoice">
                            @foreach($invoice->invoice_items as $invoice_item)
                                <tr>
                                    <td width="40%"> {{$invoice_item->title}}</td>
                                    <td style="text-align:right">NRP {{$invoice_item->total}}</td>
                                </tr>
                            @endforeach
                            <tr>

                                <td>Total</td>
                                <td style="text-align:right">NRP {{$invoice->total}}</td>
                            </tr>
                            @if($invoice->previous_dues)
                                <tr>

                                    <td>Previous Dues</td>
                                    <td style="text-align:right">NRP {{$invoice->previous_dues}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Discount</td>
                                <td style="text-align:right">NRP {{$invoice->discount}}</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td style="text-align:right">NRP {{$invoice->balance + $invoice->previous_dues}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--End Invoice Product-->
                    <div class="clearfix"></div>
                    <br>
                    <br>

                    <div class="invoice-note"><b>Description:</b>
                        @if($invoice->description)
                            {{$invoice->description}}
                        @else
                            Please pay before deadline
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-1 print-button ">
                <button class="btn btn-rose " onclick="javascript:window.print()" id="btnPrint"
                        style="position: fixed; bottom: 10px; left: 10px;">Print Invoice</button>
            </div>
        </div>
    </div>
@stop
