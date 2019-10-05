<?php

namespace Modules\Classroom\Entities;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['session_id','classroom_id', 'name', 'class_teacher_id','capacity'];

    public function classrooms()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function marks()
    {
        return $this->hasMany('Modules\Marksheet\Entities\Mark');
    }
    public function students()
    {
        return $this->hasMany('Modules\Student\Entities\Student');
    }
    public function class_teachers()
    {
        return $this->belongsTo('Modules\Staff\Entities\Staff','class_teacher_id');
    }
    public function student_session()
    {
        return $this->hasMany('Modules\Student\Entities\StudentSession');
    }
}
