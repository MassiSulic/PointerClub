<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerroPruebaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perro_prueba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perro_id')->constrained('perros')->onDelete('cascade'); // Relación con perros
            $table->foreignId('prueba_id')->constrained('pruebas')->onDelete('cascade'); // Relación con pruebas
            $table->date('fecha'); // Fecha específica de la inscripción
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perro_prueba');
    }
}
