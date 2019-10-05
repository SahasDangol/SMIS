@extends('account')

@section('title', get_school_info('site_title').' | Collect Fee')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <h4 class="card-title">Student Payment History of Roll No. <b>{{$roll_no}}</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="material-datatables">
                            <table id="remainig_payment_datatable"
                                   class="Table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Invoice Id</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Total Due</th>
                                    <th>Paid</th>
                                    <th>Remaining Due</th>
                                    <th>Payment History</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->invoice_id}}</td>
                                        <td>{{$invoice->date}}</td>
                                        <td>
                                            <table>
                                                @foreach($invoice->invoice_items as $invoice_item)
                                                    <tr>
                                                        {{$invoice_item->title}}
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td>{{$invoice->total}}/-</td>
                                        <td>{{$invoice->paid}}/-</td>
                                        <td>Rs.{{$invoice->balance}}/-</td>
                                        <td>
                                            @php
                                                $history=get_payment_history($invoice->invoice_id);
                                            @endphp
                                            @if(count($history))
                                                <table id="remainig_payment_datatable"
                                                       class="Table table-striped table-no-bordered table-hover"
                                                       cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($history as $list)
                                                        <tr>
                                                            <td>{{$list->date}}</td>
                                                            <td>{{$list->amount}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if($invoice->paid_status==0)
                                                <span class="badge badge-danger">Unpaid</span>
                                            @else
                                                <span class="badge badge-success">paid</span>
                                            @endif </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>

            <div class="col-md-4">
                <div class="card ">
                    <div class="card-body ">
                        <form method="post" action="{{url('/payment/student')}}">
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Enter Another Roll No.</label>
                                        <input id="p_p_name" class="form-control" value="{{$roll_no }}"
                                               type="text"
                                               maxlength="100" name="roll_no" required="true"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Search
                                    </button>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-header card-header-success card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Payment
                                Details</h4>
                        </div>
                    </div>
                    <form action="{{url('payment/student/'.$student_id)}}" method="post">
                        @csrf
                    <div class="card-body ">
                        <div class="row">
                            <label class="col-sm-1 col-form-label"></label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="bmd">Payment
                                        Date</label>
                                    <input class="form-control"
                                           id="roll_no"
                                           type="hidden"
                                           name="url"
                                           maxlength="10"
                                           value="{{$roll_no}}"
                                           required="true"/>
                                    <input class="form-control datepicker"
                                           type="text"
                                           name="date"
                                           maxlength="10"
                                           placeholder="MM/DD/YYYY"
                                           value="{{date('Y-m-d')}}"
                                           required="true" id="date"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Total
                                        Dues (in Rs.)</label>
                                    <input id="remaining"
                                           name="due"
                                           class="form-control"
                                           value="{{get_total_remaining_specific_student_payment($student_id)}}"
                                           type="text" maxlength="6"
                                           readonly/>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if(get_total_remaining_specific_student_payment($student_id))

                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd">Payment
                                            Amount (in Rs.)</label>
                                        <input id="total"
                                               class="form-control"
                                               value="{{get_total_remaining_specific_student_payment($student_id)}}"
                                               placeholder="Rs. 0.00/-"
                                               type="text"
                                               maxlength="6"
                                               name="received"
                                               required
                                               onkeyup="check()"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd">Remarks</label>
                                        <input id="remarks"
                                               class="form-control"
                                               type="text"
                                               name="remarks"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-8 col-form-label"></label>
                                <button id="pay"
                                        class="btn btn-primary btn-round float-right mr-1">
                                    Pay
                                </button>
                            </div>

                        @endif
                    </div>
                    </form>
                </div>

            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->

        @include('includes.advancedOption')


    </div>

@stop

@section('script')
    <script>
        function check() {

            var payable = document.getElementById("total").value;

            var remaining = document.getElementById("remaining").value;

            if (parseInt(payable) > parseInt(remaining)) {
                alert("Payment amount is too big than a amount to be Paid...");
                event.preventDefault();
            }
        }

        function check1() {

            var payable = document.getElementById("total").value;

            var remaining = document.getElementById("remaining").value;

            if (parseInt(payable) > parseInt(remaining)) {
                alert("Payment amount is too big than a amount to be Paid...");
                event.preventDefault();
            }
            else {

                document.getElementById('pay').style.display='none';
                var Roll_No = document.getElementById("roll_no").value;
                var Date = document.getElementById("date").value;
                var Remarks = document.getElementById("remarks").value;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // url:"/gadmin/dynamic_dependent/fetch",
                    url: "{{url('payment/student/'.$student_id)}}",
                    method: "POST",
                    data: {"roll_no": Roll_No, "date": Date, "due": remaining, "received": payable, "remarks": Remarks},
                    success: function (data1) {

                        // alert(data1);
                        // window.location.reload();
                        // window.location=data1;
                        // setTimeout("location.reload(true);", 200);
                        window.location.replace(data1);

                    }
                })
            }
        }


        function printFrame(link, frame) {
            $("<iframe>")
                .attr("hidden", "true")
                .attr("src", link)
                .attr("name", frame)
                .appendTo("body");
            $(document).ready(function () {
                frames[frame].focus();
                frames[frame].print();
            });
        }

        $(document).ready(function () {
            $('#remainig_payment_datatable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>


@stop

