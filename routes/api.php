<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PerformanceController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/insert",[AuthController::class, "h3ello"]);


Route::get('/system/dashboard', [DashboardController::class, 'getData']);

Route::post('/system/status', [DashboardController::class, 'updateSystemStatus']);   
Route::get('/system/weekly-production', [DashboardController::class, 'getWeeklyProduction']); 

Route::get('/panel/status', [DashboardController::class, 'getPanelStatus']);         
Route::post('/panel/status', [DashboardController::class, 'updatePanelStatus']);    


Route::post('/chat/send', [ChatController::class, 'send']);
Route::get('/chat/messages', [ChatController::class, 'messages']);

Route::get('/solar-production', [DashboardController::class, 'getSolarProduction']);
Route::get('/battery-data', [DashboardController::class, 'getBatteryData']);
Route::get('/performance-details', [DashboardController::class, 'getPerformanceDetails']);
Route::get('/device-performance', [DashboardController::class, 'getDevicePerformance']);
Route::get('/power-statistics', [DashboardController::class, 'getPowerStatistics']);
Route::get('/generation-details', [DashboardController::class, 'getGenerationDetails']);
Route::get('/time-frame-options', [DashboardController::class, 'getTimeFrameOptions']);

Route::get('/weather-forecast', [DashboardController::class, 'getWeatherForecast']);
Route::get('/uv-intensity', [DashboardController::class, 'getUVIntensity']);



Route::get('/test-generation', function () {
    $start = Carbon::now('Africa/Nairobi')->startOfMonth();
    $end = Carbon::now('Africa/Nairobi')->endOfMonth();

    $data = DB::table('system_statuses')
        ->selectRaw("TO_CHAR(last_updated, 'YYYY-MM') AS month")
        ->selectRaw("SUM(COALESCE(current_production, 0)) AS total_production")
        ->selectRaw("SUM(COALESCE(current_consumption, 0)) AS total_consumption")
        ->whereBetween('last_updated', [$start, $end])
        ->groupByRaw("TO_CHAR(last_updated, 'YYYY-MM')")
        ->orderBy('month')
        ->get();

    return response()->json($data);
});