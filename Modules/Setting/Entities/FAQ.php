<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = ['question','answer','categories'];
    protected $table='f_a_qs';
}
