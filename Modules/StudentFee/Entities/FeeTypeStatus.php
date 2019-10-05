<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;

class FeeTypeStatus extends Model
{
    protected $fillable = ['fee_type_id', 'session_id','status'];

    protected $table = 'fee_type_status';
    public function fee_types()
    {
        return $this->belongsTo('Modules\StudentFee\Entities\FeeType','fee_type_id');
    }
    public function sessions()
    {
        return $this->belongsTo('Modules\Setting\Entities\AcademicsYear','session_id');
    }
}
