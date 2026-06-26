<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MaterialUpdateController extends Controller
{
    /**
     * Actualiza un material existente utilizando su código alfanumérico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $codigo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $codigo)
    {
        try {
            // Buscar el material por su código alfanumérico identificador
            // Se usa firstOrFail para lanzar automáticamente una excepción 404 si no existe
            $material = Material::where('codigo', $codigo)->firstOrFail();
            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'El material especificado no existe en el sistema.'
            ], 404);
        }

        // Validar los datos entrantes siguiendo las pautas de clean code
        // Se utiliza 'sometimes' para permitir actualizaciones parciales (parches)
        $data = $request->validate([
            'descripcion'  => 'sometimes|required|string|max:255',
            'ubicacion'    => 'sometimes|required|string|max:255',
            'categoria_id' => 'sometimes|required|exists:categorias,id_categoria', 
        ]);

        // Aplicar los cambios validados en la base de datos
        $material->update($data);

        // Retornar la respuesta estructurada en formato JSON con estado 200
        return response()->json([
            'status' => 'success',
            'message' => 'Material actualizado correctamente.',
            'data' => $material
        ], 200);
    }
}