@extends('master')

@section('title', get_school_info('site_title').' | Edit Roles')
@section('Body')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>


    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <div class="form-group">
                    <div class="float-right mr-5">
                        <b> Select all</b> <input id="checkall" type="checkbox" href="#">
                    </div>
                </div>
                <br><br>

                @foreach($group as $value)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-info btn-round btn-sm" data-toggle="collapse"
                                        data-target="#group[{{$value->id}}]"><i class="material-icons">star_border</i> {{$value->name}} <i class="material-icons">keyboard_arrow_down</i>
                                </button>
                            </div>
                        </div>

                        <div id="group[{{$value->id}}]" class="collapse col-sm-12 bg-dark" >
                            <div class="col-sm-12 checkbox-radios">
                                @foreach(permission_list($value->id) as $item)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="permission[]" type="checkbox" value="{{$item->id}}"  @if(in_array($item->id, $rolePermissions)) checked @endif > {{$item->name}}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
@section('script')
    <script>
        $(document).ready(function () {

        });
    </script>
@stop
