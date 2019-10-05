<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:visitor-list');
        $this->middleware('permission:visitor-create', ['only' => ['create','store']]);
        $this->middleware('permission:visitor-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:visitor-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::latest()->paginate(5);
        return view('visitors.index',compact('visitors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
//        $results=Visitor::all();
//        return view('visitor.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('visitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $input=$request->all();
//
//
//        Visitor::create($input);
//
//
//        return redirect('/admin/visitors');

        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Visitor::create($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();

        return redirect()->route('visitors.index')
            ->with('success','Visitor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mobiles.show',compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor=Visitor::where('id',$id)->orderBy('id','desc')->take(1)->get();

        return view('visitors.edit',compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
        ]);

        DB::transaction(function() use($request,$visitor) {
            $visitor->update($request->all());

        });
        return redirect()->route('visitors.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();


        return redirect()->route('visitors.index')
            ->with('success','Visitor deleted successfully');
    }
}
