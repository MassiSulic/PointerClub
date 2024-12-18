<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\Perro; // Importar el modelo Perro
use Illuminate\Support\Facades\Auth; // Importar Auth

class PruebaController extends Controller
{
    public function index()
    {
        // Obtener todas las pruebas
        $pruebas = Prueba::all();

        // Obtener los perros del usuario autenticado
        $perros = Perro::where('user_id', Auth::id())->get();

        // Pasar ambas variables a la vista
        return view('Inscripciones', compact('pruebas', 'perros'));
    }

    public function show()
    {
        // Obtener todas las pruebas
        $pruebas = Prueba::all();

        // Obtener los perros del usuario autenticado
        $perros = Perro::where('user_id', Auth::id())->get();

        // Pasar ambas variables a la vista
        return view('Inscripciones', compact('pruebas', 'perros'));
    }
}
