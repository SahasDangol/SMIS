<?php

namespace Modules\Complaint\Entities;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $fillable = ['session_id','complain_type','complain_by','phone','email','date','taken_action','note',
        'attach_document'];
}
