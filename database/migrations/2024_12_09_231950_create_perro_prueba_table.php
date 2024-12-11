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
        Schema::create('perro_prueba', function (Blueprint $table) {
            $table->id(); // ID autoincrementable
            $table->unsignedBigInteger('perro_id'); // Clave foránea para perros
            $table->unsignedBigInteger('prueba_id'); // Clave foránea para pruebas
            $table->timestamps();

            // Restricción para que un conductor no pueda exceder 8 perros por prueba
            $table->unique(['prueba_id', 'perro_id']);

            // Claves foráneas
            $table->foreign('perro_id')->references('id')->on('perros')->onDelete('cascade');
            $table->foreign('prueba_id')->references('id')->on('pruebas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perro_prueba');
    }
};
