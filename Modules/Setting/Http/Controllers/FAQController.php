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
use Modules\Setting\Entities\FAQ;

class FAQController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $faqs = FAQ::select('id', 'question')->where('status', 1)->get();
        return view('setting::FAQ.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::FAQ.create');
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
            'question' => 'required|string',
            'answer' => 'required|string',
            'categories' => 'required|string',

        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            FAQ::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New FAQ has been Added Successfully");
        return redirect()->route('faq.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::FAQ.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $faq = FAQ::select('id', 'question', 'answer', 'categories')->where('status', 1)->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('faq')->withError("FAQ with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('faq')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('setting::FAQ.edit', compact('faq'));
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
        try {
            $content = FAQ::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('faq')->withError("FAQ with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('faq')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'question' => 'required|string',
            'categories' => 'required|string',
            'answer' => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            $content->fill($request->all())->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "FAQ has been updated Successfully");
        return redirect('faq');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $faq = FAQ::findOrFail($id);
        $faq->status = 0;
        $faq->save();
        } catch (ModelNotFoundException $e) {

            return redirect('faq')->withError("FAQ with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {

            return redirect('faq')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "FAQ has been Deleted Successfully");
        return redirect('faq');
    }
}
