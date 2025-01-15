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
            $table->string('numero_socio', 10)->nullable()->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('perros', function (Blueprint $table) {
            $table->dropColumn('numero_socio');
        });
    }

};
