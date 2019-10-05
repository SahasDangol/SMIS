<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ErrorController extends Controller
{
    public function message(Request $request)
    {
//        dd($request->all());

        Session::flash('type', 'danger');
        Session::flash('message', $request->message);//405

        return redirect('dashboard');
//        return redirect($_SERVER['HTTP_REFERER']);
    }
}
