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
        Schema::create('conductores', function (Blueprint $table) {
            $table->id(); // ID autoincrementable
            $table->string('identificacion', 12)->unique(); // Identificación única
            $table->string('nombre', 50); // Nombre
            $table->string('apellido', 50); // Apellido
            $table->string('pais', 20); // País
            $table->string('email')->unique(); // Email único
            $table->string('telefono', 20); // Teléfono
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // Soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
