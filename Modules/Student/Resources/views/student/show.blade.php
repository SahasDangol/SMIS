@extends('master')

@section('title', get_school_info('site_title').' | Profile')

@section('Body')
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        @if($student->personal_photo)
                        <img class="img" src="{{url('/').Storage::url($student->personal_photo)}}"/>
                            @else
                            <img class="img" src="{{asset('assets/backend/img/boy.png')}}"/>
                        @endif

                    </a>
                </div>
                <div class="card-body">
                    <h4 class="title">{{ ucfirst($student->first_name) .' '.ucfirst($student->middle_name).''.ucfirst($student->last_name) }}
                        <br>
                        <a href="{{url('/student/'.$student->id.'/edit')}}"
                           class="btn btn-primary btn-link btn-sm">Edit</a>
                    </h4>

                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5>Class<br>
                                    <small>{{ $student->classrooms->class_name}}</small>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>Section<br>
                                    <small>{{ $student->sections->name }}</small>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5>Roll No.<br>
                                    <small>{{ $student->roll_no }}</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-rose btn-round" data-toggle="collapse" data-target="#demo">Full Profile
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="wizard-container">
                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                    <div class="wizard-navigation">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab" href="#profile"
                                   aria-expanded="true">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#parent" aria-expanded="false">Parent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#invoices"
                                   aria-expanded="false">Invoices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#payments_history" aria-expanded="false">Payment
                                    History</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="profile" class="tab-pane active">
                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td><b>Roll No</b></td>

                                        <td>{{ $student->roll_no }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Date Of Birth</b></td>
                                        <td>{{ date('d M, Y', strtotime($student->dob)) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender</b></td>
                                        <td>{{ ucfirst($student->gender)  }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Blood Group</b></td>
                                        <td>{{ ucfirst($student->blood_group) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Religion</b></td>
                                        <td>{{ ucfirst($student->religion) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Contact No.</b></td>
                                        <td>{{ $student->guardians->guardian_mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Address</b></td>
                                        <td>{{ ucfirst($student->permanent_address) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nationality</b></td>
                                        <td>{{ ucfirst($student->nationality) }}</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div id="parent" class="tab-pane">
                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <tr>
                                        <td><b>Guardian's Name</b></td>
                                        <td>{{ ucfirst($student->guardians->guardian_first_name) .' '.ucfirst($student->guardians->guardian_middle_name).' '.ucfirst($student->guardians->guardian_last_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>@if($student->guardians->email==null)
                                                N/A
                                            @else
                                                {{$student->guardians->guardian_email  }}
                                            @endif
                                            </td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone</b></td>
                                        <td>@if($student->guardians->phone==null)
                                                N/A
                                            @else
                                                {{$student->guardians->guardian_phone  }}
                                            @endif
                                            </td>
                                    </tr>
                                    <tr>

                                        <td><b>Mobile</b></td>
                                        <td>{{$student->guardians->guardian_mobile}}
                                            </td>
                                    </tr>
                                    <tr>
                                        <td><b>Temporary Address</b></td>
                                        <td> @if($student->guardians->guardian_temporary_address==null)
                                                N/A
                                            @else
                                                {{ucfirst($student->guardians->guardian_temporary_address)}}
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td><b>Permanent Address</b></td>
                                        <td>{{ucfirst($student->guardians->guardian_permanent_address)}}</td>

                                    </tr>
                                    <tr>
                                        <td><b>Occupation</b></td>
                                        <td>@if($student->guardians->guardian_occupation==null)
                                                N/A
                                            @else
                                                {{$student->guardians->guardian_occupation  }}
                                            @endif
                                            </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div id="invoices" class="tab-pane">
                                <div class="material-datatables">
                                    <table id="datatables" class="dataTable table-striped table-no-bordered table-hover"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Due Date</th>
                                            <th>Title</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php $currency = get_option('currency_symbol') @endphp

                                        @foreach($invoices as $invoice)
                                            <tr>

                                                <td>{{ date('d M, Y', strtotime($invoice->due_date)) }}</td>
                                                <td style='max-width:250px;'>{{ $invoice->title }}</td>
                                                <td>{{ $currency." ".$invoice->total }}</td>
                                                <td>{{ $currency." ".$invoice->paid }}</td>
                                                <td>
                                                    {!! $invoice->status==1 ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-danger">UnPaid</span>' !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="payments_history" class="tab-pane">
                                <div class="material-datatables">
                                    <table id="datatables1"
                                           class="dataTable table-striped table-no-bordered table-hover"
                                           style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Remarks</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php $currency = get_option('currency_symbol') @endphp


                                        @if($payments_history!=null)
                                            @foreach($payments_history as $payment)


                                                <tr>
                                                    <td>{{ $payment->invoice_id}}</td>
                                                    <td>{{ date('d M, Y', strtotime($payment->date)) }}</td>

                                                    <td>{{ $currency." ".$payment->amount }}</td>
                                                    <td style='max-width:250px;'>

                                                        @if($payment->remarks==null)
                                                            N/A
                                                        @else
                                                            {{$payment->remarks}}
                                                        @endif</td>

                                                </tr>

                                            @endforeach
                                        @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    data table Payment History Tab script
    <script>
        $(document).ready(function () {
            $('#datatables1').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },

                dom: 'Blfrtip',

                extend: 'collection',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Copy</button>',
                        titleAttr: 'Copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<button class=" btn btn-primary btn-round btn-sm">CSV</button>',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Excel</button>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<button class=" btn btn-primary btn-round btn-sm">Pdf</button>',
                        titleAttr: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<button class=" btn btn-primary btn-round float-right btn-sm col-sm-12">Print</button>',
                        titleAttr: 'Print',
                        exportOptions: {
                            columns: ':visible',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    },
                    {
                        extend: 'columnsToggle',
                        // columns: 0
                    },
                ]
            });

            $('.buttons-copy').detach().appendTo('#buttons')
            $('.buttons-csv').detach().appendTo('#buttons')
            $('.buttons-excel').detach().appendTo('#buttons')
            $('.buttons-pdf').detach().appendTo('#buttons')
            $('.buttons-print').detach().appendTo('#buttons')

            $('.buttons-columnVisibility').detach().appendTo('#column')

        });
    </script>
    {{--data table script--}}
@stop
