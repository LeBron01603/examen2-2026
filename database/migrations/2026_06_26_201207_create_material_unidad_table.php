<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->bigIncrements('id_material_unidad'); // Llave primaria de la tabla asociativa
            $table->integer('cantidad');
            
            // Declaración de columnas para llaves foráneas
            $table->unsignedBigInteger('id_unidad');
            $table->string('codigo');
            $table->string('codigo_presupuesto');
            
            $table->timestamps();

            // Definición de restricciones de llaves foráneas y cascada
            $table->foreign('id_unidad')
                  ->references('id_unidad')
                  ->on('unidades')
                  ->onDelete('cascade');

            $table->foreign('codigo')
                  ->references('codigo')
                  ->on('materiales')
                  ->onDelete('cascade');

            $table->foreign('codigo_presupuesto')
                  ->references('codigo')
                  ->on('presupuestos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidad');
    }
};