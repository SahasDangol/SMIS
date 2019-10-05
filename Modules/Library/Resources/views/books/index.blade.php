@extends('library')

@section('title', get_school_info('site_title').' | Book')
@section('head')

<style>
    table tr {
        cursor: pointer;
    }    </style>
    @stop
@section('Body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Book Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#bookModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('book-create')
                            <a href="{{url('/book/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add Book
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Book Name</th>
                                    <th>Author's Name</th>
                                    <th>Issue Status</th>

                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Book Name</th>
                                    <th>Author's Name</th>
                                    <th>Issue Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($books as $book)
                                    <tr onClick="location.href='{{route('book.show',[$book->id])}}'">
                                        <td>{{$book->id}}</td>
                                        <td>{{$book->name}}</td>
                                        <td>{{$book->author_name}}</td>
                                        <td>@if($book->issue_status==0)
                                                <font color="green">
                                                Available
                                                </font>
                                            @else
                                               <font color="red">
                                                Issued
                                               </font>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            @can('book-list')
                                                @if($book->issue_status==0)
                                                <a href="{{url('book/single_issue/'.$book->id)}}" class="btn btn-link btn-info btn-just-icon like" title="Issue Book"><i
                                                            class="material-icons">how_to_reg</i></a>
                                                @else
                                                    <a href="{{url('/book/single_return/'.$book->id)}}" class="btn btn-link btn-info btn-just-icon edit" title="Return Book"><i
                                                                class="material-icons">undo</i></a>
                                                @endif
                                                    <a href="{{route('book.show',[$book->id])}}" class="btn btn-link btn-info btn-just-icon edit" title="View Book"><i
                                                            class="material-icons">remove_red_eye</i></a>

                                                @endcan
                                            @can('book-edit')
                                                <a href="{{url('/book/'.$book->id.'/edit')}}" title="Edit"
                                                   class="btn btn-link btn-warning btn-just-icon edit"><i
                                                            class="material-icons">create</i></a>
                                            @endcan
                                            @can('book-delete')
                                                <a href="#" onclick="
                                                         if(confirm('Are You sure, You Want To Delete?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$book->id}}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault();
                                                        }" title="Delete"
                                                   class="btn btn-link btn-danger btn-just-icon remove"><i
                                                            class="material-icons">close</i>
                                                </a>
                                                <form method="post" action="{{route('book.destroy',$book->id)}} "
                                                      id="delete-form-{{$book->id}}">
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
        @include('includes.advancedOption')
    </div>
@stop



