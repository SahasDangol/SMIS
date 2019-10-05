<?php

namespace Modules\Exam\Entities;

use Illuminate\Database\Eloquent\Model;

class ExamList extends Model
{
    protected $fillable = ['id','name','final_term_contribution','remarks','status'];

    public function exam_routines(){
        return $this->hasMany('Modules\Exam\Entities\ExamRoutine');
    }
}
