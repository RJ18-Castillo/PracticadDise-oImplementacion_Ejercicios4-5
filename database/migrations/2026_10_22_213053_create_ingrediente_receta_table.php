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
    Schema::create('ingrediente_receta', function (Blueprint $table) {
        $table->id();
        $table->foreignId('receta_id')->constrained('recetas')->cascadeOnDelete();
        $table->foreignId('ingrediente_id')->constrained('ingredientes')->cascadeOnDelete();
        $table->decimal('cantidad', 8, 2);
        $table->string('unidad_medida', 30);
        $table->timestamps();

        $table->unique(['receta_id', 'ingrediente_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingrediente_receta');
    }
};
