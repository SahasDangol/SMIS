<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Setting\Entities\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:content-list');
        $this->middleware('permission:content-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:content-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:content-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contents = Content::select('id', 'title')->where('status', 1)->get();
        return view('setting::content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::content.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',

        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            Content::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Content has been Added Successfully");
        return redirect()->route('content.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $content = Content::select('*')->where('content.id', $id)->first();

        return view('setting::content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try{
        $content = Content::select('id', 'title', 'description', 'summary')->where('status', 1)->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('content')->withError("Content with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('content')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('setting::content.edit', compact('content'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {try{
        $content = Content::findOrFail($id);
    } catch (ModelNotFoundException $e) {

return redirect('content')->withError("Content with ID '" . $id . "' not found.");
} catch (\Exception $ex) {

    return redirect('content')->withError("Something went wrong!! Please Contact to Service Provider");
}
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            $content->title = $request->title;
            $content->description = $request->description;
            $content->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Content has been Updated Successfully");
        return redirect('content');
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $content = Content::findOrFail($id);
        $content->status = 0;
        $content->save();
        } catch (ModelNotFoundException $e) {

            return redirect('content')->withError("Content with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('content')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "success");
        Session::flash('message', "Content has been Deleted Successfully");
        return redirect()->back();
    }
}
