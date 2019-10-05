@extends('account')

@section('title', get_school_info('site_title').' | Balance Sheet')
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

                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/balance_sheet')}}" method="post"
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
                                                <input type="text" value="{{get_nepali_date($from)}}" name="from"
                                                       class="form-control nepali_datepicker" required>
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
                                <center><h3>Balance Sheet</h3></center>
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
                                                    <tr class="table-danger" href="#">
                                                        <td colspan="2">Liabilities</td>
                                                    </tr>
                                                    @foreach(get_ledger_list($liabilities_id->id) as $list)
                                                        <tr class="table-success" href="#">
                                                            <td style="padding-left:2rem;">{{$list->name}}</td>
                                                            <?php
                                                            $credit = 0;$debit = 0;
                                                            $a = get_ledgers($list->id, $from, $to)['balance'];
                                                            $a = $a * (-1);
                                                            $b = $b + $a;

                                                            ?>
                                                            <td>{{$a}}/-</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach(get_level_one($liabilities_id->id) as $level1)
                                                        <tr class="table-primary" href="#">
                                                            <td style="padding-left:2rem;">{{$level1->name}}</td>
                                                            <td>{{$individual_credit[$level1->id]-$individual_debit[$level1->id]}}
                                                                /-
                                                            </td>
                                                        </tr>
                                                        @foreach(get_ledger_list($level1->id) as $list)
                                                            <tr class="table-success" href="#">
                                                                <td style="padding-left:2rem;">{{$list->name}}</td>
                                                                <?php
                                                                $credit = 0;$debit = 0;
                                                                $a = get_ledgers($list->id, $from, $to)['balance'];
                                                                $a = $a * (-1);
                                                                $b = $b + $a;
                                                                ?>
                                                                <td>{{$a}}/-</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach(get_level_two($level1->id) as $level2)
                                                            <tr class="table-warning" href="#">
                                                                <td style="padding-left:3rem;">{{$level2->name}}</td>
                                                                <td>{{$individual_credit[$level2->id]-$individual_debit[$level2->id]}}
                                                                    /-
                                                                </td>
                                                            </tr>
                                                            @foreach(get_ledger_list($level2->id) as $list)
                                                                <tr class="table-success" href="#">
                                                                    <td style="padding-left:3rem;">{{$list->name}}</td>
                                                                    <?php
                                                                    $credit = 0;$debit = 0;
                                                                    $a = get_ledgers($list->id, $from, $to)['balance'];
                                                                    $a = $a * (-1);
                                                                    $b = $b + $a;
                                                                    ?>
                                                                    <td>{{$a}}/-</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                    {{--<tr>--}}
                                                    {{--<td>Net Profit</td>--}}
                                                    @php
                                                        $a = $net_profit;
                                                        $b = $b + $a;
                                                    @endphp
                                                    {{--<td>--}}
                                                    {{--@if($a>=0)--}}
                                                    {{--{{$a}}/---}}
                                                    {{--@else--}}
                                                    {{--{{-$a}}/---}}
                                                    {{--@endif--}}
                                                    {{--</td>--}}
                                                    {{--</tr>--}}
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
                                                    <tr class="table-danger" href="#">
                                                        <td colspan="2">Assets</td>
                                                    </tr>

                                                    @foreach(get_ledger_list($assets_id->id) as $list)
                                                        <tr class="table-success" href="#">
                                                            <td style="padding-left:1rem;">{{$list->name}}</td>
                                                            <?php
                                                            $a = get_ledgers($list->id, $from, $to)['balance'];
                                                            $d = $d + $a;
                                                            ?>
                                                            <td>{{$a}}/-</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach(get_level_one($assets_id->id) as $level1)
                                                        <tr class="table-primary" href="#">

                                                            <td style="padding-left:1rem;">{{$level1->name}}</td>
                                                            <td>{{$individual_debit[$level1->id]-$individual_credit[$level1->id]}}
                                                                /-
                                                            </td>
                                                        </tr>
                                                        @foreach(get_ledger_list($level1->id) as $list)
                                                            <tr class="table-success"
                                                                href="{{url('ledger/view_ledger/'.$list->id)}}">

                                                                <td style="padding-left:2rem;">{{$list->name}}</td>
                                                                <?php
                                                                $a = get_ledgers($list->id, $from, $to)['balance'];
                                                                $d = $d + $a;
                                                                ?>
                                                                <td>{{$a}}/-</td>
                                                            </tr>
                                                        @endforeach
                                                        @foreach(get_level_two($level1->id) as $level2)
                                                            <tr class="table-warning" href="#">
                                                                <td style="padding-left:2rem;">{{$level2->name}}</td>
                                                                <td>{{$individual_debit[$level2->id]-$individual_credit[$level2->id]}}
                                                                    /-
                                                                </td>
                                                            </tr>
                                                            @foreach(get_ledger_list($level2->id) as $list)
                                                                <tr class="table-success"
                                                                    href="{{url('ledger/view_ledger/'.$list->id)}}">

                                                                    <td style="padding-left:3rem;">{{$list->name}}</td>
                                                                    <?php
                                                                    $a = get_ledgers($list->id, $from, $to)['balance'];
                                                                    $d = $d + $a;
                                                                    ?>
                                                                    <td>{{$a}}/-</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                    {{--<tr>--}}
                                                    {{--<td>Net Loss</td>--}}
                                                    @php
                                                        $a = floatval($net_loss);
                                                        $d = $d + $a;
                                                    @endphp
                                                    {{--<td>{{$a}}/-</td>--}}
                                                    {{--</tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <div class="row ">
                                            <div class="col-sm-6 table-info">
                                                Net Profit
                                                @php
                                                    $profit = $net_profit;
                                                    $loss = $net_loss;
                                                    $result="";
                                                if($profit >0)
                                                {
                                                $result=$profit;
                                                }
                                                else
                                                {
                                                $result="-".$loss;
                                                }
                                                @endphp
                                                @if(floatval($result)>0)
                                                    <div class=" float-right mr-4 table-success">{{$result}}/-</div>
                                                @else
                                                    <div class="float-right mr-4 table-danger">{{$result}}/-</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                Total Liabilities + Stockholder equity
                                                <input type="text" class="form-control" readonly=""
                                                       value="{{$b}}/-">
                                            </div>
                                            <div class="col-sm-6">
                                                Total Assets
                                                <input type="text" class="form-control" readonly=""
                                                       value="{{$d}}/-">
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                            <!-- end content-->
                        </div>
                        <!--  end card  -->
                    </div>
                </div>

                <!-- end content-->


            </div>

            <!--  end card  -->
            <div class="col-md-1 print-button ">
                <button class="btn btn-primary btn-round " onclick="javascript:window.print()" id="btnPrint"
                        style="position: fixed; bottom: 10px; left: 10px;">Print Balance Sheet
                </button>
            </div>
        </div>
        <!-- end col-md-12 -->

        <!-- end row -->

        @include('includes.advancedOption')

    </div>

@stop
@section('script')
    <script>
        function store() {
            alert("hello");
            var Net_Profit = document.getElementById("net_profit").value;
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
