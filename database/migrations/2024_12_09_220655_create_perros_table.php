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
            $table->string('propietario', 50); // varchar(50)
            $table->date('fecha_nacimiento'); // date
            $table->string('microchip', 16); // varchar(16)
            $table->string('libro_de_origenes', 16); // varchar(16)
            $table->string('cartilla_de_trabajo', 30)->nullable(); // int(30) UNSIGNED NULL
            $table->string('nombre_perro', 50); // varchar(50)

            // Enumeraciones
            $table->enum('raza', ['Pointer', 'Setter Inglés', 'Setter Gordon', 'Setter Irlandés']);
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->enum('conductor', [
                'Albamonte, Sandro',
                'Aringhieri, Samuele',
                'Avril, Davide',
                'Bardon, Pascal',
                'Boissonnade',
                'Boitheauville, Adrien',
                'Borrella, Raúl',
                'Brun',
                'Burlat, Pascal',
                'Cassiaut, Pierre',
                'Cherubini, Fabio',
                'Coulon, Floriant',
                'Faissat, Jerome',
                'Gaitan, Juan Diego',
                'Garcia Vincent',
                'Gaspar Jimenez',
                'Gatti, Stefano',
                'Giovannelli',
                'Gómez, Francisco',
                'Gutierrez, Alberto',
                'Iazzetta, Mauro',
                'Inacio, Ricardo',
                'Jáñez, José Antonio',
                'Laffon, J. M.',
                'Latreille',
                'Lisarde Sabater, Vicente',
                'Locatelli, Roberto',
                'Lorca',
                'Maymard',
                'Medrano, Nacho',
                'Merle Des Isles, Antony',
                'Mitic, Aleksandar',
                'Mora Mota, Jose M.',
                'Nicoletti, Nicola',
                'Nikolic, Zoran',
                'Pezzotta, Giuseppe',
                'Pianaro, Graziano',
                'Sanz, José Luís',
                'Scarpecci, Simone',
                'Soddu, Lucca',
                'Sohier, Patrick',
                'Stankovic, Boban',
                'Tenailleau',
                'Teulieres, Patrick',
                'Trullen, Héctor',
                'Balado, Jesus',
                'Bischi, Leonardo',
                'Blanchet',
                'Bounaude',
                'Bourgeois, Emmanuel',
                'Bruni, Davide',
                'Burresi, Leonardo',
                'Condado, Yann',
                'Dave, Camille',
                'Esser',
                'Fernández, Pablo',
                'Fontecedro, Giuseppe',
                'Garcia Verdejo, Antonio',
                'Gavrilovic, Dejan',
                'Giavarinni, Claudio',
                'Ginestet, A.',
                'Gonzales, Xavi',
                'Hamon, Thierry',
                'Imizcoz, Daniel',
                'Kartalija, Stanislav',
                'Lemos, Rui',
                'Lombardi, Rudy',
                'López, Juan',
                'Maggiolo, Luigi',
                'Massias, Patrick',
                'Mavridis, Thorodis',
                'Moreno, Javier',
                'Moretti',
                'Nunziata, Andrea',
                'Pachis',
                'Palomo, Juan Miguel',
                'Pezzota, Ernesto',
                'Pioppi, Giovanni',
                'Richelli, Matteo',
                'Roche, Nicolas',
                'Sánchez Ropero, Francisco',
                'Scudiero, Paolo',
                'Simeons, Richard',
                'Targuetti, Emannuel',
                'Testa, Angelo',
                'Traina, Severino',
                'Villamiel, César'
            ]); 

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
