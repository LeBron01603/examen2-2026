<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    /**
     * @test
     */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        $categoria = Categoria::create([
            'nombre' => 'Categoria de prueba QA'
        ]);

        $response = $this->postJson('/api/materiales', [
            'codigo' => 'MAT-TEST-99',
            'unidad_medida' => 'Unidad',
            'descripcion' => 'Material de prueba QA',
            'ubicacion' => 'Bodega Central',
            'id_categoria' => $categoria->id_categoria,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('materiales', [
            'codigo' => 'MAT-TEST-99',
        ]);
    }
}
