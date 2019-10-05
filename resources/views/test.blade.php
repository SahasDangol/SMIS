@extends('master')

@section('title', get_school_info('site_title').' | Dashboard')

@section('Body')

    <select id="e1" multiple>
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
    </select>

@stop
@section('script')
    <script>
        $("#e1").select2({
            placeholder: "Select a State",
            allowClear: true
        });
    </script>
@stop