<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name','parent_id','level','remarks'];
}
