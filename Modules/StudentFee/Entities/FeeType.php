<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    protected $fillable = ['session_id','fee_title','fee_type', 'fee_code','classroom_id', 'amount', 'remarks'];

    public function invoice_items()
    {
        return $this->hasMany('Modules\StudentFee\Entities\InvoiceItem');
    }
    public function classrooms()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function fee_type_status()
    {
        return $this->hasOne('Modules\StudentFee\Entities\FeeTypeStatus');
    }
}
