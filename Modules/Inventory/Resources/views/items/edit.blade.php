@extends('master')

@section('title', get_school_info('site_title').' | Edit Item')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            @can('item-create')
                <div class="col-md-4">
                    <form id="TypeValidation" class="form-horizontal process" action="{{URL::to('/item/'.$item->id)}}"
                         method="post" >
                        @method("PUT")
                        <div class="card ">
                            <div class="card-header card-header-success card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Edit Item</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <br>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Name*</label>
                                            <input class="form-control" value="{{$item->name}}" type="text"
                                                   maxlength="100" name="name" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description(Optional)</label>
                                            <input class="form-control" value="{{$item->description}}" type="text"
                                                   maxlength="100" name="description" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category*</label>
                                            <input class="form-control" value="{{$item->category}}" type="text"
                                                   maxlength="100" name="category" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Current Stock*</label>
                                            <input class="form-control" value="{{$item->current_stock}}" type="number"
                                                   maxlength="1000" name="current_stock" required="true"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-5 col-form-label"></label>
                                    <button class="btn btn-primary btn-round float-right mr-1">
                                        Update Item
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="col-md-8">
                    @endcan
                    @cannot('item-create')
                        <div class="col-md-12">
                            @endcannot
                            <div class="card">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title">Item Detail</h4>
                                    <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                            data-target="#noticeModal">
                                        <i class="material-icons">games</i>Advance Options
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="material-datatables">
                                        <div class="toolbar">

                                        </div>
                                        <table id="datatables"
                                               class="table display  table-striped table-no-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Category</th>
                                                <th>Current Stock</th>
                                                @can('item-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('item-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Category</th>
                                                <th>Current Stock</th>
                                                @can('item-edit')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @elsecan('item-delete')
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                @endcan
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{ucfirst($item->name)}}</td>
                                                    <td>{{ucfirst($item->category)}}</td>
                                                    <td>{{$item->current_stock}}</td>
                                                    <td class="text-right">
                                                        @can('item-edit')
                                                            <a href="{{url('/item/'.$item->id.'/edit')}}"
                                                               class="btn btn-link btn-warning btn-just-icon edit"><i
                                                                        title="Edit" class="material-icons">dvr</i></a>
                                                        @endcan
                                                        @can('item-delete')
                                                            <a href="#" onclick="
                                                                    on(); if(confirm('Are You sure, You Want To Delete?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{$item->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"
                                                               class="btn btn-link btn-danger btn-just-icon remove"><i
                                                                        title="Delete" class="material-icons">close</i>
                                                            </a>
                                                            <form method="post"
                                                                  action="{{route('item.destroy',$item->id)}} "
                                                                  id="delete-form-{{$item->id}}">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                            </form>
                                                        @endcan
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
                        <!-- end col-md-12 -->
                </div>
                <!-- end row -->
        </div>
        @include('includes.advancedOption')
    </div>
@stop
@section('script')
    <script>
        // alert to confirm the page is loaded
        $('#myDIV').hide();

        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@stop