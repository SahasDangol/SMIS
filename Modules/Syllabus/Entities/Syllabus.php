<?php

namespace Modules\Syllabus\Entities;

use Illuminate\Database\Eloquent\Model;

class syllabus extends Model
{
    protected $fillable = ['title','description','file','classroom_id'];

    protected $table='syllabus';
}
