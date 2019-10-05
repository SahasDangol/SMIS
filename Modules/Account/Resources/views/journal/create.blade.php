@extends('account')

@section('title', get_school_info('site_title').' | Generate Journal')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/journals/')}}" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">
                                    <center>New Journal</center>
                                </h4>

                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card" id="div1">

                                        <div class="card-body">
                                            <div class="toolbar">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group ml-1">
                                                            <label class="bmd-label-floating">Date</label>
                                                            <input class="form-control datepicker" type="text"
                                                                   name="date"
                                                                   maxlength="10" placeholder="Due Date(*)"
                                                                   value="{{get_nepali_date(date('Y-m-d'))}}" required="true"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7"></div>
                                                    <div class="col-sm-3">
                                                        <input id="add-item-row" type="button"
                                                               class="btn btn-round btn-outline-primary mr-1 float-right"
                                                               value="Add Row"> </input>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="material-datatables">
                                                <table id="datatable"
                                                       class="table table-striped table-bordered table-hover"
                                                       cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th><b>To / By</b></th>
                                                        <th><b>Description</b></th>
                                                        <th><b>Debit</b></th>
                                                        <th><b>Credit</b></th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="2"></th>
                                                        <th>Total Debit
                                                            <input class="form-control" readonly id="total_debit"
                                                                   type="text" value="0.00" name="total_debit"
                                                                   title="Total Debit" required/></th>
                                                        <th>Total Credit
                                                            <input class="form-control total" readonly id="total_credit"
                                                                   type="text" value="0.00" name="total_credit"
                                                                   title="Total Credit" required/></th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody id="invoice">
                                                    <tr>
                                                        <td>
                                                            <select class="to_by select2" required>
                                                                <option value="to">To</option>
                                                                <option value="by" selected>By</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-sm-8">{!! get_ledger_list_select('select2') !!}</div>
                                                                <div class="sm-2">
                                                                    <a class="btn btn-round btn-sm btn-outline-primary"
                                                                       data-toggle="modal"
                                                                       data-target="#payee_payer">Quick Add
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input class="form-control debit payment" value="0"
                                                                   type="number" step="any" name="debit[]"
                                                                   title="Debit Amount" required
                                                                   placeholder="Debit Amount"/>
                                                        </td>
                                                        <td>
                                                            <input class="form-control credit payment" value="0"
                                                                   type="number" step="any"  name="credit[]"
                                                                   title="Credit Amount" required
                                                                   placeholder="Credit Amount" readonly/>

                                                            <input class="form-control cr_dr" value="dr"
                                                                   type="hidden" maxlength="2" name="cr_dr[]"
                                                                   title="Account Status" required
                                                                   readonly/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="to_by select2" required>
                                                                <option value="to" selected>To</option>
                                                                <option value="by">By</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-sm-8">{!! get_ledger_list_select('select2') !!}</div>
                                                                <div class="sm-2">
                                                                    <a class="btn btn-round btn-sm btn-outline-primary"
                                                                       data-toggle="modal"
                                                                       data-target="#payee_payer">Quick Add
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input class="form-control debit payment" value="0"
                                                                   type="number" step="any"  name="debit[]"
                                                                   title="Debit Amount" required
                                                                   placeholder="Debit Amount" readonly/>
                                                        </td>
                                                        <td>
                                                            <input class="form-control credit payment" value="0"
                                                                   type="number" step="any"  name="credit[]"
                                                                   title="Credit Amount" required
                                                                   placeholder="Credit Amount"/>

                                                            <input class="form-control cr_dr" value="cr"
                                                                   type="hidden" maxlength="2" name="cr_dr[]"
                                                                   title="Account Status" required
                                                                   readonly/>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end content-->
                                            </div>
                                            <!--  end card  -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Narration</label>
                                                <input class="form-control" value="{{ old('narration') }}"
                                                       type="text" maxlength="250" name="narration"
                                                       title="Any Information Journal Entry "/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-10 col-form-label"></label>
                                        <input type="submit" class="btn btn-primary btn-round float-right mr-1"
                                               value="Save Journal" onclick="check()">
                                        </input>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>

        {{--Quick Add Ledegr--}}
        <div class="modal fade" id="payee_payer" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: rgba(0,0,0,0.5);">
                    <div class="modal-body">
                        <button type="button" class="close btn btn-round btn-primary float-left" data-dismiss="modal"
                                aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Ledger (Quick)</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input id="ledger_name" class="form-control" value="{{ old('name') }}"
                                                   type="text"
                                                   maxlength="100" name="name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Alias</label>
                                            <input id="ledger_alias" class="form-control" value="{{ old('alias') }}"
                                                   type="text"
                                                   maxlength="100" name="alias" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select id="group" class="select2 group" data-size="7" name="under"
                                                    data-style="select-with-transition" title="type"
                                                    required="true">
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-7 col-form-label"></label>
                                    <button class="btn btn-outline-primary btn-round float-right mr-1"
                                            onclick="add_ledger()">
                                        Add New Ledger
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Quick Add Ledegr--}}

        <table style="display:none;">
            <tr id="fee_row">
                <td>
                    {!! get_to_by_select('') !!}
                </td>
                <td>
                    <div class="row">
                        <div class="col-sm-8">{!! get_ledger_list_select('') !!}</div>
                        <div class="sm-2">
                            <a class="btn btn-round btn-sm btn-outline-primary"
                               data-toggle="modal"
                               data-target="#payee_payer">Quick Add
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <input class="form-control debit payment" value="0"
                           type="number" step="any"  name="debit[]"
                           title="Debit Amount" required
                           placeholder="Debit Amount" readonly/>
                </td>
                <td>
                    <input class="form-control credit payment" value="0"
                           type="number" step="any"  name="credit[]"
                           title="Credit Amount" required
                           placeholder="Credit Amount" readonly/>

                    <input class="form-control cr_dr" value="cr"
                           type="hidden" maxlength="2" name="cr_dr[]"
                           title="Account Status" required
                           />
                </td>
            </tr>
        </table>

    </div>
@stop

@section('script')
    <script>

        function add_ledger() {
            var Name = document.getElementById("ledger_name").value;
            var Alias = document.getElementById("ledger_alias").value;
            var Group = document.getElementById("group").value;

            if (Name != " " || Group != " ") {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('ledger/quick')}}",
                    method: "POST",
                    data: {"name": Name, "alias": Alias, "group": Group},
                    success: function (data1) {
                            $('.ledgers')
                                .append($("<option></option>")
                                    .attr("value", data1.id)
                                    .text(data1.name));

                    }
                })

                document.getElementById("ledger_name").value = "";
                document.getElementById("ledger_alias").value = "";
                document.getElementById("group").value = "";

                $('#payee_payer').modal('hide');
            }
        }

        function check() {
            var total_debit = document.getElementById("total_debit").value;

            var total_credit = document.getElementById("total_credit").value;

            if (parseInt(total_debit) != parseInt(total_credit)) {
                alert("Account is not balanced. Please check it once.");
                event.preventDefault();
            }
            else {
                if (parseInt(total_debit) == 0 || parseInt(total_credit) == 0) {
                    alert("Debit Amount or Credit amount can't be Zero. Please check it once.");
                    event.preventDefault();
                }
            }

        }

        {{--Adding new Row--}}
        $(document).on('click', '#add-item-row', function () {

            var row = $("#fee_row").clone();
            $(row).removeAttr("id");
            $(row).find('.to_by1').select2();
            $(row).find('.ledgers').select2();
            $("#invoice").append(row);

        });
        {{--Adding new Row--}}

        {{--Calculating Total Debit--}}
        $(document).on('keyup', '.debit', function () {

            //Show Total Amount
            var total_debit = 0;
            jQuery("#invoice > tr").each(function () {

                // $(this).closest("tr").find(".debit").attr('disabled','disabled');

                var sub_debit = parseFloat($(this).find(".debit").val());
                total_debit += sub_debit;
            });

            $("#total_debit").val(parseFloat(total_debit).toFixed(2));
        });
        {{--Calculating Total Debit--}}

        {{--Calculating Total Credit--}}
        $(document).on('keyup', '.credit', function () {
            //Show Total Amount
            var total_credit = 0;
            jQuery("#invoice > tr").each(function () {
                var sub_credit = parseFloat($(this).find(".credit").val());
                total_credit += sub_credit;

                // $(this).closest("tr").find(".debit").attr('disabled','disabled');

            });

            $("#total_credit").val(parseFloat(total_credit).toFixed(2));
        });
        {{--Calculating Total Credit--}}

        {{--Disabling According to By/To--}}
        $(document).on('change', '.to_by', function () {

            var Type = $(this).closest("tr").find(".to_by").val();

            if (Type === "by") {
                event.preventDefault();
                $(this).closest("tr").find(".credit").attr('readonly','true').val(0).keyup();
                $(this).closest("tr").find(".debit").removeAttr('readonly');
                $(this).closest("tr").find(".cr_dr").val('dr');
            }
            else {
                event.preventDefault();

                $(this).closest("tr").find(".debit").attr('readonly','true').val(0).keyup();
                $(this).closest("tr").find(".credit").removeAttr('readonly');
                $(this).closest("tr").find(".cr_dr").val('cr');
            }

        });

        $(document).on('change', '.to_by1', function () {
            var Type1 = $(this).closest("tr").find(".to_by1").val();
            if (Type1 === "By") {
                event.preventDefault();
                $(this).closest("tr").find(".debit").removeAttr('readonly');
                $(this).closest("tr").find(".credit").attr('readonly', 'true').val(0).keyup();
                $(this).closest("tr").find(".cr_dr").val('dr');
            }
            else {
                event.preventDefault();
                $(this).closest("tr").find(".credit").removeAttr('readonly');
                $(this).closest("tr").find(".debit").attr('readonly', 'true').val(0).keyup();
                $(this).closest("tr").find(".cr_dr").val('cr');

            }

        });
        {{--Disabling According to By/To--}}


        /*--restrict decimal input--*/
        $(document).on('input','.payment', function() {
                this.value = this.value
                    .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
                    .replace(/(\.[\d]{2})./g, '$1');    // not more than 4 digits after decimal

            });
        /*--restrict decimal input--*/

    </script>

@stop


