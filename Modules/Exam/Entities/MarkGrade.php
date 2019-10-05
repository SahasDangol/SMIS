<?php

namespace Modules\Exam\Entities;

use Illuminate\Database\Eloquent\Model;

class MarkGrade extends Model
{
    protected $fillable = ['id','name','from','upto','grade_from','id','grade_upto','remarks'];
}
