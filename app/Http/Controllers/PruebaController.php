<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prueba;

class PruebaController extends Controller
{
    public function index()
    {
        $pruebas = Prueba::all();
        return view('Concursos', compact('pruebas'));
    }

    public function show()
    {
    $pruebas = Prueba::all(); // Asumiendo que tienes un modelo Prueba
    return view('Concursos', compact('pruebas'));
    }
}

