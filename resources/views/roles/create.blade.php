@extends('master')

@section('title', get_school_info('site_title').' | Create Roles')
@section('Body')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                    @foreach($group as $value)
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="col-sm-3 btn btn-info btn-round btn-sm" data-toggle="collapse"
                                    data-target="#group[{{$value->id}}]">
                                <i class="material-icons">star_border</i>
                                {{$value->name}} <i class="material-icons">keyboard_arrow_down</i>
                            </button>
                        </div>

                        <div id="group[{{$value->id}}]" class="collapse col-sm-12 bg-dark" >
                                <div class="col-sm-12 checkbox-radios">
                                    @foreach(permission_list($value->id) as $item)
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="permission[]" type="checkbox" value="{{$item->id}}"> {{$item->name}}
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            {{--<div class="col-md-12">--}}
                            {{--<label class="form-check-label">--}}
                            {{--<input class="form-check-input" name="" type="checkbox"--}}
                            {{--value=> First Checkbox--}}
                            {{--<span class="form-check-sign">--}}
                            {{--<span class="check"></span>--}}
                            {{--</span>--}}
                            {{--</label>--}}
                            {{--<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}--}}
                            {{--{{ $value->name }}</label>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    @endforeach


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary btn-sm btn-round col-sm-3">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}


@endsection