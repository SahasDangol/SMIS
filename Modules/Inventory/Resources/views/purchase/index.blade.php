@extends('master')

@section('title', get_school_info('site_title').' | Purchase Record')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Purchase Record</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('purchase-create')
                            <a href="{{url('/purchase/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add New Purchase
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Date (in B.S.)</th>
                                    <th>Vendor Name</th>
                                    <th>Item Name</th>
                                    <th>Per Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Discount</th>
                                    <th>Final Price</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{get_nepali_date($purchase->date)}}</td>
                                        <td>{{ucfirst($purchase->vendor_name)}}</td>
                                        <td>{{ucfirst($purchase->items->name)}}</td>
                                        <td>Rs.{{$purchase->unit_price}}/-</td>
                                        <td>{{$purchase->quantity}}</td>
                                        <td>Rs.{{$purchase->total_amount}}/-</td>
                                        <td>Rs.{{$purchase->discount}}/-</td>
                                        <td>Rs.{{$purchase->final_amount}}/-</td>
                                        <td class="text-right">
                                            @can('purchase-edit')
                                                <a href="{{route('purchase.edit',$purchase->id)}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                            @endcan
                                            @can('purchase-delete')
                                                <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$purchase->id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                </a>
                                                <form method="post" action="{{route('purchase.destroy',$purchase->id)}} " id="delete-form-{{$purchase->id}}">
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

