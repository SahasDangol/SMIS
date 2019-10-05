@extends('library')

@section('title', get_school_info('site_title').' | Add Book')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Add Book</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Book Name*</label>
                                <input class="form-control" type="text" maxlength="100" name="name" value="{{old('name')}}" required="true" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Book Category*</label>
                                <input class="form-control" type="text" maxlength="100" name="category" value="{{old('category')}}" required="true" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Author Name*</label>
                                <input class="form-control" type="text"  name="author_name" value="{{old('author_name')}}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Publication Name*</label>
                                <input class="form-control" type="text"  name="publication_name" value="{{old('publication_name')}}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="bmd-label-floating">Published Date*</label>
                                <input id="nepali_datepicker" class="form-control nepali_datepicker" type="text"  name="published_date"
                                value="{{old('published_date')}}" maxlength="10" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="bmd-label-floating">Price*</label>
                                <input   type="number" name="price" class="price"
                                       maxlength="10" value="{{old('price')}}" required="true"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <label class="col-sm-2 col-form-label ">Book Photo</label>

                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <span class="btn btn-primary  btn-round btn-file">
                        <label for="logo" class="fileinput-new">Choose Photo</label>
                        <span for="logo" class="fileinput-exists">Change Photo</span>
                        <input type="file" value="{{old('photo')}} " id="photo"
                               name="photo" />
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                           data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                    </div>




                    <div class="row">
                        <label class="col-sm-9 col-form-label"></label>
                        <button class="btn btn-primary btn-round float-right mr-1">
                            Add Book
                        </button>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
@stop
@section('script')
    <script>
        /*--restrict decimal input--*/
        $(document).on('input','.price', function() {
            this.value = this.value
                .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
                .replace(/(\.[\d]{2})./g, '$1');    // not more than 4 digits after decimal

        });
        /*--restrict decimal input--*/

    </script>
@stop