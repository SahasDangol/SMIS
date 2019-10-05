@extends('library')

@section('title', get_school_info('site_title').' | Return Book')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{url('book/return')}}" method="post"
              enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Return Book</h4>
                    </div>
                </div>
                <div class="card-body ">


                <div class="card card-profile">
                    <div class="card-body">
                        <h6 class="title"><b>{{get_school_info('school_name')}}</b>
                        </h6>
                        <hr>
                        <div class="text-center">
                            <div class="col-md-12 ">
                                <table class="table table-custom" width="100%">
                                    <tbody>
                                    <br>
                                    <tr>
                                        <div class="card-avatar">
                                            <a href="#pablo">
                                                @if($book->photo==null)

                                                    <img class="img"
                                                         src="{{url('assets/backend/img/default-book.png')}}">
                                                @else
                                                    <img class="img"
                                                         src="{{url('/').Storage::url($book->photo)}}"/>
                                                @endif
                                            </a>
                                        </div>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>Name : </b></td>
                                        <td>{{ucfirst($book->name)}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>Category : </b></td>
                                        <td>{{$book->category}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                        <tr>
                                            <td class="text-center"><b>Author Name : </b></td>
                                            <td>{{$book->author_name}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><b>Publication Name : </b></td>
                                            <td>{{$book->publication_name}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td class="text-center"><b>Published Date :</b></td>
                                            <td>{{$book->published_date}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><b>Price : </b></td>
                                            <td>{{$book->price}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
<tr>
    <td class="text-center"><b>Status :</b></td>
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
    <td></td>
    <td></td>
</tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>

    @endsection
