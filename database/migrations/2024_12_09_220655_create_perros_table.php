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
            $table->id(); // bigint(20) UNSIGNED AUTO_INCREMENT (clave primaria)

            // Relación con la tabla users
            $table->unsignedBigInteger('user_id')->index(); // Índice

            // Información del perro
            $table->string('conductor', 255); // varchar(255)
            $table->unsignedBigInteger('chip')->index(); // bigint(20) UNSIGNED con índice
            $table->unsignedInteger('loe')->index(); // int(10) UNSIGNED con índice
            $table->unsignedInteger('cartilla')->nullable(); // int(10) UNSIGNED NULL
            $table->string('nombre_perro', 50); // varchar(50)

            // Enumeraciones
            $table->enum('raza', ['Pointer', 'Setter Inglés', 'Setter Gordon', 'Setter Irlandés']);
            $table->enum('sexo', ['Macho', 'Hembra']);

            // Otros campos
            $table->string('pais', 20); // varchar(20)

            // Timestamps
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // deleted_at NULL

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
