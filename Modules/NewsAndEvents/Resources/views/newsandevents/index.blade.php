@extends('master')

@section('title', get_school_info('site_title').' | News & Events')
@section('Body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">News & Events Detail</h4>
                        <button class="btn btn-primary btn-round float-right mr-1" data-toggle="modal"
                                data-target="#noticeModal">
                            <i class="material-icons">games</i>Advance Options
                        </button>
                        @can('notice-create')
                            <a href="{{url('/news_and_events/create')}}">
                                <button class="btn btn-primary btn-round float-right mr-1">
                                    <i class="material-icons">add</i> Add News & Events
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($news_and_events as $news_and_event)
                                    @if($news_and_event)
                                        <tr>
                                            <td>{{$news_and_event->id}}</td>
                                            <td>{{$news_and_event->title}}</td>
                                            <td>{{$news_and_event->location}}</td>
                                            <td>{{date('d M Y, D', strtotime($news_and_event->date))}}</td>
                                            <td>{{$news_and_event->start}}-{{$news_and_event->end}}</td>
                                            <td class="text-right">
                                                @can('notice-show')
                                                    <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                                @endcan
                                                @can('notice-edit')
                                                    <a href="{{url('/news_and_events/'.$news_and_event->id.'/edit')}}" title="Edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                @endcan
                                                @can('notice-delete')
                                                    <a href="#" onclick="
                                                            on(); if(confirm('Are You sure, You Want To Delete?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$news_and_event->id}}').submit();
                                                            }
                                                            else{
                                                            event.preventDefault();
                                                            }" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i>
                                                    </a>
                                                    <form method="post" action="{{route('news_and_events.destroy',$news_and_event->id)}} " id="delete-form-{{$news_and_event->id}}">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endif
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



