<?php

namespace Modules\Visitor\Http\Controllers;

use App\Http\Controllers\BsdateController;
use App\Jobs\StoreVisitor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Subject\Entities\Subject;
use Modules\Visitor\Entities\Visitor;

class VisitorController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:visitor-list');
        $this->middleware('permission:visitor-create', ['only' => ['create','store']]);
        $this->middleware('permission:visitor-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:visitor-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {


        $visitors=Visitor::select('id','name','purpose','date','entry_time','leave_time','visitor_card_no','id','leave_time')->where('status',1)->get();
        return view('visitor::visitor.index',compact('visitors'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('visitor::visitor.index');
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
            'name' => 'required|string|max:100',
            'purpose' => 'required|string|max:100',
            'entry_time'=>'required',
        ]);
//        DB::beginTransaction();
//        try {
//            $bsdate = new BsdateController();
//            $input = $request->all();
//            $input['date'] = $bsdate->nep_to_eng($request->date);
//            Visitor::create($input);
//        } catch (\Exception $e) {
//        DB::rollback();
////        return back()->withError($e->getMessage())->withInput();
//            return back()->withError('User not found by ID ')->withInput();
//    }
//        DB::commit();
        dispatch((new StoreVisitor($request))->delay(Carbon::now()->addSeconds(3)));
        Session::flash('type',"success");
        Session::flash('message',"New Visitor has been Added Successfully");
        return redirect('visitors');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return redirect('visitors');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return redirect('visitors');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        return redirect('visitors');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            date_default_timezone_set('Asia/Kathmandu');
            $visitor = Visitor::findOrFail($id);

            $visitor->leave_time = date("h:i A");
            $visitor->save();
        } catch (ModelNotFoundException $e) {

            return redirect('visitors')->withError("Visitor with ID '" . $id . "' not found.");
        }
        catch(\Exception $ex){
            return redirect('visitors')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type',"danger");
        Session::flash('message',"Visitor Left Just Now");
        return redirect('visitors');
    }
}
