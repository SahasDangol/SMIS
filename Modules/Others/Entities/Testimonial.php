<?php

namespace Modules\Others\Entities;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name','position','image','testimonial'];
}
