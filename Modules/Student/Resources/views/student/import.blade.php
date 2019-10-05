@extends('master')

@section('title', get_school_info('site_title').' | Import Student Detail')

@section('Body')
    <div class="wrapper wrapper-full-page">
        <div class="page-header pricing-page header-filter" style="background-image: url('{{url('assets/backend/img/bg-pricing.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <h2 class="title">Upload your Data in Bulk</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-pricing card-plain">
                            <h6 class="card-category"> Import Excel</h6>
                            <div class="card-body">
                                <div class="card-icon icon-white ">
                                    <i class="material-icons">cloud_upload</i>
                                </div>
                                <h3 class="card-title">File</h3>
                                <p class="card-description">Please match your format with standard
                                    format</p>
                            </div>
                            <div class="card-footer justify-content-center ">
                                <a href="#" class="btn btn-round btn-white" data-toggle="modal"
                                   data-target="#myModal10">Choose File</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-pricing ">
                            <h6 class="card-category"> Download Format</h6>
                            <div class="card-body">
                                <div class="card-icon icon-rose ">
                                    <i class="material-icons">cloud_download</i>
                                </div>
                                <h3 class="card-title">Format</h3>
                                <p class="card-description">Please manage the data as mentioned in the
                                    format.</p>
                            </div>
                            <div class="card-footer justify-content-center ">
                                <a href="{{ asset('students.xlsx') }}" class="btn btn-round btn-rose">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--file choosing modal--}}
            <div class="modal fade modal-mini modal-primary" id="myModal10" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-small">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                        class="material-icons">clear</i></button>
                        </div>
                        <form action="{{url('students/import')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body justify-content-center">
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 ml-5 align-content-center">
                                        <div class="fileinput fileinput-new text-center justify-content-center"
                                             data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                <img src="{{url('assets/backend/img/excel.png')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                            <div>
                                                <span class="btn btn-outline-primary btn-sm btn-round btn-file">
                                                <span class="fileinput-new">Choose File</span>
                                                <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="file"/>
                                                </span>
                                                <button type="submit" class="fileinput-exists btn btn-primary btn-sm btn-round">Import</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            {{--file choosing modal--}}
        </div>
    </div>
@stop