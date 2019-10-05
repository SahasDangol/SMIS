@extends('account')

@section('title', get_school_info('site_title').' | Daybook Detail')
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
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Day Book</h4>
                    </div>

                    <div class="card-body">
                        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/daybook')}}" method="post"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">

                                        <div class="card-body ">
                                            <br>
                                            <div class="row">
                                                <label class="col-sm-1 col-form-label"></label>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="label-info">Date From *</label>
                                                        <input name="from" type="text"
                                                               value=""
                                                               class="form-control datepicker" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="label-info">Date To *</label>
                                                        <input name="to" type="text"
                                                               value=""
                                                               class="form-control datepicker" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary btn-round float-right mr-1">View
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
                            <table id="datatable"
                                   class="Table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th colspan="2"><b>Receipts</b></th>
                                    <th colspan="2"><b>Payments</b></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <th colspan="2">
                                        <table id="datatable"
                                               class="Table table-striped table-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <td>Date</td>
                                                <td>Narration</td>
                                                <td>VN</td>
                                                <td>Discount</td>
                                                <td>Amount</td>
                                            </thead>
                                            @foreach($journals->where('credit','0.00') as $journal)
                                                <tr>
                                                    <td>{{$journal->journals->date}}</td>
                                                    <td>{{$journal->journals->narration}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$journal->debit}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </th>
                                    <th colspan="2">
                                        <table id="datatable"
                                               class="Table table-striped table-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <td>Date</td>
                                            <td>Narration</td>
                                            <td>VN</td>
                                            <td>Discount</td>
                                            <td>Amount</td>
                                            </thead>
                                            @foreach($journals->where('debit','0.00') as $journal)
                                                <tr>
                                                    <td>{{$journal->journals->date}}</td>
                                                    <td>{{$journal->journals->narration}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$journal->credit}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </th>
                                </tr>
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
@section('script')
    <script>
        $(document).ready(function(){
            $('table tr td:not(:last-child)').click(function(){
                window.location = $(this).parent().attr('href');
                return false;
            });

        });
    </script>
@stop
