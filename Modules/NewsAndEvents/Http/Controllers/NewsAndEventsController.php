<?php

namespace Modules\NewsAndEvents\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\NewsAndEvents\Entities\NewsAndEvents;

class NewsAndEventsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $news_and_events=NewsAndEvents::select('id','title','location','date','start','end')
        ->where('status',1)->get();
        return view('newsandevents::newsandevents.index',compact('news_and_events'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('newsandevents::newsandevents.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'location'=>'required',
            'date'=>'required',

        ]);
        DB::beginTransaction();
        try {
            NewsAndEvents::create($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type',"success");
        Session::flash('message',"New News & Events has been Added Successfully");
        return redirect()->route('news_and_events.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('newsandevents::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        try{
        $news_and_event=NewsAndEvents::select('id','title','location','date','start','end','no_of_days','description')
            ->where('status',1)->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('news_and_events')->withError("News and Events with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('news_and_events')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('newsandevents::newsandevents.edit',compact('news_and_event'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try{
        $news_and_event=NewsAndEvents::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('news_and_events')->withError("News and Events with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('news_and_events')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
        'title' => 'required|string',
        'description' => 'required|string',
        'location'=>'required',
        'date'=>'required',

    ]);
        DB::beginTransaction();
        try {
            $news_and_event->fill($request->all())->save();
        } catch (\Exception $e) {
        DB::rollback();
        return back()->withError($e->getMessage())->withInput();
    }
        DB::commit();
        Session::flash('type',"success");
        Session::flash('message',"News & Events has been Updated Successfully");
        return redirect('news_and_events');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $news = NewsAndEvents::findOrFail($id);

        $news->status = 0;
        $news->save();
        } catch (ModelNotFoundException $e) {

            return redirect('news_and_events')->withError("News and Events with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('news_and_events')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "News & events has been Deleted Successfully");
        return redirect('news_and_events');
    }
}
