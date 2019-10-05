<?php

namespace Modules\Exam\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Modules\Exam\Entities\ExamList;
use Modules\Marksheet\Entities\Mark;
use Modules\Student\Entities\Student;
use Modules\Subject\Entities\OptionalSubjectAssign;
use Modules\Subject\Entities\Subject;

class ExamListController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:exam-list');
        $this->middleware('permission:exam-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exam-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exam-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $lists = ExamList::select('id', 'name', 'remarks')
            ->where('status', 1)->get();

        return view('exam::list.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('exam::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $status = 0;
        $this->validate($request, [
            'name' => 'required|string|max:30|unique:exam_lists,name,' . $status . ',status',
            'final_term_contribution'=>'required|integer|max:100'
        ]);

        if(ExamList::where('publish_status',0)->count()){
            Session::flash('type', "danger");
            Session::flash('message', "Sorry! Could not create new exam. Please publish previous exam result first.");
            return redirect()->back();
        }

        try {
            $input = $request->all();
            $examlist = ExamList::where(ucfirst('name'), ucfirst($request->name))->first();
            if ($examlist) {
                $input['status'] = 1;
                $examlist->fill($input)->save();
            } else {
                ExamList::create($request->all());
            }
        } catch (\Exception $e) {
            Session::flash('type', "danger");
            Session::flash('message', "Sorry! Could not create new exam due to server issue. Please contact service provider.");
            return redirect()->back();
        }
        Session::flash('type', "success");
        Session::flash('message', "New Exam has been Added Successfully");
        return redirect('exams/list');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('exam::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $exams = ExamList::findOrFail($id);
        $lists = ExamList::select('id', 'name','final_term_contribution', 'remarks')->where('status', 1)->get();
        return view('exam::list.edit', compact('exams', 'lists'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param ExamList $exam
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $status = 0;
        $exam = ExamList::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:100|unique:exam_lists,name,' . $exam->id,
            'final_term_contribution'=>'required|integer|max:100'
        ]);
        try {
            $exam->fill($request->all())->save();
        } catch (\Exception $e) {
            Session::flash('type', "danger");
            Session::flash('message', "'.$request->name.' could not be updated due to server issue. Please contact service provider.");
            return back();
        }
        Session::flash('type', "success");
        Session::flash('message', "Exam has been Updated Successfully");
        return redirect('exams/list');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $exam = ExamList::findOrFail($id);
        try {
            $exam->status = 0;
            $exam->save();
        } catch (\Exception $ex) {
            Session::flash('type', "danger");
            Session::flash('message', "'.$exam->name.' could not be deleted due to server issue. Please contact service provider.");
            return redirect()->back();
        }
        Session::flash('type', "danger");
        Session::flash('message', "Exam has been Deleted Successfully");
        return redirect('exams/list');
    }
}
