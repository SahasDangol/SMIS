<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LockScreenController extends Controller
{
    public function get()
    {

        // only if user is logged in
        if (Auth::check()) {
            Session::put('locked', true);

            return view('auth.locked');
        }

        return redirect('/login');
    }

    public function post(Request $request)
    {
        $messages = [

            "password.required" => "Password is required",
            "password.min" => "Password must be at least 6 characters"
        ];
        $validator = Validator::make($request->all(), [

            'password' => 'required|min:6'
        ], $messages);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // if user in not logged in
        if (!Auth::check())
            return redirect('/login');

        $password = Input::get('password');

        if (Hash::check($password, Auth::user()->password)) {
            Session::forget('locked');
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Wrong password']);
        }


    }
}
