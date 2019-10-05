<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;

class CopyOfInvoice extends Model
{
    protected $fillable = ['session_id', 'student_id', 'title',
        'description', 'paid', 'total','discount','balance'];
}
