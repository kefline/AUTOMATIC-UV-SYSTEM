<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\UserController;
Route::get('/', [AuthController::class, 'login'])->name('Auth.login'); // GET request to load the login form.
Route::post('/', [AuthController::class, 'authenticate'])->name('Auth.authenticate'); // POST request to handle login submission.
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');


Route::get('/index',[AdminController::class, 'index'])->name('Admin.index');
Route::get('/performance',[PerformanceController::class, 'performance'])->name('performance.performance');
Route::get('/list',[UserController::class, 'list'])->name('users.list');
Route::get('/add',[UserController::class, 'RegistrationForm'])->name('users.add');
Route::post('/add', [UserController::class, 'add_users']);
