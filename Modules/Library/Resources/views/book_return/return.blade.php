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
                    <div class="row">
                        <label class="col-sm-1 col-form-label"></label>


                        <div class="row">
                            <label class="col-sm-1 col-form-label"></label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Enter User ID*</label>
                                    <input class="form-control" type="text" maxlength="100" name="user_id"
                                           value="{{old('user_id')}}" required="true"/>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-9 col-form-label"></label>
                            <button class="btn btn-primary btn-round float-right mr-1">

                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{csrf_field()}}
        </form>

        @if($selected!=null)

            <div class="card">

                <div class="card-body">
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
                                                    @if($user->personal_photo==null)

                                                        <img class="img"
                                                             src="{{url('assets/backend/img/default-avatar.png')}}">
                                                    @else
                                                        <img class="img"
                                                             src="{{url('/').Storage::url($user->personal_photo)}}"/>
                                                    @endif
                                                </a>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><b>Name : </b></td>
                                            <td>{{ucfirst($user->first_name).' '.ucfirst($user->middle_name).' '.ucfirst(($user->last_name))}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><b>User Type : </b></td>
                                            <td>{{$users}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @if(ucfirst($users)=="Student")
                                            <tr>
                                                <td class="text-center"><b>Class : </b></td>
                                                <td>{{$user->classrooms->class_name}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>Section : </b></td>
                                                <td>{{$user->sections->name}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif

                                        @if($selected->return_date==null)
                                            @foreach($multiple as $singlebook)
                                                <form id="TypeValidation" class="form-horizontal process"
                                                      action="{{url('book/submit',[$singlebook->id])}}" method="post"
                                                      enctype="multipart/form-data">
                                                    <tr>
                                                        <td class="text-center"><b>Issued Books : </b></td>
                                                        <td>{{$singlebook->books->name}}</td>
                                                        <td> @if($singlebook->return_date==null)
                                                                <button class="btn btn-primary btn-round float-right mr-1">

                                                                    Return Book
                                                                </button>
                                                            @endif</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center"><b>Issued Date : </b></td>
                                                        <td>{{$singlebook->issued_date}}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center"><b>Deadline : </b></td>
                                                        <td>{{$singlebook->deadline}}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center"><b>Fine : </b></td>
                                                        <td>Rs. <?php
                                                            $date = date('Y-m-d');
                                                            $to = \Carbon\Carbon::parse($singlebook->issued_date);
                                                            $from = \Carbon\Carbon::parse($date);

                                                            $diff_in_days = $to->diffInDays($from);

                                                            ?>
                                                            @if ($diff_in_days > 14)
                                                                {{$diff_in_days}}.00
                                                            @else
                                                                0.00
                                                            @endif
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    {{csrf_field()}}
                                                </form>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center"><b>Issued Books : </b></td>
                                                <td>None</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @elseif($selected==0)
        @else
            <div class="card">
                <div class="card-body">

                    <div class="row text-center">

                        <table class="text-center">
                            <thead>
                            <td></td>
                            <td><h4 class="text-center">User Not Found</h4>
                            </td>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        @endif


    </div>
@stop
@section('script')
    <script>
        /*--restrict decimal input--*/
        $(document).on('input', '.price', function () {
            this.value = this.value
                .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
                .replace(/(\.[\d]{2})./g, '$1');    // not more than 4 digits after decimal

        });
        /*--restrict decimal input--*/

    </script>
@stop
