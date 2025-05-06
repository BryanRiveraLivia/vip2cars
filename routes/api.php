<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/vehicles', [VehicleController::class, 'apiIndex']);
Route::post('/vehicles', [VehicleController::class, 'apiStore']);
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'apiShow']);
Route::put('/vehicles/{vehicle}', [VehicleController::class, 'apiUpdate']);
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'apiDestroy']);