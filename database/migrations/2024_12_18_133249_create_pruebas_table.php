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
            $table->id(); // Columna 'id' con AUTO_INCREMENT
            $table->string('nombre_prueba', 50); // Columna 'nombre_prueba' (varchar(50))
            $table->string('fecha', 255); // Columna 'fecha' (varchar(255))
            $table->string('lugar', 50); // Columna 'lugar' (varchar(50))
            $table->enum('disciplina', ['Gran Búsqueda (GB)', 'Búsqueda de Caza (BC)', 'Caza Práctica (CP)','Caza Práctica sobre Becada (CP Becada)','Caza Práctica en Montaña (CP Montaña)','Clásica sobre Codorniz (Clásica)','Prueba de aptitudes naturales (PAN)','Diploma de iniciación (DI)','Exposición Monográfica (Monográfica A)','Concurso Monográfico (Monográfica B)']); // Columna 'disciplina' (enum)
            $table->string('nombre_juez_1', 50)->nullable(); // Columna 'nombre_juez_1' (nullable)
            $table->string('nombre_juez_2', 50)->nullable(); // Columna 'nombre_juez_2' (nullable)
            $table->string('nombre_juez_3', 50)->nullable(); // Columna 'nombre_juez_3' (nullable)
            $table->timestamps(); // Columnas 'created_at' y 'updated_at'
            $table->softDeletes(); // Columna 'deleted_at' para eliminación suave
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas_inscriptas');
    }
};
