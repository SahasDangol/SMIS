<?php

namespace Modules\Notice\Entities;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['title','body','image'];
}
