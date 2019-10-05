@extends('master')

@section('title', get_school_info('site_title').' | Bank Report')

@section('Body')
    <div class="container-fluid br-mainpanel">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/report/bank')}}" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">Select Information</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <select class="select2" data-size="8" id="classroom" name="bank_id"
                                                data-style="select-with-transition" title="Select Bank"
                                                required="true">
                                            <option disabled selected>Select Bank</option>
                                            @foreach($banks as $bank)
                                                <option value="{{$bank->id}}"
                                                        @if( !empty($bank_id) )
                                                        @if($bank->id==$bank_id) selected @endif
                                                        @endif>{{$bank->bank_name}}({{$bank->account_no}})
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-round float-right mr-1">View
                                            Report
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>

        @if($statements)
            <div class="card">
                <div class="card-body">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h6 class="title"><b>{{get_school_info('school_name')}}</b>
                            </h6>
                            <hr>
                            <div class="text-center">
                                <div class="col-md-12 ">
                                    <div class="wizard-container">
                                        <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                            <div class="wizard-navigation">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#info"
                                                           aria-expanded="false">Bank Balance</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#transactions"
                                                           aria-expanded="false">Transactions</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#chart"
                                                           aria-expanded="false">Chart</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div id="info" class="tab-pane active">
                                                        <table class="table table-custom" width="100%">
                                                            <tbody>
                                                            <br>
                                                            <br>
                                                            <hr>
                                                            <tr>
                                                                <td class="text-center"><b>Bank Name : </b></td>
                                                                <td>{{ucfirst($bank_name->bank_name)}}
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Bank Account No. : </b></td>
                                                                <td>{{ucfirst($bank_name->account_no)}}</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><b>Balance : </b></td>
                                                                <td>Rs. {{$bank_name->balance}}/-</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="transactions" class="tab-pane">
                                                        <table class="table table-custom" width="100%">
                                                            <thead>
                                                            <th><b>Date</b></th>
                                                            <th><b>Transaction Type</b></th>
                                                            <th><b>Amount</b></th>
                                                            <th><b>Paid For</b></th>
                                                            <th><b>Payment Method</b></th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($statements as $statement)
                                                                <tr>
                                                                    <td>{{$statement->date}}</td>
                                                                    <td>
                                                                        @if($statement->trans_type=="income")
                                                                            <span class="badge badge-success">{{ucfirst($statement->trans_type)}}</span>
                                                                        @else
                                                                            <span class="badge badge-danger">{{ucfirst($statement->trans_type)}}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>Rs. {{$statement->amount}}/-</td>
                                                                    <td>
                                                                        @if($statement->trans_type=="income")
                                                                            <span class="badge badge-success">{{ucfirst($statement->chart_name)}}</span>
                                                                        @else
                                                                            <span class="badge badge-danger">{{ucfirst($statement->chart_name)}}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge badge-info">{{ucfirst($statement->payment_method)}}</span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="chart" class="tab-pane justify-content-center">
                                                        <div  id="container1" style="height: 400px; width:1000%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-profile">
                                <div class="card-body">
                                    <h6 class="title"><b>{{get_school_info('school_name')}}</b>
                                    </h6>
                                    <hr>
                                    <div class="text-center">
                                        <div class="col-md-12 ">
                                            <div class="card-title">No Data Found</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <script>
var income = {{ $income }};

// var test =undefined;
// test = income.replace("&#039;", "abc", "g") // String
// income = income.replace(/&#039;/g, '\\"');
// alert(income);
//                 console.log(income);

            </script>
    </div>

            @stop
        @section('script')

            <script>

                $(document).ready(function() {
                    // Initialise the admin graphs
                    transactions.transation_init();
                });
            </script>


@stop

