<?php

namespace Modules\Transport\Entities;

use Illuminate\Database\Eloquent\Model;

class TransportRoute extends Model
{
    protected $fillable = ['route_name', 'route_fare','vehicle_id', 'remarks'];
}
