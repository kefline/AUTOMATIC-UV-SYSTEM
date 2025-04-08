<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'Administrator with full system access',
        ]);

        Role::create([
            'name' => 'Customer',
            'slug' => 'customer',
            'description' => 'Regular customer user with limited access',
        ]);
    }
}
