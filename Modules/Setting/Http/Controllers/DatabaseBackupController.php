<?php

namespace Modules\Setting\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DatabaseBackupController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:database-backup-list');
        $this->middleware('permission:database-backup-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:database-backup-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:database-backup-delete', ['only' => ['destroy']]);
    }

    public function backup_database()
    {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);


        $return = "";
        $database = 'Tables_in_' . DB::getDatabaseName();
        $tables = array();
        $result = DB::select("SHOW TABLES");

        foreach ($result as $table) {
            $tables[] = $table->$database;
        }


        //loop through the tables
        foreach ($tables as $table) {
            $return .= "DROP TABLE IF EXISTS $table;";

            $result2 = DB::select("SHOW CREATE TABLE $table");
            $row2 = $result2[0]->{'Create Table'};

            $return .= "\n\n" . $row2 . ";\n\n";

            $result = DB::select("SELECT * FROM $table");

            foreach ($result as $row) {
                $return .= "INSERT INTO $table VALUES(";
                foreach ($row as $key => $val) {
                    $return .= "'" . addslashes($val) . "',";
                }
                $return = substr_replace($return, "", -1);
                $return .= ");\n";
            }

            $return .= "\n\n\n";
        }

        //save file

        $name = time() . '.sql';
        $file11 = 'backup/DB-BACKUP-' . $name;
        $f = $file11;
        $handle = fopen($file11, "w+");

        fwrite($handle, $return);
        fclose($handle);
        $path = "C:/Users/" . getenv("username") . "/Google Drive";
        $destinationPath = $path . "/DB-BACKUP-" . $name;

        $checkpath = is_dir($path);

        if ($checkpath == true) {
            $success = File::copy(public_path($f), $destinationPath);
        }
        Session::flash('type', "success");
        Session::flash('message', "Database has been Backed up Successfully");

        return response()->download($file11);

    }
}
