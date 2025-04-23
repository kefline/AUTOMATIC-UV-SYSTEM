<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarPanel extends Model
{
    protected $fillable = [
        'panel_id',
        'status',
        'current_angle',
        'current_efficiency'
    ];
}
