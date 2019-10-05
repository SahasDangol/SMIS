@extends('account')

@section('title', get_school_info('site_title').' | Edit Ledger')

@section('Body')
    <div class="container-fluid">
        <div class="row">
            {{--@can('classroom-create')--}}
            <div class="col-md-4">
                <form id="TypeValidation" class="form-horizontal process" action="{{route('ledgerlist.update',$ledger->id)}}"
                      method="post">
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-success card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Edit Ledger</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <br>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input class="form-control" value="{{$ledger->name }}" type="text"
                                               maxlength="100" name="name" required="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Alias</label>
                                        <input class="form-control" value="{{ $ledger->alias }}" type="text"
                                               maxlength="100" name="alias"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="form-check">


                                        <div class="row" >
                                            <label class="col-sm-1 col-form-label"></label>
                                            <div class="col-lg-5 col-md-6 col-sm-10">
                                                <select class="select2" data-size="7" name="under"
                                                        id="spin"  data-style="select-with-transition"
                                                        required="true">
                                                    <option disabled selected>Select Ledger Group</option>
                                                    @foreach($groups as $group)
                                                        <option value="{{$group->id}}"
                                                                @if($group->id==$ledger->under)
                                                                selected
                                                                @endif
                                                                >{{$group->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{--<span class="form-check-sign">--}}
                                        {{--<span class="check"></span>--}}
                                        {{--</span>--}}
                                        {{--</label>--}}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-sm-5 col-form-label"></label>
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    Update Ledger
                                </button>
                            </div>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
            <div class="col-md-8">
                {{--@endcan--}}
                {{--@cannot('classroom-create')--}}
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Ledger Detail</h4>

                        </div>
                        <div class="card-body">
                            <div class="material-datatables">
                                <div class="toolbar">

                                </div>
                                <table id="datatables"
                                       class="table display  table-striped table-no-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Ledger Name</th>
                                        <th>Alias</th>
                                        <th>Under</th>
                                        {{--@can('classroom-edit')--}}
                                        <th class="disabled-sorting text-right">Actions</th>
                                        {{--@elsecan('classroom-delete')--}}
                                        {{--<th class="disabled-sorting text-right">Actions</th>--}}
                                        {{--@endcan--}}
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Ledger Name</th>
                                        <th>Alias</th>
                                        <th>Under</th>
                                        {{--@can('classroom-edit')--}}
                                        <th class="disabled-sorting text-right">Actions</th>
                                        {{--@elsecan('classroom-delete')--}}
                                        {{--<th class="disabled-sorting text-right">Actions</th>--}}
                                        {{--@endcan--}}
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($lists as $list)
                                        @if($list->status==1)
                                        <tr>
                                            <td>{{$list->name}}</td>

                                            @if($list->alias!="")
                                                <td>{{$list->alias}}</td>
                                            @else
                                                <td>N/A</td>
                                            @endif
                                            <td>
                                                @foreach($groups as $group)
                                                @if ($list->under==$group->id)
                                                    {{$group->name}}

                                                @endif
                                                    @endforeach
                                            </td>
                                            <td class="text-right">
                                                {{--@can('classroom-edit')--}}
                                                <a href="{{route('ledgerlist.edit',[$list->id])}}"
                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                            title="Edit"   class="material-icons">dvr</i></a>
                                                {{--@endcan--}}
                                                {{--@can('classroom-delete')--}}
                                                <a href="#" onclick="
                                                        on(); if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$list->id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }"
                                                   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                            title="Delete"    class="material-icons">close</i>
                                                </a>
                                                <form method="post"
                                                      action="{{route('ledgerlist.destroy',$list->id)}} "
                                                      id="delete-form-{{$list->id}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                </form>
                                                {{--@endcan--}}
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
            <!-- end row -->
        </div>
        {{--@include('includes.advancedOption')--}}
    </div>
@stop
