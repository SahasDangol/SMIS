<?php

namespace Modules\Visitor\Entities;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['name', 'purpose', 'date', 'entry_time', 'leave_time', 'visitor_card_no'];
}
