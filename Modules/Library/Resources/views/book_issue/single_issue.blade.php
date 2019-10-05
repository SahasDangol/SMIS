@extends('library')

@section('title', get_school_info('site_title').' | Issue Book')
@section('Body')
    <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal process" action="{{url('book/issue')}}" method="post" enctype="multipart/form-data">

            <div class="card ">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Issue Book</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="select2" data-size="13" id="book" name="name"
                                        data-style="select-with-transition" title="Select Book"
                                        required="true">
                                    <option disabled selected>Select Book*</option>
                                    @foreach($books as $b)


                                        <option value="{{$b->id}}"
                                                @if($b->id==$book->id)
                                                selected
                                        @endif>{{$b->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-1 col-form-label"></label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Enter User ID*</label>
                                    <input class="form-control" type="text" maxlength="100" name="user_id" value="{{old('user_id')}}" required="true" />
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <label class="col-sm-9 col-form-label"></label>
                            <button class="btn btn-primary btn-round float-right mr-1">
                                Issue Book
                            </button>
                        </div>
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