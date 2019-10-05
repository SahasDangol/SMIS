@extends('account')

@section('title', get_school_info('site_title').' | Ledger')
@section('head')
    <style>
        table tr {
            cursor: pointer;
        }    </style>
@stop
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                    <tfoot>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th>Total Debit
                                            <input class="form-control" readonly id="total_debit"
                                                   type="text" value="{{get_ledgers($list->id)['total_debit']}}/-"
                                                   name="total_debit"
                                                   title="Total Debit" required/></th>
                                        <th>Total Credit
                                            <input class="form-control total" readonly id="total_credit"
                                                   type="text" value="{{get_ledgers($list->id)['total_credit']}}/-"
                                                   name="total_credit"
                                                   title="Total Credit" required/></th>

                                    </tr>
                                    <?php
                                    $a = get_ledgers($list->id)['balance'];
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
                                    @foreach(get_ledgers($list->id)['data'] as $data)
                                        <tr href="{{url('/journals/view_journal/'.$data->voucher_no)}}">
                                            <td>{{$data->voucher_no}}</td>
                                            <td>{{$data->date}}</td>
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
                    </div>

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
