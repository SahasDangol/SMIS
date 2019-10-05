<?php

namespace Modules\Complaint\Http\Controllers;

use App\Http\Controllers\BsdateController;
use App\Traits\ImageHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Complaint\Entities\Complain;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ImageHandler;

    function __construct()
    {
        $this->middleware('permission:complaint-list');
        $this->middleware('permission:complaint-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:complaint-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:complaint-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $complain=Complain::select('id','complain_type','date','complain_by','status')->get();
        return view('complaint::complaint.index',compact('complain'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        return view('complaint::complaint.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        { $this->validate($request, [
            'complain_type' => 'required|string',
            'complain_by' => 'required|string',
            'date'=>'required|string',
        ]);
            DB::beginTransaction();
            try {
                $input = $request->all();
                if ($request->hasFile('attach_document')) {
                    $original = $request->file('attach_document');
                    $path = $this->compress_and_store($original);
                    $input['attach_document'] = 'public/' . $path;
                }

                $input['session_id']=get_academic_year();
                $input['date'] = get_english_date($request->date);
                Complain::create($input);
            } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
            Session::flash('type', "success");
            Session::flash('message', "Complaint has been submitted successfully");
            return redirect()->route('complain.index');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        try{
        $complain = Complain::select('id','session_id','attach_document','taken_action','note','complain_type','source','phone','email','date','complain_by','status')
            ->findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('complain')->withError("Complaint with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('complain')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        return view('complaint::complaint.show', compact('complain'));

    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
     try{
            $complain = Complain::select('id','session_id','attach_document','taken_action','note','complain_type','phone','email','date','complain_by','status')
                ->orderBy('id', 'DESC')->findOrFail($id);
     } catch (ModelNotFoundException $e) {

         return redirect('complain')->withError("Complain with ID '" . $id . "' not found.");
     } catch (\Exception $ex) {
         return redirect('complain')->withError("Something went wrong!! Please Contact to Service Provider");
     }
        return view('complaint::complaint.edit', compact('complain'));


    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,$id)
    {
try{
        $complain = Complain::findOrFail($id);
} catch (ModelNotFoundException $e) {

    return redirect('complain')->withError("Complaint with ID '" . $id . "' not found.");
} catch (\Exception $ex) {
    return redirect('complain')->withError("Something went wrong!! Please Contact to Service Provider");
}
        $this->validate($request, [
            'session_id' => 'required|string',
            'complain_type' => 'required|string',
            'complain_by' => 'required|string',
            'date'=>'required|string',
        ]);
        DB::beginTransaction();
        try {
        $complain->session_id=$request->session_id;
        $complain->complain_type=$request->complain_type;
        $complain->complain_by=$request->complain_by;
        $complain->email=$request->email;
        $complain->date=get_english_date($request->date);

        $complain->taken_action=$request->taken_action;
        $complain->note=$request->note;
        if ($file = $request->file('attach_document')) {

            $path = $request->attach_document->store('public');
            $input['attach_document'] = $path;


        }
        $complain->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Complaint has been updated successfully");
        return redirect('complain');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)

    {
        try{
        $complain = Complain::findOrFail($id);
        $complain->status = 0;
        $complain->save();
        } catch (ModelNotFoundException $e) {

            return redirect('complain')->withError("Complaint with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('complain')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Complaint has been deleted successfully");
        return redirect()->back();
    }
}
