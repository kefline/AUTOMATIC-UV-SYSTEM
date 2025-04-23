<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        
        $adminRole = Role::where('slug', 'admin')->first();
        
        User::factory()->create([
            'name' => 'Admin',
            'password'=> 'password123',
            'email' => 'priscaephraim690@gmail.com',
            'role_id' => $adminRole->id,
        ]);
        
        // Add the SolarSystemSeeder
        $this->call(SolarSystemSeeder::class);
    }
}