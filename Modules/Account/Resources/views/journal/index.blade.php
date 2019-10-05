@extends('account')

@section('title', get_school_info('site_title').' | Journal Detail')
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
                        <h4 class="card-title">Journal Entries</h4>
                    </div>

                    <div class="card-body">


                            <div class="toolbar noprint" >
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <button
                                                class="btn btn-sm btn-outline-danger btn-round float-left mr-1" onclick="unreconciliation_all()">
                                            Un-Reconciliation
                                        </button>
                                        <button
                                                class="btn btn-sm btn-outline-success btn-round float-right mr-1" onclick="reconciliation_all()">
                                            Reconciliation
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <form id="TypeValidation" class="form-horizontal process"
                                      action="{{URL::to('/journals/specific')}}" method="post"
                                      enctype="multipart/form-data">
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
                                    @csrf
                                </form>
                                <hr>
                            </div>
                        <div class="material-datatables">
                           <h4 class="text-center">
                            <center>{{get_school_info('school_name')}}</center>
                            <center>Estd. In : {{get_school_info('establish_date')}}</center>
                            <center>{{get_school_info('address')}}</center>
                            <center>{{get_nepali_date($from)}} To {{get_nepali_date($to)}}</center>
                            <center><h3>Journal Entries</h3></center>
                           </h4>
                            <table id="datatable" class="Table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Journal No.</th>
                                    <th>Fiscal Year</th>
                                    <th>Date</th>
                                    <th>Account</th>
                                    <th>Narration</th>
                                    <th class="noprint">Reconciliation</th>
                                    <th class="disabled-sorting text-right noprint">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($journals as $journal)
                                    <tr>
                                        <td>{{$journal->id}}</td>
                                        <td>{{$journal->fiscalyears->name}}</td>
                                        <td>{{get_nepali_date($journal->date)}}</td>
                                        <td>
                                            <table id="datatable" class="ui-responsive"
                                                   class=""
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead class="table-info">
                                                <tr style="height:0px;">
                                                    <th>
                                                        <small>
                                                            <center>Description</center>
                                                        </small>
                                                    </th>
                                                    <th>
                                                        <small>
                                                            <center>Debit</center>
                                                        </small>
                                                    </th>
                                                    <th>
                                                        <small>
                                                            <center>Credit</center>
                                                        </small>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th class="table-success">
                                                        <small><b>Total Debit</b></small>
                                                    </th>
                                                    <th class="table-danger">
                                                        <small><b>Total Credit</b></small>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th>
                                                        <small>{{$journal->total_debit}}</small>
                                                    </th>
                                                    <th>
                                                        <small>{{$journal->total_credit}}</small>
                                                    </th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                @foreach(get_journal_items($journal->id) as $journalItem)
                                                    <tr>
                                                        <td>{{$journalItem->listofledger->name}}<br></td>
                                                        <td>{{$journalItem->debit}}<br></td>
                                                        <td>{{$journalItem->credit}}<br></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>{{$journal->narration}}</td>
                                        <td>
                                            <div class="togglebutton noprint">
                                                <label>
                                                    Off
                                                    <input id="reconciliation" type="checkbox"
                                                           value="{{$journal->reconciliation}}"
                                                           @if($journal->reconciliation==1)
                                                           checked
                                                           @endif
                                                           onchange="update({{$journal->id}})">
                                                    <span class="toggle"></span>
                                                    On
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-right noprint">
                                            @if($journal->reconciliation==0)
                                                @can('student-list')
                                                    <a href="{{url('/journals/view_journal/'.$journal->id)}}" class="btn btn-link btn-info btn-just-icon like"><i
                                                                title="View"    class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('student-edit')
                                                    <a href="{{url('/journals/'.$journal->id.'/edit')}}"
                                                       class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                title="Edit Journal" class="material-icons">edit</i></a>
                                                @endcan
                                                @can('student-delete')
                                                    <a href="#" onclick="
                                                            on(); if(confirm('Are You sure, You Want To Delete?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$journal->id}}').submit();
                                                            }
                                                            else{
                                                            event.preventDefault();
                                                            }" class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                title="Delete" class="material-icons">close</i>
                                                    </a>
                                                    <form method="post"
                                                          action="{{route('journals.destroy',$journal->id)}} "
                                                          id="delete-form-{{$journal->id}}">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                    </form>
                                                @endcan
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- end content-->
                    <div class="col-md-1 print-button ">
                        <button class="btn btn-primary btn-round " onclick="javascript:window.print()" id="btnPrint"
                                style="position: fixed; bottom: 10px; left: 10px;">Print Journal</button>
                    </div>
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
        function update(id) {
            var Journal_Id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('journals/reconciliation')}}",
                method: "POST",
                data: {"journal_id": Journal_Id},
                success: function (data1) {
                    // alert(data1);

                    location.reload();
                }
            })
        }

        function reconciliation_all() {
            // alert('hello');
            var From=document.getElementById("from").value;
            var To=document.getElementById("to").value;
            var Type=1;
            // alert(To);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('journals/reconciliation/all')}}",
                method: "POST",
                data: {"from": From, "to":To, "type":Type},
                success: function (data1) {
                    // alert(data1);

                    location.reload();
                }
            })
        }

        function unreconciliation_all() {
            var From=document.getElementById("from").value;
            var To=document.getElementById("to").value;
            var Type=0;
            // alert(To);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('journals/reconciliation/all')}}",
                method: "POST",
                data: {"from": From, "to":To, "type":Type},
                success: function (data1) {
                    // alert(data1);

                    location.reload();
                }
            })
        }
    </script>
@stop

