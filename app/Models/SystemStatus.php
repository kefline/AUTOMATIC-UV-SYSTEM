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
        'last_updated',
        'total_charging',
        'min_charging',
        'max_charging',
        'one_hour_usage',
    ];
    
    protected $casts = [
        'last_updated' => 'datetime'
    ];
}