<?php

namespace Modules\Attendance\Entities;

use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model
{
    protected $fillable = ['staff_id','session_id','attendance','date','remarks','status'];
}
