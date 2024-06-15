<?php

use App\Http\Controllers\Api\AuthenticatedSessionController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('api.login');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('api.register');
