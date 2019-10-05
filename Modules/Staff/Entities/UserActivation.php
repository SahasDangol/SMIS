<?php

namespace Modules\Staff\Entities;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $fillable = ['id_staff','token'];
}
