<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/insert",[AuthController::class, "h3ello"]);
Route::get('/dashboard', [DashboardController::class, 'getData']);

// Update system status from microcontroller
Route::post('/update-status', [DashboardController::class, 'updateStatus']);
Route::post('/chat/send', [ChatController::class, 'send']);
Route::get('/chat/messages', [ChatController::class, 'messages']);