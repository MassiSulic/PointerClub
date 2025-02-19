<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrecioColumnsToPruebasTable extends Migration
{
    public function up()
    {
        Schema::table('pruebas', function (Blueprint $table) {
            $table->decimal('precio_socio', 8, 2)->after('disciplina');
            $table->decimal('precio_no_socio', 8, 2)->after('precio_socio');
        });
    }

    public function down()
    {
        Schema::table('pruebas', function (Blueprint $table) {
            $table->dropColumn(['precio_socio', 'precio_no_socio']);
        });
    }
}
