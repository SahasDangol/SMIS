@extends('account')

@section('title', get_school_info('site_title').' | Edit Sale Record')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/sale/'.$sale->id)}}" method="post"
              enctype="multipart/form-data">
            @method("PUT")
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">
                                    <center>Edit Sale Record</center>
                                </h4>

                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card" id="div1">

                                        <div class="card-body">
                                            <div class="toolbar">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group ml-1">
                                                            <label class="bmd-label-floating">Date</label>
                                                            <input class="form-control nepali_datepicker" type="text"
                                                                   name="date"
                                                                   maxlength="10" placeholder="Due Date(*)"
                                                                   value="{{get_nepali_date($sale->date)}}"
                                                                   required="true"/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="material-datatables">
                                                <table id="datatable"
                                                       class="table table-striped table-bordered table-hover"
                                                       cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th><b>Customer Name</b></th>
                                                        <th><b>Item Name</b></th>
                                                        <th><b>Per Unit Price</b></th>
                                                        <th><b>Quantity</b></th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="2"></th>
                                                        <th>Total Amount
                                                            <input class="form-control" readonly id="total_amount"
                                                                   type="text" value="{{$sale->total_amount}}" name="total_amount"
                                                                   title="Total Amount" required/></th>
                                                        <th>Discount
                                                            <input class="form-control" id="discount"
                                                                   type="text" value="{{$sale->discount}}" name="discount"
                                                                   title="Discount" required/></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3"></th>
                                                        <th>Final Amount
                                                            <input class="form-control" readonly id="final_amount"
                                                                   type="text" value="{{$sale->final_amount}}" name="final_amount"
                                                                   title="Final Amount" required/></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody id="invoice">
                                                    <tr>
                                                        <td>
                                                            <input class="form-control" value="{{$sale->customer_name}}"
                                                                   type="text" name="customer_name"
                                                                   title="Customer Name" required
                                                                   placeholder="Enter a Customer Name"/>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <select class="select2" name="item_id"
                                                                            data-style="select-with-transition"
                                                                            title="{{old('item_id')}}" required="true">
                                                                        <option disabled selected>Select Any Item
                                                                        </option>

                                                                        @foreach($items as $item)
                                                                            <option value="{{$item->id}}"
                                                                                    @if($item->id==$sale->item_id)
                                                                                    selected
                                                                                    @endif
                                                                            >{{$item->name}}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" id="unit" value="{{$sale->unit_price}}"
                                                                   type="number" step="any" name="unit_price"
                                                                   title="Per Unit Price" required
                                                                   placeholder="Per Unit Price"/>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" id="quantity" value="{{$sale->quantity}}"
                                                                   type="number" step="any" name="quantity"
                                                                   title="Quantity Of Items" required
                                                                   placeholder="Quantity Of Items"/>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end content-->
                                            </div>
                                            <!--  end card  -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Remarks</label>
                                                <input class="form-control" value="{{$sale->remarks}}"
                                                       type="text" maxlength="250" name="remarks"
                                                       title="Any Information Purchase Entry "/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-10 col-form-label"></label>
                                        <input type="submit" class="btn btn-primary btn-round float-right mr-1"
                                               value="Update Record">
                                        </input>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop

@section('script')
    <script>
        {{--Calculating Total Amount--}}
        $(document).on('keyup', '#quantity', function () {

            //Show Total Amount
            var total = 0;

            var unit = $('#unit').val();
            var quantity = $('#quantity').val();

            total = unit * quantity;

            $("#total_amount").val(parseFloat(total).toFixed(2));
            $("#final_amount").val(parseFloat(total).toFixed(2));
        });
        {{--Calculating Total Amount--}}

        {{--Calculating Final Amount--}}
        $(document).on('keyup', '#discount', function () {
            //Show Total Amount
            var final = 0;

            var total = $('#total_amount').val();
            var discount = $('#discount').val();

            final = total - discount;

            $("#final_amount").val(parseFloat(final).toFixed(2));

        });
        {{--Calculating Final Amount--}}
    </script>

@stop


