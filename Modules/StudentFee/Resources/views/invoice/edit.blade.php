@extends('account')

@section('title', get_school_info('site_title').' | Edit Invoice')

@section('Body')
    <div class="container-fluid">
        <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/invoices/'.$invoice->invoice_id)}}" method="post"
              enctype="multipart/form-data">
            @method('PUT')
            <div class="row">
                <div class="col-md-12">

                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text col-md-12">
                                <h4 class="card-title">Edit Invoice</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2" data-size="13" id="classroom" name="classroom_id"
                                                data-style="select-with-transition" title="Select Classroom"
                                                required="true" readonly="true">

                                            @foreach($classrooms as $classroom)
                                                @if($invoice->classroom_id==$classroom->id)
                                                    <option value="{{$classroom->id}}"
                                                            selected>{{$classroom->class_name}}</option>
                                                    @continue;
                                                @endif
                                                <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2" data-size="7" id="section" name="section_id"
                                                data-style="select-with-transition" title="Select Section"
                                                required="true" readonly="true">
                                            <option value="{{$invoice->section_id}}"
                                                    selected>{{$invoice->name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="select2" data-size="7" id="student" name="student_id"
                                                data-style="select-with-transition" title="Select Student"
                                                required="true" readonly="true">
                                            <option selected
                                                    value="{{$invoice->student_id}}">{{$invoice->first_name}} {{$invoice->middle_name}} {{$invoice->last_name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title(*)</label>
                                        <input class="form-control" value="{{ $invoice->title }}"
                                               type="text" maxlength="25" name="title"
                                               required="true"/>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input class="form-control datepicker" type="text"
                                               name="due_date"
                                               maxlength="10" placeholder="Due Date(*)"
                                               value="{{$invoice->due_date}}" required="true"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <input class="form-control" value="{{ $invoice->description }}"
                                               type="text" maxlength="250" name="description"
                                               title="Any Information about Fee "/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Total Rs. (*)</label>
                                        <input id="total" class="form-control" value="{{$invoice->total}}"
                                               type="text" maxlength="6" name="total"
                                               title="Total Payment " required readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <select class="select2" data-size="13" name="paid"
                                                data-style="select-with-transition" title="Payment Status"
                                                required="true">
                                            <option disabled selected>Payment Status</option>
                                            @if($invoice->paid=="0")
                                                <option value="0" selected>Unpaid</option>
                                                <option value="1">Paid</option>
                                            @else
                                                <option value="1" selected>Paid</option>
                                                <option value="0">Unpaid</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon col-sm-12">
                                                <i class="material-icons">assignment</i>Fee Type Detail
                                                <input id="add-item-row" type="button"
                                                       class="btn btn-round btn-primary mr-2 float-right"
                                                       value="Add Row"> </input>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <div class="material-datatables">
                                                <table id="datatable"
                                                       class="table table-striped table-no-bordered table-hover"
                                                       cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Fee Type</th>
                                                        <th>Amount Rs.</th>
                                                        <th>Discount Rs.</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Fee Type</th>
                                                        <th>Amount Rs.</th>
                                                        <th>Discount Rs.</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody id="invoice">
                                                    @foreach($invoiceItems as $item)
                                                        <tr>
                                                            <td>
                                                                {!! get_fee_type_select('select2',$item->fee_id) !!}
                                                            </td>
                                                            <td>
                                                                <input class="form-control amount"
                                                                       value="{{ $item->amount }}"
                                                                       type="text" maxlength="6" name="amount[]"
                                                                       title="Total Payment " required
                                                                       placeholder="Enter Fee Amount in Nepali Rs. (*)"/>
                                                            </td>
                                                            <td>
                                                                <input class="form-control discount" value="{{$item->discount}}"
                                                                       type="text" maxlength="6" name="discount[]"
                                                                       title="Total Payment" required
                                                                       placeholder="Enter Discount Amount in Nepali Rs. (if any)"/>
                                                            </td>
                                                            <td>
                                                                <input class="form-control total" readonly
                                                                       type="text" value="{{$item->amount-$item->discount}}" name="subtotal Rs."
                                                                       title="Sub Total Payment"/>
                                                            </td>

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
                            </div>
                            <div class="row">
                                <label class="col-sm-10 col-form-label"></label>
                                <input type="submit" class="btn btn-primary btn-round  "
                                       value="Edit Invoice">
                                </input>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end col-md-12 -->
            </div>

            {{csrf_field()}}
        </form>

        <table style="display:none;">
            <tr id="fee_row">
                <td>
                    {!! get_fee_type_select('select2') !!}
                </td>
                <td>
                    <input class="form-control amount" value="{{ old('amount') }}"
                           type="text" maxlength="6" name="amount[]"
                           title="Total Payment " required placeholder="Enter Fee Amount in Nepali Rs. (*)"/>
                </td>
                <td>
                    <input class="form-control discount" value="0.00"
                           type="text" maxlength="6" name="discount[]"
                           title="Total Payment" required placeholder="Enter Discount Amount in Nepali Rs. (if any)"/>
                </td>
                <td>
                    <input class="form-control total" readonly
                           type="text" value="0.00" name="subtotal Rs."
                           title="Sub Total Payment"/>
                </td>
            </tr>
        </table>
        <!-- end row -->
    </div>
    </div>
@stop

@section('script')
    {{--Dependent Select Options for student--}}
    <script>
        $(document).ready(function () {

            $('#classroom').change(function () {
                // alert("vayo");

                $("#section option").remove();
                $("#section")
                    .selectpicker('refresh');

                $("#student option").remove();
                $("#student")
                    .selectpicker('refresh');

                var ClassroomId = $(this).val();
                // alert(ClassroomId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('getsection')}}",
                    method: "POST",
                    data: {"classroom_id": ClassroomId},
                    success: function (data1) {
                        // alert("hell yeah");

                        $('#section')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Section"));


                        $.each(data1, function (key, value) {
                            $('#section')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.name));
                        });

                        $("#section")
                            .selectpicker('refresh');

                        $('#student')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Student"));

                        $("#student")
                            .selectpicker('refresh');
                    }
                })

            });

            $('#section').change(function () {
                // alert("section change vayo vayo");

                $("#student option").remove();
                $("#student")
                    .selectpicker('refresh');

                var SectionId = $(this).val();
                // alert(ClassroomId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('get_student')}}",
                    method: "POST",
                    data: {"section_id": SectionId},
                    success: function (data2) {
                        $('#student')
                            .append($("<option selected disabled></option>")
                                .attr("value", "")
                                .text(" Choose Student"));
                        $('#student')
                            .append($("<option value='all'></option>")
                                .attr("value", "all")
                                .text(" All Student"));


                        $.each(data2, function (key, value) {
                            $('#student')
                                .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.first_name + " " + value.last_name));
                        });

                        $("#student")
                            .selectpicker('refresh');
                    }
                })

            });
        });
    </script>
    {{--Dependent Select Options for student--}}

    {{--Calculating Total Fees--}}
    <script>
        $(document).on('click', '#add-item-row', function () {
            // alert('clicked');
            var row = $("#fee_row").clone();
            $(row).removeAttr("id");
            // $(row).find('select').select2();
            $("#invoice").append(row);
        });

        $(document).on('keyup', '.amount,.discount', function () {
            var amount = parseFloat($(this).closest("tr").find(".amount").val());
            $(this).closest("tr").find(".total").val(amount);
            var discount = parseFloat($(this).closest("tr").find(".discount").val());
            $(this).closest("tr").find(".total").val(amount - discount);

            //Show Total Amount
            var total = 0;
            jQuery("#invoice > tr").each(function () {
                var sub_total = parseFloat($(this).find(".total").val());
                total += sub_total;
            });

            $("#total").val(total);
        });
    </script>
    {{--Calculating Total Fees--}}
@stop

