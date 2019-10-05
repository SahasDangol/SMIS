<?php

namespace Modules\Notice\Http\Controllers;

use App\Traits\ImageHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\Notice\Entities\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ImageHandler;

    function __construct()
    {
        $this->middleware('permission:notice-list');
        $this->middleware('permission:notice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:notice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:notice-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $notice = Notice::select('id', 'title')->where('status', 1)->get();

        return view('notice::notice.index', compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('notice::notice.create');
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
            'body' => 'required|string',
            'image' => 'required',

        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();

            if ($request->hasFile('image')) {
                $original = $request->file('image');
                $path = $this->compress_and_store($original);
                $input['image'] = 'public/' . $path;
            }
            Notice::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Notice has been Added Successfully");
        return redirect()->route('notice.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $notice = Notice::select('*')->where('notice.id', $id)->first();

        return view('notice::notice.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        try {

            $notice = Notice::select('id', 'image', 'body', 'title')->findOrFail($id);


        }
 catch (ModelNotFoundException $e) {

            return redirect('notice')->withError("Notice with ID '" . $id . "' not found.");
        }
 catch (\Exception $ex) {
            return redirect('notice')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        return view('notice::notice.edit', compact('notice'));


    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try {
            $notice = Notice::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            return redirect('notice')->withError("Notice with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('notice')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $original = $request->file('image');
                $path = $this->compress_and_store($original);
                $notice->image = 'public/' . $path;
            }
            $notice->title = $request->title;
            $notice->body = $request->body;
            $notice->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Notice has been Updated Successfully");
        return redirect('notice');
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $notice = Notice::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('notice')->withError("Notice with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('notice')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $notice->status = 0;
        $notice->save();

        Session::flash('type', "danger");
        Session::flash('message', "Notice has been Deleted Successfully");
        return redirect()->back();
    }
}
