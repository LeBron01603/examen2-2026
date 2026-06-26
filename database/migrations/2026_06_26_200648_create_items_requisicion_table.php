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
        Schema::create('items_requisicion', function (Blueprint $table) {
            $table->bigIncrements('id_item_requisicion');
            $table->unsignedBigInteger('id_requisicion');
            $table->string('codigo');
            $table->timestamps();

            $table->foreign('id_requisicion')
                ->references('id_requisicion')
                ->on('requisiciones')
                ->onDelete('cascade');

            $table->foreign('codigo')
                ->references('codigo')
                ->on('materiales')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_requisicion');
    }
};
