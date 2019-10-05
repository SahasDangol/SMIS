<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

class ItemOfJournal extends Model
{
    protected $fillable = [];

    public function listofledger(){
        return $this->belongsTo('Modules\Account\Entities\ListOfLedger','ledger_id');
    }
    public function journals(){
        return $this->belongsTo('Modules\Account\Entities\Journal','journal_id');
    }
}
