<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','description','category','current_stock'];
}
