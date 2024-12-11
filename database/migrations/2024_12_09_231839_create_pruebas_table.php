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
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id(); // ID autoincrementable
            $table->string('nombre_prueba', 50); // Nombre de la prueba
            $table->date('fecha'); // Fecha de la prueba
            $table->string('lugar', 50); // Lugar o finca
            $table->enum('disciplina', ['Disciplina 1', 'Disciplina 2', 'Disciplina 3']); // Disciplina
            $table->string('nombre_juez_1', 50)->nullable(); // Nombre del juez 1, no obligatorio
            $table->string('nombre_juez_2', 50)->nullable(); // Nombre del juez 2, no obligatorio
            $table->string('nombre_juez_3', 50)->nullable(); // Nombre del juez 3, no obligatorio
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // Soft delete
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas');
    }
};
