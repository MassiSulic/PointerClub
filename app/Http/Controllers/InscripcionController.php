<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PruebaInscripta;
use Illuminate\Support\Facades\Auth;

class InscripcionController extends Controller
{
  
    public function confirmar(Request $request)
    {
        $inscripciones = json_decode($request->input('inscripciones'), true);
        
        // Limpiar el nombre de la prueba, eliminando las fechas
        foreach ($inscripciones as &$inscripcion) {
            $inscripcion['prueba'] = preg_replace('/ - \d{2}\/\d{2}\/\d{2} - \d{2}\/\d{2}\/\d{2}/', '', $inscripcion['prueba']);
        }

        $total = array_sum(array_column($inscripciones, 'valor'));
        return view('confirmar', compact('inscripciones', 'total'));
    }

    public function pagarDespues(Request $request)
    {
        $inscripciones = json_decode($request->input('inscripciones'), true);

        // Limpiar el nombre de la prueba, eliminando las fechas
        foreach ($inscripciones as &$inscripcion) {
            $inscripcion['prueba'] = preg_replace('/ - \d{2}\/\d{2}\/\d{2} - \d{2}\/\d{2}\/\d{2}/', '', $inscripcion['prueba']);
        }

        // Guardar cada inscripción en la base de datos
        foreach ($inscripciones as $inscripcion) {
            PruebaInscripta::create([
                'user_id' => Auth::id(),
                'prueba' => $inscripcion['prueba'],
                'fecha' => $inscripcion['fecha'],
                'perro' => $inscripcion['perro'],
                'valor' => $inscripcion['valor'],
            ]);
        }

        $total = array_sum(array_column($inscripciones, 'valor'));

        $request->session()->put('inscripciones', $inscripciones);
        $request->session()->put('total', $total);

        return redirect()->route('confirmarGet')->with('showPopup', true);
    }

    public function confirmarGet(Request $request)
{
    $inscripciones = $request->session()->get('inscripciones', []);
    $total = $request->session()->get('total', 0);
    return view('confirmar', compact('inscripciones', 'total'));
}

public function destroy($id)
    {
        $inscripcion = PruebaInscripta::findOrFail($id);

        if ($inscripcion->user_id !== Auth::id()) {
            return response()->json(['error' => 'No autorizado.'], 403);
        }

        $inscripcion->delete();

        return redirect()->route('dashboard')->with('success', 'Inscripción eliminada con éxito.');
    }

}


