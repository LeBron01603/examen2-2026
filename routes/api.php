<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequisicionController;

Route::post('/requisiciones', [RequisicionController::class, 'store']);
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::post('/materiales', [MaterialController::class, 'store']);
use App\Http\Controllers\MaterialUpdateController;

// Endpoint para actualizar un Material existente mediante su código alfanumérico
Route::put('/materiales/{codigo}', [MaterialUpdateController::class, 'update']);
