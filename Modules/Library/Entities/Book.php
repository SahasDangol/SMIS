<?php

namespace Modules\Library\Entities;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['id','name','category','author_name','publication_name','published_date','price','photo'];


}

