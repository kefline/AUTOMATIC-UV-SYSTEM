<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Get users with this role
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    /**
     * Check if this role is admin
     */
    public function isAdmin()
    {
        return $this->slug === 'admin';
    }
    
    /**
     * Check if this role is customer
     */
    public function isCustomer()
    {
        return $this->slug === 'customer';
    }
}