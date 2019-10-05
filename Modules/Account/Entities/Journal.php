<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = ['date','description','debit','credit','remarks','reconciliation'];

    public function fiscalyears(){
        return $this->belongsTo('Modules\Account\Entities\FiscalYear','fiscal_year_id');
    }
}
