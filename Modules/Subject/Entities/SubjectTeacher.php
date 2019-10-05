<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    protected $fillable = ['session_id','teacher_id','classroom_id','section_id','subject_id'];

    public function subject(){
        return $this->belongsTo('Modules\Subject\Entities\Subject','subject_id');
    }
}

