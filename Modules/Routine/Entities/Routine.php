<?php

namespace Modules\Routine\Entities;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable = ['classroom_id','section_id','routine_photo'];
}
