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
use Modules\Inventory\Entities\Sale;

class SaleController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    use ValidatesRequests, AuthorizesRequests;

    function __construct()
    {
        $this->middleware('permission:sale-list');
        $this->middleware('permission:sale-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sale-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sale-delete', ['only' => ['destroy']]);
    }

    public function index()
    {

        $sales = Sale::with('items:id,name')
            ->select('id', 'customer_name', 'item_id', 'unit_price', 'quantity', 'total_amount', 'discount', 'final_amount', 'date')
            ->where('status', 1)
            ->get();
        return view('inventory::sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $items = Item::select('id', 'name')->where('status', 1)->where('current_stock',">",0)->get();
        return view('inventory::sale.create', compact('items'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'customer_name' => 'required|max:100',
            'item_id' => 'required',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer|max:1000',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'final_amount' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['date'] = get_english_date($request->date);
            Sale::create($input);
            $item = Item::where('id', $request->item_id)->first();
            $itemstock= $item->current_stock - $request->quantity;

            if ($itemstock >= 0) {
                $item->current_stock=$itemstock;
                $item->save();
            } else {

            Session::flash('type', "danger");
            Session::flash('message'," Current Stock for this item is only ".$item->current_stock);

            return redirect()->back();
        }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Sale has been Added Successfully");
        return redirect('sale');
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
        $items = Item::select('id', 'name', 'description', 'category', 'current_stock')->where('status', 1)->where('current_stock',">",0)->get();

        try {
            $sale = Sale::select('id', 'date', 'customer_name', 'remarks', 'item_id', 'unit_price', 'quantity', 'total_amount', 'discount', 'final_amount')->where('status', 1)
                ->orderBy('id', 'DESC')->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('sale')->withError("Sale Record with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('sale')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        return view('inventory::sale.edit', compact('items', 'sale'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $sale = Sale::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('sale')->withError("Sale with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('sale')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'date' => 'required',
            'customer_name' => 'required|max:100',
            'item_id' => 'required',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer|max:1000',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'final_amount' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['date'] = get_english_date($request->date);
            $sale->fill($input);

            $sale->save();
            $item = Item::where('id', $request->item_id)->first();
            $itemstock= $item->current_stock - $request->quantity;

            if ($itemstock >= 0) {
                $item->current_stock=$itemstock;
                $item->save();
            } else {

                Session::flash('type', "danger");
                Session::flash('message'," Current Stock for this item is only ".$item->current_stock);

                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Sale Record has been Updated Successfully");
        return redirect('sale');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $sale = Sale::findOrFail($id);

            $sale->status = 0;
            $sale->save();
        } catch (ModelNotFoundException $e) {

            return redirect('sale')->withError("Sale with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('sale')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Sale has been Deleted Successfully");
        return redirect('sale');
    }
}
