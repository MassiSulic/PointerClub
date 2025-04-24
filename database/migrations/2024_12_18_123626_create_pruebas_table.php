<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_prueba');
            $table->date('fecha');
            $table->string('lugar');
            $table->string('disciplina');
            $table->string('nombre_juez_1')->nullable();
            $table->string('nombre_juez_2')->nullable();
            $table->string('nombre_juez_3')->nullable();
            $table->softDeletes(); // Para habilitar SoftDeletes
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
        Schema::dropIfExists('pruebas');
    }
};
