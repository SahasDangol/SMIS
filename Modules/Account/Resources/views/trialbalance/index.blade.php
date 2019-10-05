@extends('account')

@section('title', get_school_info('site_title').' | Trial Balance')
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
                @php
                    $b = 0;
                    $d=0;
                    $individual_debit=[];
                    $individual_credit=[];
                    $individual_debit=get_trial_balance($from,$to)['individual_debit'];
                    $individual_credit=get_trial_balance($from,$to)['individual_credit'];
                $debits=[];
                $credits=[];
                @endphp

                <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/trial_balance')}}" method="post"
                      enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">

                                <div class="card-body noprint ">
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
                                <center><h3>Trial Balance</h3></center>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                        </div>
                        <div class="material-datatables">
                            <table id="datatable"
                                   class="Table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th><b>Account Name</b></th>
                                    <th><b>Debit (in Rs.)</b></th>
                                    <th><b>Credit (in Rs.)</b></th>
                                </tr>
                                </thead>

                                <tbody id="invoice">
                                @foreach($groups as $group)
                                    @php
                                        $debits[$group->id]=0;
                                        $credits[$group->id]=0;
                                    @endphp
                                    @foreach(get_ledger_list($group->id) as $list)
                                        <tr class="table-success" href="{{url('ledger/view_ledger/'.$list->id)}}">
                                            <td style="padding-left:2rem;">{{$list->name}}</td>

                                            <?php
                                            $credit = 0;$debit = 0;
                                            $a = get_ledgers($list->id,$from,$to)['balance'];
                                            if ($a < 0) {
                                                $credit = $a * (-1);
                                                $b = $b + $credit;
                                                $credits[$group->id] += $credit;
                                            } elseif ($a > 0) {
                                                $debit = $a;
                                                $d = $d + $debit;
                                                $debits[$group->id] += $debit;
                                            }
                                            ?>
                                            <td>{{$debit}}/-</td>
                                            <td>{{$credit}}/-</td>

                                        </tr>
                                    @endforeach
                                    @foreach(get_level_one($group->id) as $level1)

                                        <tr class="table-primary" href="#">
                                            <td style="padding-left:2rem;">{{$level1->name}}</td>
                                            <td>{{$individual_debit[$level1->id]}}/-</td>
                                            <td>{{$individual_credit[$level1->id]}}/-</td>
                                        </tr>
                                        @foreach(get_ledger_list($level1->id) as $list)
                                            <tr class="table-success" href="{{url('ledger/view_ledger/'.$list->id)}}">
                                                <td style="padding-left:3rem;">{{$list->name}}</td>
                                                <?php
                                                $credit = 0;$debit = 0;
                                                $a = get_ledgers($list->id,$from,$to)['balance'];
                                                if ($a < 0) {
                                                    $credit = $a * (-1);
                                                    $b = $b + $credit;
                                                    $credits[$group->id] += $credit;
                                                } elseif ($a > 0) {
                                                    $debit = $a;
                                                    $d = $d + $debit;
                                                    $debits[$group->id] += $debit;
                                                }
                                                ?>
                                                <td>{{$debit}}/-</td>
                                                <td>{{$credit}}/-</td>
                                            </tr>
                                        @endforeach
                                        @foreach(get_level_two($level1->id) as $level2)
                                            <tr class="table-warning" href="#">
                                                <td style="padding-left:3rem;">{{$level2->name}}</td>
                                                <td>{{$individual_debit[$level2->id]}}/-</td>
                                                <td>{{$individual_credit[$level2->id]}}/-</td>
                                            </tr>
                                            @foreach(get_ledger_list($level2->id) as $list)
                                                <tr class="table-success" href="{{url('ledger/view_ledger/'.$list->id)}}">
                                                    <td style="padding-left:4rem;">{{$list->name}}</td>
                                                    <?php
                                                    $credit = 0;$debit = 0;
                                                    $a = get_ledgers($list->id,$from,$to)['balance'];
                                                    if ($a < 0) {
                                                        $credit = $a * (-1);
                                                        $b = $b + $credit;
                                                        $credits[$group->id] += $credit;
                                                    } elseif ($a > 0) {
                                                        $debit = $a;
                                                        $d = $d + $debit;
                                                        $debits[$group->id] += $debit;
                                                    }
                                                    ?>
                                                    <td>{{$debit}}/-</td>
                                                    <td>{{$credit}}/-</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><center><b>Total</b></center></th>
                                    <th>
                                        <input type="text" class="form-control" readonly="" value="{{$b}}/-"></th>
                                    <th>
                                        <input class="form-control" readonly type="text" value="{{$b}}/-"/></th>
                                </tr>
                                </tfoot>

                            </table>
                            <!-- end content-->
                        </div>
                        <!--  end card  -->
                    </div>
                    <div class="col-md-1 print-button ">
                        <button class="btn btn-primary btn-round " onclick="javascript:window.print()" id="btnPrint"
                                style="position: fixed; bottom: 10px; left: 10px;">Print Trial Balance</button>
                    </div>
                </div>
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
        $(document).ready(function () {
            $('table tr td:not(:last-child)').click(function () {
                window.location = $(this).parent().attr('href');
                return false;
            });

        });
    </script>
@stop
