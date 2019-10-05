<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

class ListOfLedger extends Model
{
    protected $fillable = ['name','alias','under'];

    public function Ledger(){
        return $this->hasOne('Modules\Account\Entities\Ledger');
    }

    public function ItemOfJournal(){
        return $this->hasMany('Modules\Account\Entities\ItemOfJournal','ledger_id');
    }

    public function groups(){
        return $this->belongsTo('Modules\Account\Entities\Group','under');
    }
}
