<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name', 'subject_code', 'subject_type', 'classroom_id', 'credit_hour', 'full_mark', 'pass_mark','th_full_mark',
        'th_pass_mark','pr_pass_mark','pr_full_mark'];
    public function classrooms()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function marks()
    {
        return $this->hasMany('Modules\Marksheet\Entities\Mark');
    }
    public function subject_teachers(){
        return $this->hasMany('Modules\Subject\Entities\SubjectTeacher');
    }
}
