<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = ['guardian_first_name','guardian_middle_name','guardian_last_name','guardian_occupation',
        'guardian_phone','guardian_mobile','guardian_temporary_address',
        'guardian_permanent_address','guardian_email','user_id'];

    public function students()
    {
        return $this->hasMany('Modules\Student\Entities\Student');
    }
}
