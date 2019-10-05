<?php

namespace Modules\StudentFee\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $fillable = ['invoice_id','date', 'amount', 'remarks'];
}
