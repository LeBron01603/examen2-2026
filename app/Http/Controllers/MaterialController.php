<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MaterialController extends Controller
{
    /**
     * Store a newly created material in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'codigo' => 'required|string|unique:materiales,codigo',
            'unidad_medida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'id_categoria' => 'required|exists:categorias,id_categoria',
        ]);

        $material = Material::create($validated);

        return response()->json([
            'message' => 'Material creado correctamente.',
            'data' => $material,
        ], 201);
    }
}
