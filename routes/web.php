<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'register']);

Route::get('/register_success', function() {
    return view('register_success');
});

Route::get('/dashboard', function() {
    if(!Auth::check()) {
        return redirect('/login');
    }
    return view('dashboard');
});


Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'verify']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/dashboard', [TaskController::class, 'dashboard']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{task}', [TaskController::class, 'edit']);
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus']);
