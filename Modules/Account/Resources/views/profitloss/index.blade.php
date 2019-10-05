@extends('account')

@section('title', get_school_info('site_title').' | Profit & Loss')
@section('head')
    <style>
        table tr {
            cursor: pointer;
        }    </style>

    <link rel="stylesheet" type="text/css" href="{{url('public/css/print.css')}}" media="print"/>
    <style>

        @media print {

            .noprint, .no-print * {
                display: none !important;
            }

        }
    </style>

@stop
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/profit_loss')}}" method="post"
                      enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">

                                <div class="card-body noprint">
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="label-info">Date From *</label>
                                                <br>
                                                <input type="text" value="{{get_nepali_date($from)}}" name="from" class="form-control nepali_datepicker" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="label-info">Date To *</label>
                                                <br>
                                                <input name="to" type="text"
                                                       value="{{get_nepali_date($to)}}"
                                                       class="form-control nepali_datepicker" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <br>
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-primary btn-round float-right mr-1">
                                                View
                                                Report
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
                <div class="card ">
                    <div class="card-header card-header-success card-header-text ">
                        <div class="card-text col-sm-12">
                            <h4 class="card-title ">
                                <center>{{get_school_info('school_name')}}</center>
                                <center>Estd. In : {{get_school_info('establish_date')}}</center>
                                <center>{{get_school_info('address')}}</center>
                                <center>{{get_nepali_date($from)}} To {{get_nepali_date($to)}}</center>
                                <center><h3>Profit & Loss</h3></center>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="material-datatables">
                            <table id="datatable"
                                   class="Table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <tbody>
                                @php
                                    $b = 0;
                                    $d=0;
                                    $individual_debit=[];
                                    $individual_credit=[];
                                    $individual_debit=get_trial_balance($from,$to)['individual_debit'];
                                    $individual_credit=get_trial_balance($from,$to)['individual_credit'];

                                @endphp
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <table id="datatable"
                                                       class="Table table-striped table-bordered table-hover"
                                                       cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Particular</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="table-danger">
                                                        <td colspan="2">Expenses</td>
                                                    </tr>
                                                    @foreach(get_ledger_list($expense_id->id) as $list)
                                                        <tr class="table-success">
                                                            <td style="padding-left:1rem;">{{$list->name}}</td>
                                                            <?php
                                                            $credit = 0;$debit = 0;
                                                            $a = get_ledgers($list->id,$from,$to)['balance'];
                                                            $d = $d + $a;
                                                            ?>
                                                            <td>{{$a}}/-</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach(get_level_one($expense_id->id) as $level1)
                                                        <tr class="table-primary" href="#">
                                                            <td style="padding-left:2rem;">{{$level1->name}}</td>
                                                            <td>{{$individual_debit[$level1->id]-$individual_credit[$level1->id]}}
                                                                /-
                                                            </td>
                                                        </tr>
                                                        @foreach(get_ledger_list($level1->id) as $list)
                                                            <tr class="table-success" href="{{url('ledger/view_ledger/'.$list->id)}}">
                                                                <td style="padding-left:3rem;">{{$list->name}}</td>
                                                                <?php
                                                                $credit = 0;$debit = 0;
                                                                $a = get_ledgers($list->id,$from,$to)['balance'];
                                                                $d = $d + $a;
                                                                ?>
                                                                <td>{{$a}}/-</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <table id="datatable"
                                                       class="Table table-striped table-bordered table-hover"
                                                       cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Particular</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="table-danger">
                                                        <td colspan="2">Incomes</td>
                                                    </tr>
                                                    @foreach(get_ledger_list($income_id->id) as $list)
                                                        <tr class="table-success" href="#">
                                                            <td style="padding-left:1rem;">{{$list->name}}</td>
                                                            <?php
                                                            $credit = 0;$debit = 0;
                                                            $a = get_ledgers($list->id,$from,$to)['balance'];
                                                            $a = $a * (-1);
                                                            $b = $b + $a;

                                                            ?>
                                                            <td>{{$a}}/-</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach(get_level_one($income_id->id) as $level1)
                                                        <tr class="table-primary" href="#">
                                                            <td style="padding-left:2rem;">{{$level1->name}}</td>
                                                            <td>{{$individual_credit[$level1->id]-$individual_debit[$level1->id]}}
                                                                /-
                                                            </td>
                                                        </tr>
                                                        @foreach(get_ledger_list($level1->id) as $list)
                                                            <tr class="table-success" href="{{url('ledger/view_ledger/'.$list->id)}}">
                                                                <td style="padding-left:3rem;">{{$list->name}}</td>
                                                                <?php
                                                                $credit = 0;$debit = 0;
                                                                $a = get_ledgers($list->id,$from,$to)['balance'];
                                                                $a = $a * (-1);
                                                                $b = $b + $a;
                                                                ?>
                                                                <td>{{$a}}/-</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    @php
                                    $net_profit=0;
                                    $net_loss=0;
                                    if($d>$b)
                                    {
                                    $net_loss=$d-$b;
                                    $net_profit=0;
                                    }
                                    else
                                    {
                                    $net_loss=0;
                                    $net_profit=$b-$d;
                                    }
                                    @endphp

                                    <th colspan="2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                Net Profit
                                                <input id="net_profit" type="text" class="form-control" readonly="" value="{{$net_profit}}/-">
                                            </div>
                                            <div class="col-sm-6">
                                                Net Loss
                                                <input id="net_loss" type="text" class="form-control" readonly="" value="{{$net_loss}}/-" >
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                            <!-- end content-->
                        </div>
                        <!--  end card  -->
                        <div class="col-md-1 print-button ">
                            <button class="btn btn-primary btn-round " onclick="javascript:window.print()" id="btnPrint"
                                    style="position: fixed; bottom: 10px; left: 10px;">Print Profit & Loss</button>
                        </div>
                    </div>
                </div>

                <!-- end content-->


            </div>

            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->

        <!-- end row -->

        @include('includes.advancedOption')

    </div>

@stop
@section('script')
    <script>
        function store()
        {
            alert("hello");
            var Net_Profit=document.getElementById("net_profit").value;
            alert(Net_Profit);
        }
        $(document).ready(function () {
            $('table tr td:not(:last-child)').click(function () {
                window.location = $(this).parent().attr('href');
                return false;
            });

        });

    </script>

@stop
