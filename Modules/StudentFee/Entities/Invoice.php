<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Classroom\Entities\Classroom;

/**
 * @property  total
 */
class Invoice extends Model
{
    protected $fillable = ['session_id', 'student_id', 'date', 'title',
        'description', 'paid', 'total','discount','balance','previous_dues',
        'static_previous_dues', 'previous_invoice_id'];

    public function classrooms()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function sections()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Section','section_id');
    }
    public function students()
    {
        return $this->belongsTo('Modules\Student\Entities\Student','student_id');
    }
    public function invoice_items()
    {
        return $this->hasMany('Modules\StudentFee\Entities\InvoiceItem');
    }
    public function student_payments()
    {
        return $this->hasMany('Modules\StudentFee\Entities\StudentPayment');
    }

}