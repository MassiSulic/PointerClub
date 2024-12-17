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
        Schema::create('perros', function (Blueprint $table) {
            $table->id(); // ID único auto incrementable (clave primaria)
            $table->unsignedBigInteger('user_id'); // Relación con la tabla users
            $table->string('conductor', 50); // Nombre del conductor
            
            
            // Campos numéricos
            $table->unsignedBigInteger('chip')->unique(); // N° de chip/microchip, entero positivo único
            $table->unsignedInteger('loe')->unique(); // LOE, entero positivo único
            $table->unsignedSmallInteger('cartilla')->nullable(); // Cartilla, entero pequeño, no obligatorio
            
            // Otros campos
            $table->string('nombre_perro', 50);
            $table->enum('raza', ['Pointer', 'Setter Inglés', 'Setter Gordon', 'Setter Irlandés']);
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->string('pais', 20);
            $table->string('numero_socio_propietario', 10)->nullable();
        
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // Soft delete
        
            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perros');
    }
};
