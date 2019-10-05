<?php

namespace Modules\Marksheet\Entities;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['session_id', 'exam_id','subject_id','student_id','classroom_id','section_id','marks','th_marks','pr_marks','th_result','pr_result', 'result', 'remarks',
        'post_by','is_verified','verified_at','verified_by','hits','status'];
    public function sections(){
        return $this->belongsTo('Modules\Classroom\Entities\Section','section_id');
    }
    public function classrooms(){
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function students(){
        return $this->belongsTo('Modules\Student\Entities\Student','student_id');
    }
    public function exam(){
        return $this->belongsTo('Modules\Exam\Entities\ExamList','exam_id');
    }
    public function subject(){
        return $this->belongsTo('Modules\Subject\Entities\Subject','subject_id');
    }
}
