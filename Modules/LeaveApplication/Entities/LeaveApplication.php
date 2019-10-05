<?php

namespace Modules\LeaveApplication\Entities;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    protected $fillable = ['date', 'student_id','subject','content', 'remarks'];

    public function students(){
        return $this->belongsTo('Modules\Student\Entities\Student','student_id');
    }
}
