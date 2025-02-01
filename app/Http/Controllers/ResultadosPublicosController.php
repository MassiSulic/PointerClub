<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;

class ResultadosPublicosController extends Controller
{
    public function index()
{
    // Obtener todos los resultados
    $resultados = Resultado::orderBy('created_at', 'desc')->paginate(10);

    // Pasar los resultados a la vista
    return view('resultados', compact('resultados'));
}
}
