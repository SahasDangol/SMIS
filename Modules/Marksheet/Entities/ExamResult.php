<?php

namespace Modules\Marksheet\Entities;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = ['session_id','classroom_id','section_id','student_id','exam_id','full_mark','pass_mark','grade','percentage','rank'];
}
