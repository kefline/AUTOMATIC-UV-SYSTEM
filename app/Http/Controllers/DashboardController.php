<?php

namespace App\Http\Controllers;

use App\Models\SolarPanel;
use App\Models\SystemStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Existing Methods (unchanged)
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

        $panel = SolarPanel::latest()->first();

        return response()->json([
            'system_status' => [
                'total_capacity' => $status->total_capacity,
                'current_production' => $status->current_production,
                'current_consumption' => $status->current_consumption,
                'overall_efficiency' => $status->overall_efficiency,
                'battery_level' => $status->battery_level,
                'total_charging' => $status->total_charging,
                'min_charging' => $status->min_charging,
                'max_charging' => $status->max_charging,
                'power_usage' => $status->power_usage,
                'one_hour_usage' => $status->one_hour_usage,
                'yield' => $status->yield,
                'last_updated' => $status->last_updated,
            ],
            'panel_status' => [
                'status' => $panel?->status ?? 'Offline',
                'current_angle' => $panel?->current_angle ?? 0,
                'current_efficiency' => $panel?->current_efficiency ?? 0,
            ]
        ]);
    }

    public function getPanelStatus()
    {
        $panel = SolarPanel::latest()->first();

        return response()->json([
            'status' => $panel?->status ?? 'Offline',
            'current_angle' => $panel?->current_angle ?? 0,
            'current_efficiency' => $panel?->current_efficiency ?? 0,
        ]);
    }

    public function updateSystemStatus(Request $request)
    {
        $validatedData = $request->validate([
            'overall_efficiency' => 'nullable|numeric|min:0|max:100',
            'current_production' => 'nullable|numeric|min:0',
            'current_consumption' => 'nullable|numeric|min:0',
            'battery_level' => 'nullable|numeric|min:0|max:100',
            'total_charging' => 'nullable|numeric',
            'min_charging' => 'nullable|numeric',
            'max_charging' => 'nullable|numeric',
            'power_usage' => 'nullable|numeric',
            'one_hour_usage' => 'nullable|numeric',
            'yield' => 'nullable|numeric',
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

        return response()->json([
            'message' => 'System status updated',
            'status' => $status
        ]);
    }

    public function updatePanelStatus(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');
        if (!$apiKey || $apiKey !== env('MICROCONTROLLER_API_KEY', 'lTXKl4Fw6t4CQ3TmQMb7DE3QmOAJzX7GknADWKZjOjI=')) {
            return response()->json([
                'message' => 'Unauthorized access. Invalid or missing API key.',
                'error' => true
            ], 401);
        }

        $validatedData = $request->validate([
            'panel_id' => 'required|string',
            'panel_status' => 'nullable|string',
            'panel_angle' => 'nullable|numeric',
            'overall_efficiency' => 'nullable|numeric|min:0|max:100'
        ]);

        $updateData = [];
        if ($request->has('panel_status')) {
            $updateData['status'] = $request->input('panel_status');
        }
        if ($request->has('panel_angle')) {
            $updateData['current_angle'] = $request->input('panel_angle');
        }
        if ($request->has('overall_efficiency')) {
            $updateData['current_efficiency'] = $request->input('overall_efficiency');
        }

        if (!empty($updateData)) {
            $panel = SolarPanel::updateOrCreate(
                ['panel_id' => $request->input('panel_id')],
                $updateData
            );
            return response()->json([
                'message' => 'Panel status updated successfully',
                'panel' => $panel
            ]);
        }

        return response()->json([
            'message' => 'No update data provided. Please include at least one of: panel_status, panel_angle, or overall_efficiency',
            'error' => true
        ], 422);
    }

    public function getWeeklyProduction()
    {
        $oneWeekAgo = Carbon::now()->subDays(7);
        $data = SystemStatus::where('created_at', '>=', $oneWeekAgo)->get();

        $averageProduction = $data->avg('current_production');

        return response()->json([
            'average_weekly_production' => round($averageProduction, 2),
            'data_points' => $data->count()
        ]);
    }


    public function getSolarProduction()
    {
        $status = SystemStatus::latest()->first();

        return response()->json([
            'solar_production' => round($status->total_charging ?? 0, 2)
        ]);
    }


    public function getBatteryData()
    {
        $status = SystemStatus::latest()->first();

        return response()->json([
            'charged' => round($status->min_charging ?? 0, 2),
            'discharged' => round($status->max_charging ?? 0, 2)
        ]);
    }


    public function getPerformanceDetails(Request $request)
    {
        $mockData = [
            'today' => [
                'lighting' => 25,
                'cooking' => 35,
                'heating' => 20,
                'electronics' => 20
            ],
            'yesterday' => [
                'lighting' => 22,
                'cooking' => 30,
                'heating' => 18,
                'electronics' => 20
            ],
            'monthly' => [
                'lighting' => 750,
                'cooking' => 1200,
                'heating' => 600,
                'electronics' => 450
            ],
            'lastmonth' => [
                'lighting' => 700,
                'cooking' => 1100,
                'heating' => 550,
                'electronics' => 450
            ]
        ];

        $timeFrame = $request->query('time_frame', 'today');

        return response()->json($mockData[$timeFrame] ?? $mockData['today']);
    }


    public function getDevicePerformance()
    {
        return response()->json([
            'devices' => [
                [
                    'name' => 'Inverter 1',
                    'performance' => 95,
                    'status' => 'Optimal'
                ],
                [
                    'name' => 'Inverter 2',
                    'performance' => 85,
                    'status' => 'Good'
                ],
                [
                    'name' => 'Battery 1',
                    'performance' => 90,
                    'status' => 'Optimal'
                ]
            ]
        ]);
    }


    public function getPowerStatistics()
    {
        return response()->json([
            'inverter_power' => 2.362,
            'feed_in_power' => -4.936,
            'load_power' => 6.358
        ]);
    }

    public function getGenerationDetails(Request $request)
    {
        $timeFrame = $request->query('time_frame', 'today');
        $startDate = Carbon::now();
        $endDate = Carbon::now();

        switch ($timeFrame) {
            case 'yesterday':
                $startDate = Carbon::yesterday()->startOfDay();
                $endDate = Carbon::yesterday()->endOfDay();
                break;
            case 'monthly':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'lastmonth':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'today':
            default:
                $startDate = Carbon::today()->startOfDay();
                $endDate = Carbon::today()->endOfDay();
                break;
        }

        $data = SystemStatus::select(
            DB::raw('DATE(last_updated) as date'),
            DB::raw('SUM(current_production) as total_production'),
            DB::raw('SUM(current_consumption) as total_consumption')
        )
            ->whereBetween('last_updated', [$startDate, $endDate])
            ->groupBy('date')
            ->get();

        $data = $data->unique('date');
    }
}
