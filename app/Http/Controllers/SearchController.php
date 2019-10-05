<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function search(Request $request){
        $users=[];
        $user = $request->input('search');
        if (!empty($user)){
            $users = User::where('name','like','%'.$user.'%')->get();
        }

        return view('welcome',compact('users'));
    }

    public function tables()
    {
        $tables_in_db = DB::select('SHOW TABLES');
        $db = "Tables_in_".env('DB_DATABASE');
        $tables = [];
        foreach($tables_in_db as $table){
            $tables[] = $table->{$db};
        }
        return $tables;
    }
}
