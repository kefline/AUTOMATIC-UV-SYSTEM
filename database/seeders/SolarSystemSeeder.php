<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SolarPanel;
use App\Models\SystemStatus;

class SolarSystemSeeder extends Seeder
{
    public function run()
    {
        // Create two test panels
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
        
        // Create initial system status matching dashboard values
        SystemStatus::create([
            'total_capacity' => 210,       // 210 kWh as shown in dashboard
            'current_production' => 0,      // 0 kW as shown in Power Generation
            'current_consumption' => 0,     // 0 kWh as shown in Energy Consumed
            'overall_efficiency' => 0,      // 0% as shown in Solar Efficiency
            'battery_level' => 78.5,       // Based on gauge in dashboard showing ~75%
            'total_charging' => 80.88,     // 80.88 as shown under Total Charging
            'min_charging' => 3.0,         // Min 3.0 as shown in dashboard
            'max_charging' => 6.0,         // Max 6.0 as shown in dashboard
            'power_usage' => 12.35,        // 12.35 as shown under Power Usage
            'one_hour_usage' => 6.8,       // 6.8 kWh as shown in dashboard
            'yield' => 178,                // 178 kWh as shown in dashboard
            'last_updated' => now()
        ]);
    }
}