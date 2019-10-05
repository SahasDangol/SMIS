<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.head')
</head>
<body>
<div class="row">
    <div class="col-md-10 mr-auto ml-auto">
        <div class="card ">
            <div class="card-header head" id="head">
                <h4 class="card-title">View Invoice</h4>
            </div>
            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <b>Invoice ID:1</b><br>
                        <b>Invoice No:124</b><br>
                        Due Date: 2019-10-19 <br>
                        <div class="invoice-status">Payment Status: <b class="text-success">Paid</b></div>
                    </div>
                    <div class="col-md-6">
                        <div class="float-right">
                            <img src="{{url('img/apple-icon.png')}}"  alt="some image" style="width:100px;">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto">
                        <h4 align="center"><b>Invoice Title</b></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><b>Invoice To</b></h4>
                        Name:Susan Chikanbanjar
                        <br>
                        Class:Nursery <br>
                        Section:Bagmati<br>
                        Roll:12345<br>
                    </div>
                    <div class="col-md-6">
                        <div class="float-right ml-auto">
                            <h4><b>School Name</b></h4>
                            Address:Bhaktapur<br>
                            Email:turing.bkt@gmail.com<br>
                        </div>
                    </div>
                </div>
                <hr>


                    <div class="col-md-12">
                        <table class="table">
                            <thead style="background:#dce9f9;">
                            <th>Fee Type</th>
                            <th style="text-align:right">Amount</th>
                            <th style="text-align:right">Discount</th>
                            <th style="text-align:right">Total</th>
                            </thead>
                            <tbody id="invoice">
                            <tr>
                                <td width="40%">Monthly Fee</td>
                                <td style="text-align:right">NPR 1000</td>
                                <td style="text-align:right">NRP 200</td>
                                <td style="text-align:right">NRP 800</td>
                            </tr>
                            <tr>
                                <td width="40%">Miscelleneous Fee</td>
                                <td style="text-align:right">NPR 1000</td>
                                <td style="text-align:right">NRP 200</td>
                                <td style="text-align:right">NRP 800</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--End Invoice Product-->

                    <!--Summary Table-->
                    <div class="col-md-4 pull-right" style="background:#dce9f9">
                        <table class="table" width="100%">
                            <tr><td>Total</td><td style="text-align:right; width:120px;">NRP 1600</td></tr>
                            <tr><td>Paid</td><td style="text-align:right; width:120px;">NRP 1000</td></tr>
                            <tr><td>Amount Due</td><td style="text-align:right; width:120px;">NRP 600</td></tr>
                        </table>
                    </div>

                    <div class="clearfix"></div>

                    <!--related Transaction-->
                    {{--@if( count($transactions) > 0 )--}}
                    <table class="table table-bordered" style="margin-top:30px">
                        <thead>
                        <th colspan="3" style="text-align: center;">Related Transaction</th>
                        </thead>
                        <thead>
                        <th>Date</th>
                        <th>Note</th>
                        <th style="text-align: right;">Amount</th>
                        </thead>
                        <tbody>

                        <tr>
                            <td>2019/01/01</td>
                            <td style="text-align: left;">Late Fee</td>
                            <td style="text-align: right;">NRP 1600</td>
                        </tr>
                        <tr>
                            <td>2019/11/01</td>
                            <td style="text-align: left;">No Remarks</td>
                            <td style="text-align: right;">NRP 1600</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="invoice-note">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid consectetur corporis delectus labore neque nulla numquam odio optio perspiciatis porro quae repellat suscipit, temporibus ut veritatis voluptatem? Quam, quas!</div>


            </div>
        </div>
    </div>
</div>
@include('includes.script')
</body>
</html>







