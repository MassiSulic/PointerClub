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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint(20) UNSIGNED AUTO_INCREMENT

            // Nuevas columnas de la tabla real
            $table->string('identificacion', 12)->index(); // varchar(12)
            $table->string('direccion', 50); // varchar(50)
            $table->string('municipio', 50); // varchar(50)
            $table->string('region', 20); // varchar(20)
            $table->string('pais', 20); // varchar(20)
            $table->string('telefono', 20); // varchar(20)

            // Columnas existentes en la tabla original
            $table->string('name'); // varchar(255)
            $table->string('email')->unique()->index(); // varchar(255) + Índice único
            $table->timestamp('email_verified_at')->nullable(); // timestamp NULL
            $table->string('password'); // varchar(255)
            $table->string('remember_token', 100)->nullable(); // varchar(100) NULL

            // Columnas de timestamps
            $table->timestamps(); // created_at y updated_at
        });

        // Tabla de restablecimiento de contraseñas
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabla de sesiones
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
