use App\Http\Controllers\MaterialUpdateController;

// Endpoint para actualizar un Material existente mediante su código alfanumérico
Route::put('/materiales/{codigo}', [MaterialUpdateController::class, 'update']);