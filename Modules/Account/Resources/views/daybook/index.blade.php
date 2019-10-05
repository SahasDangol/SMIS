@extends('account')

@section('title', get_school_info('site_title').' | Daybook Detail')
@section('head')
    <style>
        table tr {
            cursor: pointer;
        }    </style>
    <link rel="stylesheet" type="text/css" href="{{url('public/css/print.css')}}" media="print"/>
    <style>

        @media print {
            .noprint, .alert,.no-print * {
                display: none !important;
            }

        }
    </style>
@stop
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon noprint">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Day Book</h4>
                    </div>

                    <div class="card-body ">
                        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/daybook')}}" method="post"
                              enctype="multipart/form-data">
                            <div class="row noprint">
                                <div class="col-md-12">
                                    <div class="card ">

                                        <div class="card-body ">
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
                        <div class="material-datatables">
                            <h4 class="text-center">
                                <center>{{get_school_info('school_name')}}</center>
                                <center>Estd. In : {{get_school_info('establish_date')}}</center>
                                <center>{{get_school_info('address')}}</center>
                                <center>{{get_nepali_date($from)}} To {{get_nepali_date($to)}}</center>
                                <center><h3>Daybook</h3></center>
                            </h4>
                            <table id="account_datatable"
                                   class="Table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>

                                    <th><b>Journal No.</b></th>
                                    {{--<th><b>Fiscal Year</b></th>--}}
                                    <th><b>Date</b></th>

                                    <th><b>Narration</b></th>
                                    <th><b>Amount</b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($daybooks!=null)
                                    @foreach($daybooks as $journal)

                                        <tr href="{{url('journals/view_journal/'.$journal->id)}}">
                                            <td>{{$journal->id}}</td>
                                            <td>{{get_nepali_date($journal->date)}}</td>
                                            <td>{{$journal->narration}}</td>
                                            <td>{{$journal->total_debit}}</td>
                                        </tr>


                                    @endforeach
                                @else

                                    <td colspan="10"><h3 class="text-center">No Transactions on this date</h3>
                                    </td>

                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
                <div class="col-sm-10 print-button fixed-bottom" id="buttons" style="background-color:lavender;">
                    <button class="btn btn-sm btn-outline-primary btn-round " onclick="javascript:window.print()" id="btnPrint">Print DayBook</button>
                </div>
            </div>

            <!-- end col-md-12 -->
        </div>
        <!-- end row -->



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
