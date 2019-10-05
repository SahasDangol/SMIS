<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Inventory\Entities\Item;
use Modules\Inventory\Entities\Purchase;

class PurchaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:purchase-list');
        $this->middleware('permission:purchase-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:purchase-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:purchase-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $purchases=Purchase::with('items:id,name')
            ->select('id','vendor_name','item_id','unit_price','quantity','total_amount','discount','final_amount','date')
            ->where('status',1)
            ->get();
        return view('inventory::purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $items=Item::select('id','name')->where('status',1)->get();
        return view('inventory::purchase.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'date' => 'required',
            'vendor_name' => 'required|max:100',
            'item_id' => 'required',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer|max:200',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'final_amount' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['date'] = get_english_date($request->date);
            Purchase::create($input);
            $item=Item::where('id',$request->item_id)->first();
            $item->current_stock=$item->current_stock+$request->quantity;
            $item->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Purchase has been Added Successfully");
        return redirect('purchase');
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
            $purchase = Purchase::select('id','date','vendor_name','remarks','item_id','unit_price','quantity','total_amount','discount','final_amount')->where('status', 1)
                ->orderBy('id', 'DESC')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('purchase')->withError("Purchase Record with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('purchase')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        return view('inventory::purchase.edit', compact('items','purchase'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try{
            $purchase = Purchase::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('purchase')->withError("Purchase Record with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('purchase')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'date' => 'required',
            'vendor_name' => 'required|max:100',
            'item_id' => 'required',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer|max:200',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'final_amount' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['date'] = get_english_date($request->date);
            $purchase->fill($input);
            $purchase->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Purchase Record has been Updated Successfully");
        return redirect('purchase');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $purchase = Purchase::findOrFail($id);

            $purchase->status = 0;
            $purchase->save();
        } catch (ModelNotFoundException $e) {

            return redirect('purchase')->withError("Purchase with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('purchase')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        Session::flash('type', "danger");
        Session::flash('message', "Purchase Record has been Deleted Successfully");
        return redirect('purchase');
    }
}
