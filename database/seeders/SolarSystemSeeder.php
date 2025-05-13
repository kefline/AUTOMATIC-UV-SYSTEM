<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SolarPanel;
use App\Models\SystemStatus;

class SolarSystemSeeder extends Seeder
{
    public function run()
    {
        SolarPanel::create([
            'panel_id' => 'PANEL001',
            'status' => 'active',
            'current_angle' => 45,
            'current_efficiency' => 76
        ]);
        
        SolarPanel::create([
            'panel_id' => 'PANEL002',
            'status' => 'active',
            'current_angle' => 42,
            'current_efficiency' => 74
        ]);
        
        SystemStatus::create([
            'total_capacity' => 210,      
            'current_production' => 95.5,      
            'current_consumption' => 90,     
            'overall_efficiency' => 100,      
            'total_charging' => 80.88,     
            'min_charging' => 3.0,         
            'max_charging' => 6.0,         
            'one_hour_usage' => 6.8,      
            'last_updated' => now()
        ]);
    }
}