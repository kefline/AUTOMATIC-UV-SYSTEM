<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemStatus extends Model
{
    protected $fillable = [
        'total_capacity',
        'current_production',
        'current_consumption',
        'overall_efficiency',
        'battery_level',
        'last_updated',
        'total_charging',
        'min_charging',
        'max_charging',
        'power_usage',
        'one_hour_usage',
        'yield'
    ];
    
    protected $casts = [
        'last_updated' => 'datetime'
    ];
}