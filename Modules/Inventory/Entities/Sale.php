<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['date', 'customer_name', 'item_id', 'unit_price', 'quantity', 'total_amount', 'discount', 'final_amount','remarks'];


    public function items()
    {
        return $this->belongsTo('Modules\Inventory\Entities\Item', 'item_id');
    }
}