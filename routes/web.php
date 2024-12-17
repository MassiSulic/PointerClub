<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\PruebaController;

// Definición de todas las vistas que responden al método GET + Rutas con nombre
Route::view('/', 'Inicio')->name('Inicio');
Route::view('elPointer', 'elPointer')->name('elPointer');
Route::get('Concursos', [PruebaController::class, 'index'])->name('Concursos');
Route::view('Inscripciones', 'Inscripciones')->name('Inscripciones');
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PerroController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-additional-fields', [ProfileController::class, 'updateAdditionalFields'])->name('profile.update-additional-fields');
    
    // Rutas para el recurso 'perros'
    Route::resource('perros', PerroController::class);
    //Route::get('/perros/{perro}/edit', [PerroController::class, 'edit'])->name('perros.edit');
});

require __DIR__.'/auth.php';
