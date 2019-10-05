<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['voucher_no','ledger_id','date','description','debit','credit','remarks'];

    public function listofledger(){
        return $this->belongsTo('Modules\Account\Entities\ListOfLedger','description');
    }

    public function journals(){
        return $this->belongsTo('Modules\Account\Entities\Journal','voucher_no');
    }
}
