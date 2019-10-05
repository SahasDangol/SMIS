<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class AcademicsYear extends Model
{
    protected $fillable = ['session', 'year', 'remarks'];
}
