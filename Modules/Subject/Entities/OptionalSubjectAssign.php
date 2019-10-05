<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;

class OptionalSubjectAssign extends Model
{
    protected $fillable = ['student_id','optional_subject1_id','optional_subject2_id','session_id'];

    public function students(){
        return $this->belongsTo('Modules\Student\Entities\Student','student_id');
    }
}
