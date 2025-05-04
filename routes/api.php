<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PerformanceController;

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

Route::get('/weather-forecast', [DashboardController::class, 'getWeatherForecast']);
Route::get('/uv-intensity', [DashboardController::class, 'getUVIntensity']);
