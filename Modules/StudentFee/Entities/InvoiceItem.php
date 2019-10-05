<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = ['fee_type_id','invoice_id','total'];

    public function fee_types()
    {
        return $this->belongsTo('Modules\StudentFee\Entities\FeeType','fee_type_id');
    }
}
