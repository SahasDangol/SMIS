<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Inventory\Entities\Item;

class ItemController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    function __construct()
    {
        $this->middleware('permission:item-list');
        $this->middleware('permission:item-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:item-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:item-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $items = Item::select('id','name','description','category','current_stock')->where('status',1)->get();
        return view('inventory::items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:items,name',


            'category' => 'required|string',
            'current_stock' => 'required|max:1000',


        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();

            Item::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Item has been Added Successfully");
        return redirect('item');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('inventory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $items = Item::select('id','name','description','category','current_stock')->where('status', 1)->get();
        try{
            $item = Item::select('id','name','description','category','current_stock')->where('status', 1)
                ->orderBy('id', 'DESC')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('item')->withError("Item with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('item')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        return view('inventory::items.edit', compact('items','item'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public
    function update(Request $request, $id)
    {
        try{
            $item = Item::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('item')->withError("Item with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('item')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'name' => 'required|string|unique:items,name,'.$item->id,


            'category' => 'required|string',
            'current_stock' => 'required|max:1000',
        ]);
        DB::beginTransaction();
        try {
           $input=$request->all();
           $item->fill($input);
            $item->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Item has been Updated Successfully");
        return redirect('item');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $item = Item::findOrFail($id);

            $item->status = 0;
            $item->save();
        } catch (ModelNotFoundException $e) {

            return redirect('item')->withError("Item with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('item')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Item has been Deleted Successfully");
        return redirect('item');
    }
}
