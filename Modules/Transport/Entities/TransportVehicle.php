<?php

namespace Modules\Transport\Entities;

use Illuminate\Database\Eloquent\Model;

class TransportVehicle extends Model
{
    protected $fillable = ['vehicle_name', 'serial_number', 'driver_id'];
}
