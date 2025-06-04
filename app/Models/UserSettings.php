<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'notification_preferences',
        'theme_preference',
        'language',
        'security_settings'
    ];

    protected $casts = [
        'notification_preferences' => 'array',
        'security_settings' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 