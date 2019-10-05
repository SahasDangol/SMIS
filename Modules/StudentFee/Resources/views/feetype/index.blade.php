@extends('account')

@section('title', get_school_info('site_title').' | Fee Type Detail')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('studentfee-create')
            {{--Start Of Add Detail--}}
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/feetypes/')}}" method="post"
                          enctype="multipart/form-data">
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">New Fee Type</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="" placeholder="Fee Type Code" type="text"
                                                   maxlength="100" name="fee_code" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{ old('fee_title') }}"
                                                   placeholder="Fee Title" type="text" maxlength="100" name="fee_title"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <select class="fee_type select2" data-size="7" name="fee_type"
                                                 data-style="select-with-transition" title="{{old('fee_type')}}"
                                                 required="true">
                                            <option disabled selected>Select Fee Type</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="quarterly">Quarterly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <br> <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <select class="fee_type select2" data-size="7" name="classroom_id"
                                                 data-style="select-with-transition" title="{{old('classroom_id')}}"
                                                 required="true">
                                            <option disabled selected>Select Classroom</option>
                                            @foreach($classrooms as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{ old('amount') }}"
                                                   placeholder="Amount" type="text" maxlength="6" name="amount"
                                                   required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" value="{{ old('remarks') }}"
                                                   placeholder="Note (optional)" type="text" maxlength="200"
                                                   name="remarks"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-7 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Add Fee Type
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            {{--End Of Add Detail--}}
            {{--Start Of Show Detail--}}
                <div class="col-md-8">
                    @endcan
                    @cannot('studentfee-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Fee Type Detail</h4>
                                    <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                            data-target="#noticeModal">
                                        <i class="material-icons">games</i>Advance Options
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" data-role="table" data-mode="columntoggle" class="ui-responsive"
                                               class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Fee Code</th>
                                                <th>Fee Title</th>
                                                <th>Amount</th>
                                                <th>Classroom</th>

                                                @can('studentfee-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('studentfee-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Fee Code</th>
                                                <th>Fee Type</th>
                                                <th>Amount</th>
                                                <th>Classroom</th>
                                                @can('studentfee-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('studentfee-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($feetypes as $feetype)
                                                @if($feetype->status==1)
                                                    <tr>
                                                        <td>{{$feetype->fee_code}}</td>
                                                        <td>{{ucfirst($feetype->fee_title)}}</td>
                                                        <td>Rs. {{$feetype->amount}}/-</td>
                                                        <td>
                                                            {{ucfirst($feetype->classrooms->class_name)}}
                                                        </td>
                                                        <td class="text-right">
                                                            @can('studentfee-edit')
                                                                <a href="{{url('/feetypes/'.$feetype->id.'/edit')}}"
                                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                      title="Edit"      class="material-icons">dvr</i></a>
                                                            @endcan
                                                            @can('studentfee-delete')
                                                                    <a href="#" onclick="
                                                                            if(confirm('Are You sure, You Want To Delete?'))
                                                                            {
                                                                            event.preventDefault();
                                                                            document.getElementById('delete-form-{{$feetype->id}}').submit();
                                                                            }
                                                                            else{
                                                                            event.preventDefault();
                                                                            }" class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                                title="Delete"  class="material-icons">close</i>
                                                                    </a>
                                                                    <form method="post" action="{{route('feetypes.destroy',$feetype->id)}} "
                                                                          id="delete-form-{{$feetype->id}}">
                                                                        @csrf
                                                                        {{method_field('DELETE')}}
                                                                    </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
            {{--End Of Show Detail--}}
                <!-- end row -->
        </div>
        @include('includes.advancedOption')
    </div>
@stop
@section('script')
    <script>
        $(".fee_type").select2({
            placeholder: "Select One",
            allowClear: true
        });
    </script>
@stop

