<?php

namespace Modules\Enquiry\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Enquiry\Entities\Enquiry;

class EnquiryController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:enquiry-list', ['only' => ['index','show']]);
        $this->middleware('permission:enquiry-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $enquiries = Enquiry::paginate(10);

        return view('enquiry::enquiry.index', compact('enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        {
            $this->validate($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string|max:15',
                'subject' => 'required|string|max:100',
                'message' => 'required'
            ]);

            try {
                $input = $request->all();
                $input['session_id'] = get_academic_year();
                Enquiry::create($input);
            } catch (\Exception $e) {
                return back()->withError($e->getMessage())->withInput();
            }
                Session::flash('type', "success");
                Session::flash('message', "Enquiry has been submitted successfully");
                return redirect()->route('frontend.contact_us');
            }
        }

        /**
         * Show the specified resource.
         * @return Response
         */
        public function show($id)
        {
            try{
            $enquiry = Enquiry::select('*')->findOrFail($id);
            } catch (ModelNotFoundException $e) {

                return redirect('enquiry')->withError("Enquiry with ID '" . $id . "' not found.");
            } catch (\Exception $ex) {
                return redirect('enquiry')->withError("Something went wrong!! Please Contact to Service Provider");
            }
            return view('enquiry::enquiry.show', compact('enquiry'));
        }

        /**
         * Show the form for editing the specified resource.
         * @return Response
         */
        public function edit($id)
        {

        }

        /**
         * Update the specified resource in storage.
         * @param  Request $request
         * @return Response
         * @throws \Illuminate\Validation\ValidationException
         */
        public function update(Request $request, $id)
        {

        }

        /**
         * Remove the specified resource from storage.
         * @return Response
         */
        public function destroy($id)
        {
            try{
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->status = 0;
            $enquiry->save();
            } catch (ModelNotFoundException $e) {

                return redirect('enquiry')->withError("Enquiry with ID '" . $id . "' not found.");
            } catch (\Exception $ex) {
                return redirect('enquiry')->withError("Something went wrong!! Please Contact to Service Provider");
            }
            Session::flash('type', "danger");
            Session::flash('message', "Enquiry has been deleted successfully");
            return redirect()->back();
        }
    }
