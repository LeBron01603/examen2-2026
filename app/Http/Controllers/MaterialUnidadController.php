<?php

namespace App\Http\Controllers;

use App\Models\MaterialUnidad;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MaterialUnidadController extends Controller
{
    /**
     * Store a newly created material unit association.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'cantidad' => 'required|integer',
            'id_unidad' => 'required|exists:unidades,id_unidad',
            'codigo' => 'required|string|exists:materiales,codigo',
            'codigo_presupuesto' => 'required|string|exists:presupuestos,codigo_presupuesto',
        ]);

        $materialUnidad = MaterialUnidad::create($validated);

        return response()->json([
            'message' => 'Asociación de material y unidad creada con éxito',
            'data' => $materialUnidad,
        ], 201);
    }
}
