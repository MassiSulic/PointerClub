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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Puede ser el título de la prueba
            $table->text('descripcion'); // Texto principal (se guardará con formato HTML si usas un WYSIWYG)
            $table->text('texto_destacado')->nullable();
            $table->string('imagen1')->nullable(); // Campo para almacenar ruta de la imagen 1
            $table->string('imagen2')->nullable(); // Campo para almacenar ruta de la imagen 2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
