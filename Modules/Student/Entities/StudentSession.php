<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentSession extends Model
{
    protected $fillable = ['session_id', 'student_id', 'classroom_id', 'section_id', 'roll'];

    public function classrooms()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Classroom','classroom_id');
    }
    public function sections()
    {
        return $this->belongsTo('Modules\Classroom\Entities\Section','section_id');
    }
    public function students()
    {
        return $this->belongsTo('Modules\Student\Entities\Student','student_id');
    }
}
