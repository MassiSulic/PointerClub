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
        Schema::table('perros', function (Blueprint $table) {
            // Asegúrate de que las columnas existan antes de modificarlas
            if (Schema::hasColumn('perros', 'user_id')) {
                $table->unsignedBigInteger('user_id')->change(); // Asegúrate de que sea unsignedBigInteger
            } else {
                $table->unsignedBigInteger('user_id'); // Añadir la columna si no existe
            }

             // Modificar los campos numéricos
            if (Schema::hasColumn('perros', 'chip')) {
                $table->unsignedBigInteger('chip')->unique()->change(); // Asegúrate de que sea unsignedBigInteger y único
            } else {
                $table->unsignedBigInteger('chip')->unique(); // Añadir la columna si no existe
            }

            if (Schema::hasColumn('perros', 'loe')) {
                $table->unsignedInteger('loe')->unique()->change(); // Asegúrate de que sea unsignedInteger y único
            } else {
                $table->unsignedInteger('loe')->unique(); // Añadir la columna si no existe
            }

            if (Schema::hasColumn('perros', 'cartilla')) {
                $table->unsignedInteger('cartilla')->nullable()->change(); // Cambiar a unsignedInteger y nullable
            } else {
                $table->unsignedInteger('cartilla')->nullable(); // Añadir la columna si no existe
            }

            // Modificar otros campos
            if (Schema::hasColumn('perros', 'nombre_perro')) {
                $table->string('nombre_perro', 50)->change();
            } else {
                $table->string('nombre_perro', 50);
            }

            if (Schema::hasColumn('perros', 'raza')) {
                $table->enum('raza', ['Pointer', 'Setter Inglés', 'Setter Gordon','Setter Irlandés'])->change();
            } else {
                $table->enum('raza', ['Pointer', 'Setter Inglés', 'Setter Gordon','Setter Irlandés']);
            }

            if (Schema::hasColumn('perros', 'sexo')) {
                $table->enum('sexo', ['Macho', 'Hembra'])->change();
            } else {
                $table->enum('sexo', ['Macho', 'Hembra']);
            }

            if (Schema::hasColumn('perros', 'pais')) {
                $table->string('pais', 20)->change();
            } else {
                $table->string('pais', 20);
            }

            if (Schema::hasColumn('perros', 'numero_socio_propietario')) {
                $table->string('numero_socio_propietario', 10)->nullable()->change();
            } else {
                $table->string('numero_socio_propietario', 10)->nullable();
            }

            // Asegúrate de que las claves foráneas existan
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('conductor_id')->references('id')->on('conductores')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perros', function (Blueprint $table) {
            // Revertir los cambios realizados en la migración
            $table->dropForeign(['user_id']);
            $table->dropForeign(['conductor_id']);
            $table->dropColumn([
                'user_id',
                'conductor_id',
                'chip',
                'loe',
                'cartilla',
                'nombre_perro',
                'raza',
                'sexo',
                'pais',
                'numero_socio_propietario',
            ]);
        });
    }
};
