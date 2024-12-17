<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('perros', function (Blueprint $table) {
            
            

            // Agregar la columna conductor después de user_id
            $table->string('conductor')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('perros', function (Blueprint $table) {
            // Revertir los cambios realizados en la migración
            

        });
    }
};
