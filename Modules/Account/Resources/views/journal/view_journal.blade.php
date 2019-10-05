@extends('account')

@section('title', get_school_info('site_title').' | View Journal')

@section('Body')
    <div class="container-fluid">

        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/journals/'.$journal->id)}}" method="post"

              enctype="multipart/form-data">
            @method('PUT')
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title"><center>View Journal No. {{$journal->id}}</center></h4>

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
                                                                  readonly value="{{get_nepali_date($journal->date)}}" required="true"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7"></div>
                                                    {{--<div class="col-sm-3">--}}
                                                        {{--<input id="add-item-row" type="button"--}}
                                                               {{--class="btn btn-round btn-outline-primary mr-1 float-right"--}}
                                                               {{--value="Add Row"> </input>--}}
                                                    {{--</div>--}}
                                                </div>

                                            </div>
                                            <div class="material-datatables">
                                                <table id="datatable"
                                                       class="table table-striped table-bordered table-hover"
                                                       readonly  cellspacing="0" width="100%" style="width:100%">
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
                                                                   type="text" value="{{$journal->total_debit}}"
                                                                   name="total_debit"
                                                                   readonly   title="Total Debit" required/></th>
                                                        <th>Total Credit
                                                            <input class="form-control total" readonly id="total_credit"
                                                                   type="text" value="{{$journal->total_credit}}"
                                                                   name="total_credit"
                                                                   readonly  title="Total Credit" required/></th>

                                                    </tr>
                                                    </tfoot>
                                                    <tbody id="invoice">

                                                    @foreach($journalitems as $journalitem)
                                                        <tr>
                                                            <td>
                                                                {!! get_to_by_select('to_by',$journalitem->cr_dr) !!}
                                                            </td>



                                                            <td>{!! get_ledger_list_select('selectpicker',$journalitem->ledger_id) !!}</td>

                                                            <td>
                                                                <input class="form-control debit"
                                                                       value="{{$journalitem->debit}}"
                                                                       type="text" maxlength="6" name="debit[]"
                                                                       title="Debit Amount" required
                                                                       readonly    placeholder="Debit Amount"
                                                                       @if($journalitem->cr_dr=="cr")
                                                                       readonly
                                                                        @endif
                                                                />
                                                            </td>
                                                            <td>
                                                                <input class="form-control credit"
                                                                       value="{{$journalitem->credit}}"
                                                                       type="text" maxlength="6" name="credit[]"
                                                                       title="Credit Amount" required
                                                                       readonly  placeholder="Credit Amount"
                                                                       @if($journalitem->cr_dr=="dr")
                                                                       readonly
                                                                        @endif
                                                                />
                                                                @if($journalitem->cr_dr=="dr")
                                                                    <input class="form-control cr_dr" value="dr"
                                                                           type="hidden" maxlength="2" name="cr_dr[]"
                                                                           title="Account Status" required
                                                                           readonly/>
                                                                @else
                                                                    <input class="form-control cr_dr" value="cr"
                                                                           type="hidden" maxlength="2" name="cr_dr[]"
                                                                           title="Account Status" required
                                                                           readonly/>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

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
                                                <input class="form-control" value="{{ $journal->narration }}"
                                                       type="text" maxlength="250" name="narration"
                                                       readonly   title="Any Information Journal Entry "/>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="row">--}}
                                        {{--<label class="col-sm-10 col-form-label"></label>--}}
                                        {{--<input type="submit" class="btn btn-primary btn-round float-right mr-1"--}}
                                               {{--value="Save Journal" onclick="check()">--}}
                                        {{--</input>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                        </div>
                        <!-- end col-md-12 -->
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>

        <table style="display:none;">
            <tr id="fee_row">
                <td>
                    {!! get_to_by_select() !!}
                </td>
                <td>
                    {!! get_ledger_list_select('select2') !!}
                </td>
                <td>
                    <input class="form-control debit" value="0"
                           type="text" maxlength="6" name="debit[]"
                           title="Debit Amount" required placeholder="Debit Amount" readonly/>
                </td>
                <td>
                    <input class="form-control credit" value="0"
                           type="text" maxlength="6" name="credit[]"
                           title="Credit Amount" required placeholder="Credit Amount" readonly/>

                    <input class="form-control cr_dr" value=""
                           type="hidden" maxlength="2" name="cr_dr[]"
                           title="Account Status" required
                           readonly/>
                </td>
            </tr>
        </table>

    </div>
@stop

@section('script')
    <script>

        $(".to_by").select2({
            placeholder: "Select One",
            allowClear: true,
disabled:true

        });



        $(".selectpicker").select2({
            placeholder: "Select One",
            allowClear: true,
            disabled:true
        });

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
            // $(row).find('select').select2();
            $(row).find('.to_by1').select2();

            $(row).find('select').select2();

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

            $("#total_debit").val(total_debit);
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

            $("#total_credit").val(total_credit);
        });
        {{--Calculating Total Credit--}}

        {{--Disabling According to By/To--}}
        $(document).on('change', '.to_by', function () {

            var Type = $(this).closest("tr").find(".to_by").val();

            if (Type == "by") {
                event.preventDefault();
                $(this).closest("tr").find(".credit").attr('readonly', 'true');
                $(this).closest("tr").find(".debit").removeAttr('readonly');
                $(this).closest("tr").find(".cr_dr").val('dr');
            }
            else {
                event.preventDefault();

                $(this).closest("tr").find(".debit").attr('readonly', 'true');
                $(this).closest("tr").find(".credit").removeAttr('readonly');
                $(this).closest("tr").find(".cr_dr").val('cr');
            }
            // alert(Type1);
        });

        $(document).on('change', '.to_by1', function () {
            var Type1 = $(this).closest("tr").find(".to_by1").val();

            // alert(Type);

            if (Type1 == "By") {
                event.preventDefault();
                $(this).closest("tr").find(".debit").removeAttr('readonly');
                $(this).closest("tr").find(".credit").attr('readonly', 'true');
                $(this).closest("tr").find(".cr_dr").val('dr');
            }
            else {
                event.preventDefault();
                $(this).closest("tr").find(".credit").removeAttr('readonly');
                $(this).closest("tr").find(".debit").attr('readonly', 'true');
                $(this).closest("tr").find(".cr_dr").val('cr');

            }

        });
        {{--Disabling According to By/To--}}

    </script>

@stop


