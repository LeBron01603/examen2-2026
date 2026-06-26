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
        Schema::create('materiales', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->string('unidad_medida');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->unsignedBigInteger('id_categoria');

            $table->foreign('id_categoria')
                ->references('id_categoria')
                ->on('categorias')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
