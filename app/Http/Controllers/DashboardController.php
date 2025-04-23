<?php

namespace App\Http\Controllers;

use App\Models\SolarPanel;
use App\Models\SystemStatus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getData()
    {
        $status = SystemStatus::latest()->first();
        
        if (!$status) {
            $status = SystemStatus::create([
                'total_capacity' => 10000,
                'current_production' => 0,
                'current_consumption' => 0,
                'overall_efficiency' => 0,
                'battery_level' => 0,
                'total_charging' => 0,
                'min_charging' => 0,
                'max_charging' => 0,
                'power_usage' => 0,
                'one_hour_usage' => 0,
                'yield' => 0,
                'last_updated' => now()
            ]);
        }
        
        $panels = SolarPanel::all();
        
        return response()->json([
            'solar_efficiency' => $status->overall_efficiency,
            'power_generation' => $status->current_production,
            'energy_consumed' => $status->current_consumption,
            'battery_level' => $status->battery_level,
            'total_capacity' => $status->total_capacity,
            'total_charging' => $status->total_charging,
            'min_charging' => $status->min_charging,
            'max_charging' => $status->max_charging,
            'power_usage' => $status->power_usage,
            'one_hour_usage' => $status->one_hour_usage,
            'yield' => $status->yield,
            'panels' => $panels
        ]);
    }
    
    public function updateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'overall_efficiency' => 'sometimes|numeric|min:0|max:100',
            'current_production' => 'sometimes|numeric|min:0',
            'current_consumption' => 'sometimes|numeric|min:0',
            'battery_level' => 'sometimes|numeric|min:0|max:100',
            'total_charging' => 'sometimes|numeric|nullable',
            'min_charging' => 'sometimes|numeric|nullable',
            'max_charging' => 'sometimes|numeric|nullable',
            'power_usage' => 'sometimes|numeric|nullable',
            'one_hour_usage' => 'sometimes|numeric|nullable',
            'yield' => 'sometimes|numeric|nullable'
        ]);
        
        $status = SystemStatus::create([
            'total_capacity' => $request->input('total_capacity', 10000),
            'current_production' => $request->input('current_production', 0),
            'current_consumption' => $request->input('current_consumption', 0),
            'overall_efficiency' => $request->input('overall_efficiency', 0),
            'battery_level' => $request->input('battery_level', 0),
            'total_charging' => $request->input('total_charging', 0),
            'min_charging' => $request->input('min_charging', 0),
            'max_charging' => $request->input('max_charging', 0),
            'power_usage' => $request->input('power_usage', 0),
            'one_hour_usage' => $request->input('one_hour_usage', 0),
            'yield' => $request->input('yield', 0),
            'last_updated' => now()
        ]);
        
        if ($request->has('panels')) {
            foreach ($request->input('panels') as $panelData) {
                SolarPanel::updateOrCreate(
                    ['panel_id' => $panelData['panel_id']],
                    [
                        'status' => $panelData['status'] ?? 'active',
                        'current_angle' => $panelData['current_angle'] ?? 0,
                        'current_efficiency' => $panelData['current_efficiency'] ?? 0
                    ]
                );
            }
        }
        
        return response()->json([
            'message' => 'Status updated successfully',
            'status' => $status
        ]);
    }
}