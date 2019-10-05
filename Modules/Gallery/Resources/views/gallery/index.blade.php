@extends($view.'master')

@section('head')
    <style>
        img {
            max-height: 200px;
        }

        .categories_post {
            position: relative;
            text-align: center;
            cursor: pointer;
        }

        .categories_post img {
            max-width: 100%;
        }

        .categories_post .categories_details {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            background: rgba(34, 34, 34, 0.8);
            color: #fff;
            transition: all 0.3s linear;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .categories_post .categories_details h5 {
            margin-bottom: 0px;
            font-size: 18px;
            line-height: 26px;
            text-transform: uppercase;
            color: #fff;
            position: relative;
        }

        .categories_post .categories_details p {
            font-weight: 300;
            font-size: 14px;
            line-height: 26px;
            margin-bottom: 0px;
        }

        .categories_post .categories_details .border_line {
            margin: 10px 0px;
            background: #fff;
            width: 100%;
            height: 1px;
        }

        .categories_post:hover .categories_details {
            background-color: transparent;
            opacity: .6;
        }

        .add-album:hover {
            background-color: #343434;
        !important;
        }


    </style>
@stop
@section('title', get_school_info('site_title').' | Gallery')
@section('Body')
    <div class="container">
        <div class="row">
            @can('gallery-create')
                <div class="col-sm-6 col-md-4">
                    <a href="{{url('gallery/create')}}">
                        <div class="categories_post ">
                            <img src="{{asset('img/image_placeholder.jpg')}}" alt="post">
                            <div class="categories_details add-album">
                                <div class="categories_text">
                                    <h5><i class="fa fa-plus" aria-hidden="true"> </i>Add Album</h5>
                                    <div class="border_line"></div>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan
            @foreach($albums as $album)
                <div class="col-sm-6 col-md-4">
                    <a href="{{url($link.'gallery/'.$album->id)}}">
                        <div class="categories_post">
                            <img src="{{url('/').Storage::url($album->gallery_images->first()->image)}}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <h5>{{$album->title}}</h5>
                                    <div class="border_line"></div>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
<div class="mb-sm-5"></div>
@stop
@section('script')

@stop

