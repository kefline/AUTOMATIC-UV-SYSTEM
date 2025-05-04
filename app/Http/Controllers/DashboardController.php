<?php

namespace App\Http\Controllers;

use App\Models\SolarPanel;
use App\Models\SystemStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function getData()
    {
        $status = SystemStatus::latest()->first() ?? SystemStatus::create([
            'total_capacity' => 10000,
            'current_production' => 0,
            'current_consumption' => 0,
            'overall_efficiency' => 0,
            'battery_level' => 0,
            'total_charging' => 0,
            'min_charging' => 0,
            'max_charging' => 0,
            'one_hour_usage' => 0,
            'last_updated' => now(),
        ]);

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
                'one_hour_usage' => $status->one_hour_usage,
                'last_updated' => $status->last_updated,
            ],
            'panel_status' => [
                'status' => $panel?->status ?? 'Offline',
                'current_angle' => $panel?->current_angle ?? 0,
                'current_efficiency' => $panel?->current_efficiency ?? 0,
            ],
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
        $validated = $request->validate([
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
            'last_updated' => now(),
        ]);

        return response()->json([
            'message' => 'System status updated',
            'status' => $status,
        ]);
    }

    public function updatePanelStatus(Request $request)
    {
        if ($request->header('X-API-KEY') !== env('MICROCONTROLLER_API_KEY', 'lTXKl4Fw6t4CQ3TmQMb7DE3QmOAJzX7GknADWKZjOjI=')) {
            return response()->json(['message' => 'Unauthorized access. Invalid or missing API key.', 'error' => true], 401);
        }

        $validated = $request->validate([
            'panel_id' => 'required|string',
            'panel_status' => 'nullable|string',
            'panel_angle' => 'nullable|numeric',
            'overall_efficiency' => 'nullable|numeric|min:0|max:100',
        ]);

        $updateData = array_filter([
            'status' => $request->input('panel_status'),
            'current_angle' => $request->input('panel_angle'),
            'current_efficiency' => $request->input('overall_efficiency'),
        ]);

        if (empty($updateData)) {
            return response()->json(['message' => 'No update data provided.', 'error' => true], 422);
        }

        $panel = SolarPanel::updateOrCreate(['panel_id' => $request->input('panel_id')], $updateData);

        return response()->json([
            'message' => 'Panel status updated successfully',
            'panel' => $panel,
        ]);
    }

    public function getWeeklyProduction()
    {
        $data = SystemStatus::where('created_at', '>=', Carbon::now()->subDays(7))->get();

        return response()->json([
            'average_weekly_production' => round($data->avg('current_production'), 2),
            'data_points' => $data->count(),
        ]);
    }

    public function getWeatherForecast()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => 'Dar es Salaam',
            'appid' => env('OPENWEATHERMAP_API_KEY'),
            'units' => 'metric',
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch weather data'], 500);
        }

        $weather = $response->json();

        return response()->json([
            'weather' => [
                'temperature' => data_get($weather, 'main.temp'),
                'description' => data_get($weather, 'weather.0.description'),
                'clouds' => data_get($weather, 'clouds.all'),
            ],
        ]);
    }

    public function getUVIntensity()
    {
        $cacheKey = 'uv_intensity_dar_es_salaam';

        try {
            $data = Cache::remember($cacheKey, 900, function () {
                Log::info('Fetching fresh UV data from OpenWeatherMap');

                $apiKey = env('OPENWEATHERMAP_API_KEY');
                if (empty($apiKey)) {
                    Log::error('OpenWeatherMap API key is missing');
                    return ['error' => 'API key is missing'];
                }

                // Use the UV Index API instead of One Call
                $response = Http::timeout(15)->get('http://api.openweathermap.org/data/2.5/uvi', [
                    'lat' => -6.7924,
                    'lon' => 39.2083,
                    'appid' => $apiKey,
                ]);

                if ($response->failed()) {
                    Log::error('OpenWeatherMap API request failed', ['status' => $response->status(), 'body' => $response->body()]);
                    return ['error' => 'Failed to fetch UV data'];
                }

                $responseData = $response->json();
                Log::info('OpenWeatherMap Response', $responseData);

                $uvIndex = data_get($responseData, 'value');
                if (is_null($uvIndex)) {
                    Log::warning('UV index not found in response', ['response' => $responseData]);
                    return ['error' => 'UV index not found'];
                }

                $uvIndex = floatval($uvIndex);
                $uvIntensity = $this->classifyUVIntensity($uvIndex);

                return [
                    'uvIndex' => $uvIndex,
                    'uvIntensity' => $uvIntensity,
                    'timestamp' => now()->toIso8601String(),
                ];
            });

            if (isset($data['error'])) {
                return response()->json(['error' => $data['error'], 'status' => 'error'], 500);
            }

            return response()->json([
                'uvIndex' => $data['uvIndex'],
                'uvIntensity' => $data['uvIntensity'],
                'timestamp' => $data['timestamp'],
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            Log::error('Exception in UV intensity API: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['error' => 'An unexpected error occurred', 'status' => 'error'], 500);
        }
    }

    private function classifyUVIntensity(float $index): string
    {
        return match (true) {
            $index < 3 => 'Low',
            $index < 6 => 'Moderate',
            $index < 8 => 'High',
            $index < 11 => 'Very High',
            default => 'Extreme',
        };
    }

    public function getPerformanceDetails(Request $request)
    {
        $mockData = [
            'today' => ['lighting' => 25, 'cooking' => 35, 'heating' => 20, 'electronics' => 20],
            'yesterday' => ['lighting' => 22, 'cooking' => 30, 'heating' => 18, 'electronics' => 20],
            'monthly' => ['lighting' => 750, 'cooking' => 1200, 'heating' => 600, 'electronics' => 450],
            'lastmonth' => ['lighting' => 700, 'cooking' => 1100, 'heating' => 550, 'electronics' => 450],
        ];

        $timeFrame = $request->query('time_frame', 'today');

        return response()->json($mockData[$timeFrame] ?? $mockData['today']);
    }

    public function getDevicePerformance()
    {
        return response()->json([
            'devices' => [
                ['name' => 'ESP32 Board', 'performance' => 98, 'status' => 'Optimal'],
                ['name' => 'MG995 Servo Motor', 'performance' => 89, 'status' => 'Good'],
                ['name' => 'LDR Sensors', 'performance' => 92, 'status' => 'Optimal'],
                ['name' => 'Solar Panel', 'performance' => 93, 'status' => 'Optimal'],
                ['name' => 'INA219 Module', 'performance' => 88, 'status' => 'Good'],
                ['name' => 'Li-ion DC Battery', 'performance' => 90, 'status' => 'Optimal'],
                ['name' => 'TP4056 Charger Controller', 'performance' => 87, 'status' => 'Good'],
            ],
        ]);
    }

    public function getPowerStatistics()
    {
        return response()->json([
            'inverter_power' => 2.362,
            'feed_in_power' => -4.936,
            'load_power' => 6.358,
        ]);
    }

    public function getGenerationDetails(Request $request)
    {
        try {
            $timeFrame = $request->query('time_frame', 'thismonth');
            $dateRange = $this->getDateRange($timeFrame);

            $data = SystemStatus::selectRaw("TO_CHAR(last_updated, 'YYYY-MM') AS month")
                ->selectRaw('SUM(current_production) AS total_production')
                ->selectRaw('SUM(current_consumption) AS total_consumption')
                ->whereBetween('last_updated', [$dateRange['start'], $dateRange['end']])
                ->groupByRaw("TO_CHAR(last_updated, 'YYYY-MM')")
                ->orderBy('month')
                ->get();

            $formattedData = $data->map(fn($item) => [
                'month' => $item->month,
                'total_production' => round($item->total_production, 2),
                'total_consumption' => round($item->total_consumption, 2),
            ]);

            return response()->json([
                'start_date' => $dateRange['start']->toDateString(),
                'end_date' => $dateRange['end']->toDateString(),
                'data' => $formattedData,
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getGenerationDetails: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'error' => 'Failed to fetch generation details',
                'status' => 'error',
            ], 500);
        }
    }

    private function getDateRange(string $timeFrame): array
    {
        $now = Carbon::now();

        return match ($timeFrame) {
            'thismonth' => [
                'start' => $now->copy()->startOfMonth(),
                'end' => $now->copy()->endOfMonth(),
            ],
            'lastmonth' => [
                'start' => $now->copy()->subMonth()->startOfMonth(),
                'end' => $now->copy()->subMonth()->endOfMonth(),
            ],
            'last3months' => [
                'start' => $now->copy()->subMonths(2)->startOfMonth(),
                'end' => $now->copy()->endOfMonth(),
            ],
            'last6months' => [
                'start' => $now->copy()->subMonths(5)->startOfMonth(),
                'end' => $now->copy()->endOfMonth(),
            ],
            'year' => [
                'start' => $now->copy()->startOfYear(),
                'end' => $now->copy()->endOfYear(),
            ],
            default => [
                'start' => $now->copy()->startOfMonth(),
                'end' => $now->copy()->endOfMonth(),
            ],
        };
    }

    public function getTimeFrameOptions()
    {
        return response()->json([
            'options' => [
                ['value' => 'thismonth', 'label' => 'This Month'],
                ['value' => 'lastmonth', 'label' => 'Last Month'],
                ['value' => 'last3months', 'label' => 'Last 3 Months'],
                ['value' => 'last6months', 'label' => 'Last 6 Months'],
                ['value' => 'year', 'label' => 'This Year'],
            ],
        ]);
    }
}
