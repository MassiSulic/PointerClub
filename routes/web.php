<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\RedsysController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\SociosController;


// Ruta para la vista Actualidad / Blog
use App\Http\Controllers\BlogController;

Route::get('Actualidad', [BlogController::class, 'index'])->name('Actualidad');
Route::get('blog/{slug}', [BlogController::class, 'showBlog'])->name('blog.show');


// Definición de todas las vistas que responden al método GET + Rutas con nombre
Route::get('/', [BlogController::class, 'listForHome'])->name('Inicio');
Route::view('elPointer', 'elPointer')->name('elPointer');
Route::view('Concursos', 'Concursos')->name('Concursos');
Route::get('Inscripciones', [PruebaController::class, 'index'])->name('Inscripciones');
Route::view('Resultados', 'Resultados')->name('Resultados');
Route::view('Socios', 'Socios')->name('Socios');
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
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PerroController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-additional-fields', [ProfileController::class, 'updateAdditionalFields'])->name('profile.update-additional-fields');

    // Rutas para el recurso 'perros'
    Route::resource('perros', PerroController::class);

    // Rutas para inscripciones
    Route::post('/confirmar', [InscripcionController::class, 'confirmar'])->name('confirmar');
    Route::get('/confirmar', [InscripcionController::class, 'confirmarGet'])->name('confirmarGet');
    Route::post('/pagar-despues', [InscripcionController::class, 'pagarDespues'])->name('pagar-despues');
    Route::delete('/inscripciones/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');
});


    // Rutas para Redsys
    Route::controller(RedsysController::class)
    ->prefix('redsys')
    ->group(function () {
        Route::post('/notification', 'notification')->name('redsys.notification');
        Route::get('/success', 'success')->name('redsys.success');
        Route::get('/failure', 'failure')->name('redsys.failure');

        // Ruta para procesar el pago y redirigir a Redsys
        Route::post('/process', 'process')->name('redsys.process'); // Ruta POST para recibir los datos y procesarlos
        Route::get('/form', 'showForm')->name('redsys.form'); // Ruta GET para mostrar el formulario de Redsys
    });


    // Rutas para enviar correos electrónicos desde contacto y socios
    Route::post('/contacto', [ContactoController::class, 'enviarConsulta'])->name('contacto.enviar');
    Route::post('/socios', [SociosController::class, 'enviarSolicitud'])->name('socios.enviar');

require __DIR__ . '/auth.php';
