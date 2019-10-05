<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    protected $fillable = ['name','starting_date','ending_date','remarks'];


}
