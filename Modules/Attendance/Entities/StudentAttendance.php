<?php

namespace Modules\Attendance\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable = ['session_id', 'student_id', 'classroom_id', 'section_id', 'date', 'attendance'];
}
