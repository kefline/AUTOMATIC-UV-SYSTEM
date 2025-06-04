<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

// Authentication Routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Home Route
Route::get('/', function () {
    return redirect()->route('login');
});

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('Admin.index');
    Route::get('/performance', [PerformanceController::class, 'performance'])->name('performance.performance');
    
    // User Management Routes
    Route::get('/add', [UserController::class, 'RegistrationForm'])->name('users.add');
    Route::post('/add', [UserController::class, 'add_users']);
    
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/settings', [ProfileController::class, 'settings'])->name('profile.settings');
        Route::post('/settings/update', [ProfileController::class, 'updateSettings'])->name('profile.settings.update');
        Route::post('/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    });

    // Chat routes
    Route::get('/chat', [MessageController::class, 'index'])->name('chat');
    Route::get('/messages', [MessageController::class, 'getMessages']);
    Route::post('/messages', [MessageController::class, 'sendMessage']);
    Route::post('/messages/read', [MessageController::class, 'markAsRead']);
    Route::get('/users', [MessageController::class, 'getUsers']);
    Route::get('/admins', [MessageController::class, 'getAdmins']);

    // Power Monitoring Routes
   
});

