<?php

namespace Modules\NewsAndEvents\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsAndEvents extends Model
{
    protected $fillable = ['title','date','start','end','no_of_days','location','description'];
}
