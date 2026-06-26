<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequisicionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialUpdateController;
use App\Http\Controllers\MaterialUnidadController;

Route::post('/requisiciones', [RequisicionController::class, 'store']);
Route::post('/materiales', [MaterialController::class, 'store']);
Route::put('/materiales/{codigo}', [MaterialUpdateController::class, 'update']);
Route::post('/materiales-unidades', [MaterialUnidadController::class, 'store']);
