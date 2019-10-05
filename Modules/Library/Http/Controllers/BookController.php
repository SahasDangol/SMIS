<?php

namespace Modules\Library\Http\Controllers;

use App\Traits\ImageHandler;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Library\Entities\Book;
use Modules\Library\Entities\IssueBook;
use Modules\Staff\Entities\Staff;
use Modules\Student\Entities\Student;

class BookController extends Controller
{
    use AuthorizesRequests, ValidatesRequests,ImageHandler;

    function __construct()
    {
        $this->middleware('permission:book-list');
        $this->middleware('permission:book-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:book-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:book-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $books = Book::where('status', 1)->get();
        return view('library::books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('library::books.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'publication_name' => 'required|string',
            'published_date' => 'required',
            'price' => 'required|numeric',

        ]);
        DB::beginTransaction();
        try {
            $input = $request->all();

            if ($request->hasFile('photo')) {
                $this->validate($request, [
                    'photo' => 'mimes:jpg,jpeg,png,svg,img,bmp',
                ]);
                $original = $request->file('photo');
                $path = $this->compress_and_store($original);
                $input['photo'] = 'public/' . $path;
            }
            Book::create($input);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "success");
        Session::flash('message', "New Book has been Added Successfully");
        return redirect()->route('book.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->where('status', 1)->first();
        return view('library::books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        try {

            $book = Book::select('id', 'name', 'author_name', 'category', 'price', 'photo', 'issue_status', 'published_date', 'publication_name')->findOrFail($id);


        } catch (ModelNotFoundException $e) {

            return redirect('book')->withError("Book with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('book')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        return view('library::books.edit', compact('book'));

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
            $book = Book::findOrFail($id);

        } catch (ModelNotFoundException $e) {

            return redirect('book')->withError("Book with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('book')->withError("Something went wrong!! Please Contact to Service Provider");
        }

        $this->validate($request, [
            'name' => 'required|string',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'publication_name' => 'required|string',
            'published_date' => 'required',
            'price' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('photo')) {
                $this->validate($request, [
                    'photo' => 'mimes:jpg,jpeg,png,svg,img,bmp',
                ]);
                $original = $request->file('photo');
                $path = $this->compress_and_store($original);
                $book->photo = 'public/' . $path;
            }

            $book->fill($request->all());
            $book->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError($e->getMessage())->withInput();
        }
        DB::commit();
        Session::flash('type', "info");
        Session::flash('message', "Book has been Updated Successfully");
        return redirect('book');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return redirect('book')->withError("Book with ID '" . $id . "' not found.");
        } catch (\Exception $ex) {
            return redirect('book')->withError("Something went wrong!! Please Contact to Service Provider");
        }
        $book->status = 0;
        $book->save();

        Session::flash('type', "danger");
        Session::flash('message', "Book has been deleted Successfully");
        return redirect()->back();
    }


    public function issue()
    {
        $books = Book::where('status', 1)->where('issue_status', 0)->get();
        return view('library::book_issue.issue', compact('books'));
    }

    public function return()
    {
        $selected = 0;
        return view('library::book_return.return', compact('selected'));
    }

    public function issuebook(Request $request)
    {

        $user_id = $request->user_id;

        $c = 0;


        try {

            $student = Student::where('roll_no', $user_id)->first();
            $book_id = $request->name;


            $book = Book::where('id', $book_id)->first();
            $date = date('Y-m-d');
            $deadline = Carbon::parse($date)->addDays(14)->toDateString();
            $input['book_id'] = $book_id;
            $input['issued_date'] = $date;


            $input['deadline'] = $deadline;

            if ($student != null) {


                $input['user_id'] = $student->roll_no;
                IssueBook::create($input);
                $c = $c + 1;
                $book->issue_status = 1;
                $book->save();

            }

            if ($student == null) {
                $staff = Staff::where('staff_id', $user_id)->first();

                $input['user_id'] = $staff->staff_id;
                IssueBook::create($input);
                $c = $c + 1;
                $book->issue_status = 1;
                $book->save();

            }
            if ($c == 0) {
                Session::flash('type', "danger");
                Session::flash('message', "Please Enter a Valid ID");
                return redirect()->back();
            } else {
                Session::flash('type', "success");
                Session::flash('message', "Book issued successfully");
                return redirect()->route('book.index');
            }

        } catch (ModelNotFoundException $e) {

            return redirect('book')->withError("User with ID '" . $user_id . "' not found.");
        } catch
        (\Exception $ex) {
            Session::flash('type', "danger");
            Session::flash('message', $ex->getMessage());
            return redirect()->back();
//            return redirect('book')->withError("Something went wrong!! Please Contact to Service Provider");
        }
//        Session::flash('type', "success");
//        Session::flash('message', "Book Issued Successfully");

    }

    public function returnbook(Request $request)
    {

        $user_id = $request->user_id;


        try {
            $user = Student::where('roll_no', $user_id)->first();
            $users = "Student";
            if ($user == null) {
                $user = Staff::where('staff_id', $user_id)->first();
                $users = "Staff";

            }
            if ($user != null) {

//                $users = User::where('id', $user->user_id)->first();

                $selected = IssueBook::where('user_id', $user_id)->where('status', 1)->where('return_date', null)->orderBy('created_at', 'desc')->first();
                $multiple = IssueBook::where('user_id', $user_id)->where('status', 1)->where('return_date', null)->orderBy('created_at', 'desc')->get();


                return view('library::book_return.return', compact('selected', 'user', 'users', 'multiple'));
            } else {
                Session::flash('type', "danger");
                Session::flash('message', "Please Enter a Valid ID");
                return redirect('book');
            }

        } catch (ModelNotFoundException $e) {

            return redirect('book')->withError("User with ID '" . $user_id . "' not found.");
        } catch (\Exception $ex) {
            Session::flash('type', "danger");
            Session::flash('message', $ex->getMessage());
            return redirect()->back();
//            return redirect('book')->withError("Something went wrong!! Please Contact to Service Provider");
        }

    }

    public function submitbook($id)
    {
        $date = date('Y-m-d');

        $issuedbook = IssueBook::where('id', $id)->orderBy('created_at', 'desc')->first();
        $to = Carbon::parse($issuedbook->issued_date);
        $from = Carbon::parse($date);

        $diff_in_days = $to->diffInDays($from);

        $book = Book::where('id', $issuedbook->book_id)->where('issue_status', 1)->first();
        $book->issue_status = 0;

        if ($diff_in_days > 14) {
            $issuedbook->fine = $diff_in_days;
            Session::flash('type', "danger");
            Session::flash('message', 'You must pay fine of Rs.' . $diff_in_days);
        }
        $book->save();
        $issuedbook->return_date = $date;
        $issuedbook->save();
        Session::flash('type', "success");
        Session::flash('message', 'Book Returned Successfully');
        return redirect('book_return');
    }

    public function singleissue(Request $request, $id)
    {
        $books = Book::where('status', 1)->get();

        $book = Book::where('id', $id)->first();
        return view('library::book_issue.single_issue', compact('books', 'book'));


    }

    public function singlereturn(Request $request, $id)
    {
        $selected = 0;
        $issuedbooks = IssueBook::where('book_id', $id)->where('status', 1)->where('return_date', null)->orderBy('created_at', 'desc')->first();

        $multiple = IssueBook::where('user_id', $issuedbooks->user_id)->where('status', 1)->where('return_date', null)->orderBy('created_at', 'desc')->get();
//dd($issuedbooks);
//        if (ucfirst($issuedbooks->users->user_type) == "Student") {
//            $user_id = $issuedbooks->users->students->roll_no;
//
//        } else {
//
//            $user_id = $issuedbooks->users->staffs->staff_id;
//        }


        $user = Student::where('roll_no', $issuedbooks->user_id)->first();
        if ($user != null) {
            $user_id = $user->roll_no;
            $user_type="Student";
        } else {
            $user = Staff::where('staff_id', $issuedbooks->user_id)->first();
            $user_id = $user->staff_id;
            $user_type="Staff";

        }

//        if ($users != null) {
//            $user = User::where('id', $users->user_id)->first();
//        }

        $selected = IssueBook::where('user_id', $issuedbooks->user_id)->where('return_date', null)->where('status', 1)->orderBy('created_at', 'desc')->first();

        return view('library::book_return.single_return', compact('issuedbooks', 'user_type','user', 'user_id', 'selected', 'multiple'));
    }


}
