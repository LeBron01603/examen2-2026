<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequisicionController;

Route::post('/requisiciones', [RequisicionController::class, 'store']);
