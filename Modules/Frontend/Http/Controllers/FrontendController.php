<?php

namespace Modules\Frontend\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\NewsAndEvents\Entities\NewsAndEvents;
use Modules\Notice\Entities\Notice;

use Modules\Gallery\Entities\Gallery;

use Modules\Others\Entities\Testimonial;
use Modules\Setting\Entities\Content;
use Modules\Setting\Entities\Setting;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $notices=Notice::select('id','title','body','image')->take(3)->orderBy('created_at', 'desc')->where('status',1)->get();
        $date = Carbon::today()->format('Y-m-d');
        $news_and_events=NewsAndEvents::select('date','title','description','location','id')->where('date','>',$date)->take(3)->orderBy('created_at', 'desc')->where('status',1)->get();
        $testimonials = Testimonial::select('image','position','name','testimonial')->where('status',1)->get();
        return view('frontend::index',compact('news_and_events','notices','testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('frontend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    public function notices()
    {
        $notices=Notice::select('id','title','body','image')->where('status',1)->paginate(6);
        return view('frontend::blog')->with('notices',$notices);
    }
    public function single_notice($id)
    {
        $notice=Notice::select('id','title','body','image')->where('id',$id)->first();
        return view('frontend::blog_details',compact('notice'));
    }
    public function gallery()
    {
        $albums = Gallery::all();
        $view = 'frontend::layouts.';
        $link = 'frontend/';
        return view('gallery::gallery.index', compact('albums','view','link'));
    }
    public function showAlbum($id)
    {
        $album = Gallery::with('gallery_images')->where('id', $id)
            ->where('status', 1)->first();
        $view = 'frontend::layouts.';
        $link = 'frontend/';
        return view('gallery::gallery.show', compact('album','view','link'));
    }
    public function events()
    {
        $date = Carbon::today()->format('Y-m-d');
        $upcoming_events=NewsAndEvents::select('date','start','no_of_days','end','title','description','location','id')->where('date','>=',$date)->orderBy('created_at', 'desc')->where('status',1)->paginate(6);
        $past_events=NewsAndEvents::select('date','start','no_of_days','end','title','description','location','id')->where('date','<',$date)->orderBy('created_at', 'desc')->where('status',1)->paginate(6);
        return view('frontend::events',compact('upcoming_events','past_events'));
    }

    public function about($id)
    {
        $content = Content::findOrFail($id);
        return view('frontend::about_us',compact('content'));
    }
}
