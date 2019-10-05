<?php

namespace Modules\Others\Entities;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = ['name'];

    public function staffs(){
        return $this->hasMany('Modules\Staff\Entities\Staff');
    }
}
