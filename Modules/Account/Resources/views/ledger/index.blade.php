@extends('account')

@section('title', get_school_info('site_title').' | Ledger')
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
                        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/ledger/specific')}}"
                              method="post"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-header card-header-success card-header-icon noprint">
                                            <div class="card-icon">
                                                <i class="material-icons">assignment</i>
                                            </div>
                                            <h4 class="card-title">Ledger</h4>
                                        </div>
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
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-8">{!! get_ledger_list_select2('select2') !!}</div>
                                                <div class="sm-2">
                                                    <button class="btn btn-round btn-sm btn-outline-primary">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @csrf
                        </form>
<div class="card">
                <h4 class="text-center">
                    <center>{{get_school_info('school_name')}}</center>
                    <center>Estd. In : {{get_school_info('establish_date')}}</center>
                    <center>{{get_school_info('address')}}</center>
                    <center>{{get_nepali_date($from)}} To {{get_nepali_date($to)}}</center>
                    <center><h3>Ledger</h3></center>
                </h4>
</div>
                @foreach($lists as $list)
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text ">
                            <div class="card-text col-sm-12">
                                <h4 class="card-title ">
                                    <center>{{$list->name}}</center>
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
                                        <th><b>Voucher No.</b></th>
                                        <th><b>Date</b></th>
                                        <th><b>Description</b></th>
                                        <th><b>Narration</b></th>
                                        <th><b>Debit</b></th>
                                        <th><b>Credit</b></th>
                                    </tr>
                                    </thead>
                                    @php
                                    $ledger_data=get_ledgers($list->id,$from,$to);
                                    @endphp
                                    <tfoot>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th>Total Debit
                                            <input class="form-control" readonly id="total_debit"
                                                   type="text" value="{{$ledger_data['total_debit']}}/-"
                                                   name="total_debit"
                                                   title="Total Debit" required/></th>
                                        <th>Total Credit
                                            <input class="form-control total" readonly id="total_credit"
                                                   type="text" value="{{$ledger_data['total_credit']}}/-"
                                                   name="total_credit"
                                                   title="Total Credit" required/></th>

                                    </tr>
                                    <?php
                                    $a = $ledger_data['balance'];
                                    $b = 0;
                                    if ($a < 0) {
                                        $a = $a * (-1);
                                        $b = $a . " Cr.";
                                    } elseif ($a > 0) {
                                        $b = $a . " Dr.";
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="5"></th>
                                        <th>Balance
                                            <input class="form-control total" readonly id="total_credit"
                                                   type="text" value="{{$b}}" name="total_credit"
                                                   title="Total Credit" required/></th>
                                    </tr>
                                    </tfoot>
                                    <tbody id="invoice">
                                    @foreach($ledger_data['data'] as $data)
                                        <tr href="{{url('/journals/view_journal/'.$data->voucher_no)}}">
                                            <td>{{$data->voucher_no}}</td>
                                            <td>{{get_nepali_date($data->date)}}</td>
                                            <td>{{$data->listofledger->name}}</td>
                                            <td>{{$data->journals->narration}}</td>
                                            <td>{{$data->debit}}/-</td>
                                            <td>{{$data->credit}}/-</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <div class="col-sm-10 print-button fixed-bottom" id="buttons" style="background-color:lavender;">
                            <button class="btn btn-sm btn-outline-primary btn-round " onclick="javascript:window.print()" id="btnPrint">Print Ledger</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('includes.advancedOption')

    </div>

@stop
@section('script')
    <script>
        $(".ledgers").select2({
            placeholder: "Search One Ledger",
            allowClear: true,
        });

        $(document).ready(function () {
            $('table tr td:not(:last-child)').click(function () {
                window.location = $(this).parent().attr('href');
                return false;
            });

        });
    </script>

@stop
