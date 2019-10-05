<?php

namespace Modules\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Account\Entities\ItemOfJournal;
use Modules\Account\Entities\ListOfLedger;


class CashBookController extends Controller
{
    public function index(){
          $cash= ListOfLedger::where('name','Cash')->first();
          $journals = $cash->ItemOfJournal;
        return view('account::cashbook.index',compact('journals'));
    }
}