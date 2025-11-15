<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadosPublicosController extends Controller
{
    /**
     * Mostrar los resultados públicos ordenados por fecha (más reciente primero)
     */
    public function index()
    {
        $resultados = Resultado::orderBy('created_at', 'desc')
                               ->paginate(10);
        
        return view('Resultados', compact('resultados'));
    }

    /**
     * Mostrar un resultado específico (opcional, si quieres páginas individuales)
     */
    public function show($id)
    {
        $resultado = Resultado::findOrFail($id);
        
        return view('resultado-detalle', compact('resultado'));
    }
}