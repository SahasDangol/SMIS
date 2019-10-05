<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipItem extends Model
{
    protected $fillable = ['session_id', 'student_id', 'fee_type_id', 'percentage'];
}
