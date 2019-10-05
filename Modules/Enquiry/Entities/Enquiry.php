<?php

namespace Modules\Enquiry\Entities;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = ['name','phone','email','subject','message','session_id'];
}
