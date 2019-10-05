<?php

namespace Modules\Classroom\Entities;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['class_name','section_status','status','remarks'];


    public function subjects(){
        return $this->hasMany('Modules\Subject\Entities\Subject');
    }
    public function students(){
        return $this->hasMany('Modules\Student\Entities\Student');
    }
    public function sections(){
        return $this->hasMany('Modules\Classroom\Entities\Section');
    }
    public function marks()
    {
        return $this->hasMany('Modules\Marksheet\Entities\Mark');
    }
    public function student_session()
    {
        return $this->hasMany('Modules\Student\Entities\StudentSession');
    }

}

