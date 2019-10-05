<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $fillable = ['student_id','total'];


}
