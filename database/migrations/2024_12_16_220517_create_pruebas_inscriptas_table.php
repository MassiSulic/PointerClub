<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasInscriptasTable extends Migration
{
    public function up()
    {
        Schema::create('pruebas_inscriptas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Agregar esta línea
            $table->string('prueba');
            $table->string('fecha', 255); // Columna 'fecha' (varchar(255))
            $table->string('perro');
            $table->integer('valor');
            $table->boolean('pago')->default(false);
            $table->timestamps();

            // Agregar la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pruebas_inscriptas');
    }
}
