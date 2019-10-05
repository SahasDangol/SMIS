<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class QuickLink extends Model
{
    protected $fillable = ['site_name','links','description'];
}
