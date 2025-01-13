<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\RedsysController;

// Definición de todas las vistas que responden al método GET + Rutas con nombre
Route::view('/', 'Inicio')->name('Inicio');
Route::view('elPointer', 'elPointer')->name('elPointer');
Route::view('Concursos', 'Concursos')->name('Concursos');
Route::get('Inscripciones', [PruebaController::class, 'index'])->name('Inscripciones');
Route::view('Resultados', 'Resultados')->name('Resultados');
Route::view('Socios', 'Socios')->name('Socios');
Route::view('Actualidad', 'Actualidad')->name('Actualidad');
Route::view('Contacto', 'Contacto')->name('Contacto');
Route::view('Privacidad', 'Privacidad')->name('Privacidad');
Route::view('Cookies', 'Cookies')->name('Cookies');
Route::view('Envios', 'Envios')->name('Envios');
Route::view('Legal', 'Legal')->name('Legal');

// Rutas de los sub botones
Route::view('JuntaDirectiva', 'JuntaDirectiva')->name('JuntaDirectiva');
Route::view('Delegaciones', 'Delegaciones')->name('Delegaciones');
Route::view('Criaderos', 'Criaderos')->name('Criaderos');
Route::view('Galeria', 'Galeria')->name('Galeria');

// Se comenta esta linea debajo para omitir verificación de email en local
// Route::middleware(['auth', 'verified'])->group(function () {
//Se remplaza por esta linea para omitir verificación de email en local    
// Rutas protegidas
// En producción, considera usar `verified` si se requiere verificación de correo electrónico.
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PerroController::class, 'index'])->name('dashboard');

    // Gestión del perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-additional-fields', [ProfileController::class, 'updateAdditionalFields'])->name('profile.update-additional-fields');

    // Rutas para el recurso 'perros'
    Route::resource('perros', PerroController::class);

    // Rutas para inscripciones
    Route::post('/confirmar', [InscripcionController::class, 'confirmar'])->name('confirmar');
    Route::get('/confirmar', [InscripcionController::class, 'confirmarGet'])->name('confirmarGet'); // Considera si realmente necesitas GET y POST para la misma ruta.
    Route::post('/pagar-despues', [InscripcionController::class, 'pagarDespues'])->name('pagar-despues');
    Route::delete('/inscripciones/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');

    // Rutas para Redsys
    Route::controller(RedsysController::class)
        ->prefix('redsys')
        ->group(function () {
            Route::post('/notification', 'notification')->name('redsys.notification'); // Endpoint crítico, protege contra accesos no autorizados.
            Route::get('/success', 'success')->name('redsys.success'); // Redirección tras éxito en Redsys.
            Route::get('/failure', 'failure')->name('redsys.failure'); // Redirección tras fallo en Redsys.
            
            // Procesar y redirigir al portal de Redsys
            Route::post('/process', 'process')->name('redsys.process'); 
            
            // Mostrar formulario de Redsys
            Route::get('/form', 'showForm')->name('redsys.form'); // Esta ruta podría requerir validación adicional si no debe ser pública.
        });
});

require __DIR__ . '/auth.php';
