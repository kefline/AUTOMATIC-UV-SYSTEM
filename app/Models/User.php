<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon; // Make sure Carbon is imported

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'last_seen', // ✅ add last_seen to fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_seen' => 'datetime', // ✅ cast last_seen as datetime
    ];

    /**
     * Get the role associated with the user
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    /**
     * Check if user has a specific role
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->slug === $role;
        }
        
        return $this->role_id === $role->id;
    }
    
    /**
     * Check if user is an admin
     */
    public function isAdmin()
    {
        return $this->role->slug === 'admin';
    }
    
    /**
     * Check if user is a customer
     */
    public function isCustomer()
    {
        return $this->role->slug === 'customer';
    }

    /**
     * Check if the user is online based on last_seen time
     */
    public function getIsOnlineAttribute()
    {
        return $this->last_seen !== null && $this->last_seen->gt(now()->subMinutes(5));
    }
}
