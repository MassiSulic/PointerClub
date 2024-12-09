<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Definición de todas las vistas que responden al metodo get + Rutas con nombre (Aveces el codigo esta bien aunque diga que no. Guardar y recargar)
Route::view('/', 'Inicio')->name('Inicio');
Route::view('elPointer', 'elPointer')->name('elPointer');
Route::view('Concursos', 'Concursos')->name('Concursos');
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
