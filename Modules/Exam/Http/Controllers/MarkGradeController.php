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
use Modules\Exam\Entities\MarkGrade;

class MarkGradeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware('permission:grade-list');
        $this->middleware('permission:grade-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:grade-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:grade-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $grades = MarkGrade::select('name', 'from', 'upto', 'grade_from', 'id', 'grade_upto', 'remarks')->where('status', 1)->get();
        return view('exam::grade.index', compact('grades'));
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
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:15',
            'from' => 'required|string|max:3',
            'upto' => 'required|string|max:3',
        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();
            MarkGrade::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Mark Grade has been Added Successfully");
        return redirect('exams/grade');
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
     * @return Response
     */
    public function edit($id)
    {
        try {

            $grades = MarkGrade::select('id', 'name', 'from', 'upto', 'grade_from', 'id', 'grade_upto', 'remarks')->orderBy('id', 'DESC')->where('status', 1)->findOrfail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('exams/grade')->withError("Grade with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('exams/grade')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $lists = MarkGrade::select('id', 'name', 'from', 'upto', 'grade_from', 'id', 'grade_upto', 'remarks')->where('status', 1)->get();


        return view('exam::grade.edit', compact('grades', 'lists'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        try{
        $grade_list = MarkGrade::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('exams/grade')->withError("Grade with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('exams/grade')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'from' => 'required|string|max:3',
            'upto' => 'required|string|max:3',

        ]);
        DB::beginTransaction();
        try {
            $grade_list->name = $request->name;
            $grade_list->from = $request->from;
            $grade_list->upto = $request->upto;
            $grade_list->remarks = $request->remarks;
            $grade_list->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Mark Grade has been Updated Successfully");

        return redirect('exams/grade');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
        $grade_list = MarkGrade::findOrFail($id);

        $grade_list->status = 0;
        $grade_list->save();
        } catch (ModelNotFoundException $e) {

            return redirect('exams/grade')->withError("Grade with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('exams/grade')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        Session::flash('type', "danger");
        Session::flash('message', "Mark Grade has been Deleted Successfully");
        return redirect('exams/grade');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|MarkGrade[]
     * @throws \Illuminate\Validation\ValidationException
     */
    public function quick(Request $request)
    {

        $this->validate($request, [
            'grade_name' => 'required|string|max:50',
            'from' => 'required|string|max:3',
            'upto' => 'required|string|max:3'
        ]);
        DB::beginTransaction();
        try {
            $grade = new MarkGrade();
            $grade->name = $request->grade_name;
            $grade->from = $request->from;
            $grade->upto = $request->upto;
            $grade->remarks = $request->remarks;
            $grade->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();

        $grades = MarkGrade::all();

        return $grades;
    }
}
