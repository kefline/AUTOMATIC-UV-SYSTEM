<?php

namespace App\Http\Controllers;

use App\Models\SolarPanel;
use App\Models\SystemStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

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
    public function getWeatherForecast()
    {
        $weatherResponse = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => 'Dar es Salaam',
            'appid' => env('OPENWEATHERMAP_API_KEY'),
            'units' => 'metric'
        ]);

        if ($weatherResponse->failed()) {
            return response()->json(['error' => 'Failed to fetch weather data'], 500);
        }

        $weather = $weatherResponse->json();

        return response()->json([
            'weather' => [
                'temperature' => data_get($weather, 'main.temp'),
                'description' => data_get($weather, 'weather.0.description'),
                'clouds' => data_get($weather, 'clouds.all')
            ]
        ]);
    }

    public function getUVIntensity()
    {
        $cacheKey = 'uv_intensity_dar_es_salaam';

        $data = Cache::remember($cacheKey, 1800, function () {
            $response = Http::get('https://api.openweathermap.org/data/3.0/onecall', [
                'lat' => -6.7924,
                'lon' => 39.2083,
                'exclude' => 'minutely,hourly,daily,alerts',
                'appid' => env('OPENWEATHERMAP_API_KEY'),
            ]);

            if ($response->failed()) {
                Log::error('OpenWeatherMap API failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return ['error' => 'Failed to fetch UV data'];
            }

            $uvIndex = data_get($response->json(), 'current.uvi');

            if (is_null($uvIndex)) {
                return ['uvIntensity' => 'None', 'uvIndex' => 0];
            }

            return [
                'uvIndex' => $uvIndex,
                'uvIntensity' => $this->classifyUVIntensity($uvIndex)
            ];
        });

        if (isset($data['error'])) {
            return response()->json(['error' => $data['error']], 500);
        }

        return response()->json($data);
    }

    private function classifyUVIntensity($uvIndex)
    {
        if (!is_numeric($uvIndex) || $uvIndex < 0) {
            return 'Invalid';
        } elseif ($uvIndex <= 2) {
            return 'Low';
        } elseif ($uvIndex <= 5) {
            return 'Moderate';
        } elseif ($uvIndex <= 7) {
            return 'High';
        } elseif ($uvIndex <= 10) {
            return 'Very High';
        } else {
            return 'Extreme';
        }
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
                    'name' => 'ESP32 Board',
                    'performance' => 98,
                    'status' => 'Optimal'
                ],
                [
                    'name' => 'MG995 Servo Motor',
                    'performance' => 89,
                    'status' => 'Good'
                ],
                [
                    'name' => 'LDR Sensors',
                    'performance' => 92,
                    'status' => 'Optimal'
                ],
                [
                    'name' => 'Solar Panel',
                    'performance' => 93,
                    'status' => 'Optimal'
                ],
                [
                    'name' => 'INA219 Module',
                    'performance' => 88,
                    'status' => 'Good'
                ],
                [
                    'name' => 'Li-ion DC Battery',
                    'performance' => 90,
                    'status' => 'Optimal'
                ],
                [
                    'name' => 'TP4056 Charger Controller',
                    'performance' => 87,
                    'status' => 'Good'
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
        $timeFrame = $request->query('time_frame', 'week');
        $startDate = Carbon::now()->startOfWeek(); // Start of the current week (Monday)
        $endDate = Carbon::now()->endOfWeek(); // End of the current week (Sunday)
    
        // Adjust start and end dates based on time frame
        switch ($timeFrame) {
            case 'lastweek':
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate = Carbon::now()->subWeek()->endOfWeek();
                break;
            case 'week':
            default:
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
        }
    
        // Query to aggregate data by 12-hour intervals for each day
        $data = SystemStatus::select(
            DB::raw('DATE(last_updated) as date'),
            DB::raw("CASE 
                        WHEN HOUR(last_updated) < 12 THEN '00:00-12:00' 
                        ELSE '12:00-24:00' 
                     END as time_interval"),
            DB::raw('SUM(current_production) as total_production'),
            DB::raw('SUM(current_consumption) as total_consumption')
            // For averaging instead of summing, use:
            // DB::raw('AVG(current_production) as avg_production'),
            // DB::raw('AVG(current_consumption) as avg_consumption')
        )
            ->whereBetween('last_updated', [$startDate, $endDate])
            ->groupBy('date', 'time_interval')
            ->orderBy('date', 'asc')
            ->orderBy('time_interval', 'asc')
            ->get();
    
        // Format the data for the response
        $formattedData = $data->map(function ($item) {
            return [
                'date' => $item->date,
                'time_interval' => $item->time_interval,
                'total_production' => round($item->total_production, 2),
                'total_consumption' => round($item->total_consumption, 2),
            ];
        });
    
        return response()->json([
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'data' => $formattedData
        ]);
    }
}
