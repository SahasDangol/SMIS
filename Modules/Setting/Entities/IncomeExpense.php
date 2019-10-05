<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    protected $fillable = ['month','income','expense'];
}
