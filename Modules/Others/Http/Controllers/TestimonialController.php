<?php

namespace Modules\Others\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Others\Entities\Testimonial;


class TestimonialController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $testimonials = Testimonial::select('id','position','name')->where('status',1)->get();
        return view('others::Testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('others::Testimonial.create');
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
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'required',
            'testimonial' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            if ($request->hasFile('image')) {
                $path = $request->image->store('public');
                $input['image'] = $path;
            }
            Testimonial::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Content has been Added Successfully");
        return redirect()->route('testimonial.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('others::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id)->select('id','name','image','testimonial','position')->where('status',1)->first();
        return view('others::Testimonial.edit', compact('testimonial'));
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
        $this->validate($request, [
            'name' => 'required|string',
            'position' => 'required|string',

            'testimonial' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $testimonial = Testimonial::find($id);

            if ($request->hasFile('image')) {
                $path = $request->image->store('public');
                $input['image'] = $path;
            } else {
                $input['image'] = $testimonial->image;
            }
            $testimonial->fill($input)->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Content has been Added Successfully");
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        $testimonial->status = 0;
        $testimonial->save();

        Session::flash('type', "danger");
        Session::flash('message', "Testimonial has been Deleted Successfully");
        return redirect()->route('testimonial.index');
    }
}
