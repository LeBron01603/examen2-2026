<?php

namespace App\Http\Controllers;

use App\Models\ItemRequisicion;
use App\Models\Requisicion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequisicionController extends Controller
{
    /**
     * Store a newly created requisition in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'materiales' => 'required|array',
            'materiales.*.codigo' => 'required|string|exists:materiales,codigo',
        ]);

        DB::beginTransaction();

        try {
            $requisicion = Requisicion::create([
                'fecha' => $validated['fecha'],
                'estado' => 'PENDIENTE',
            ]);

            foreach ($validated['materiales'] as $item) {
                ItemRequisicion::create([
                    'id_requisicion' => $requisicion->id_requisicion,
                    'codigo' => $item['codigo'],
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Requisición creada con éxito',
                'id_requisicion' => $requisicion->id_requisicion,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Error al crear la requisición',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
