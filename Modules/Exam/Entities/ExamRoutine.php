<?php

namespace Modules\Exam\Entities;

use Illuminate\Database\Eloquent\Model;

class ExamRoutine extends Model
{
    protected $fillable = ['exam_id','session_id','file','remarks'];

    public function exam_list(){
        return $this->belongsTo('Modules\Exam\Entities\ExamList','exam_id');
    }
}
