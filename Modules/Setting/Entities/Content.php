<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','description','summary'];
}
