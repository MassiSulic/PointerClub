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

    // Limpiar el nombre de la prueba, eliminando las fechas solo para la descripción en Redsys
    foreach ($inscripciones as &$inscripcion) {
        // Limpiamos el nombre de la prueba eliminando las fechas solo en el nombre, no en las fechas elegidas por el usuario
        $inscripcion['prueba'] = preg_replace('/ - \d{2}\/\d{2}\/\d{2}/', '', $inscripcion['prueba']);
    }

    // Asegurarse de que la descripción en Redsys no duplique las fechas
    $descripcionProducto = '';
    foreach ($inscripciones as $inscripcion) {
        // Concatenamos el nombre de la prueba limpio de fechas y la fecha correcta elegida por el usuario
        $descripcionProducto .= "Inscripción para {$inscripcion['prueba']} - {$inscripcion['fecha']} ";
    }

    $total = array_sum(array_column($inscripciones, 'valor'));
    return view('confirmar', compact('inscripciones', 'total', 'descripcionProducto'));
}

public function pagarDespues(Request $request)
{
    $inscripciones = json_decode($request->input('inscripciones'), true);

    // Limpiar el nombre de la prueba, eliminando las fechas solo para la descripción en Redsys
    foreach ($inscripciones as &$inscripcion) {
        // Limpiamos el nombre de la prueba eliminando las fechas solo en el nombre, no en las fechas elegidas por el usuario
        $inscripcion['prueba'] = preg_replace('/ - \d{2}\/\d{2}\/\d{2}/', '', $inscripcion['prueba']);
    }

    // Guardar cada inscripción en la base de datos
    foreach ($inscripciones as $inscripcion) {
        PruebaInscripta::create([
            'user_id' => Auth::id(),
            'prueba' => $inscripcion['prueba'],
            'fecha' => $inscripcion['fecha'], // Aquí guardamos la fecha elegida por el usuario
            'perro' => $inscripcion['perro'],
            'valor' => $inscripcion['valor'],
        ]);
    }

    // Asegurarse de que la descripción en Redsys no duplique las fechas
    $descripcionProducto = '';
    foreach ($inscripciones as $inscripcion) {
        // Concatenamos el nombre de la prueba limpio de fechas y la fecha correcta elegida por el usuario
        $descripcionProducto .= "Inscripción para {$inscripcion['prueba']} - {$inscripcion['fecha']} ";
    }

    $total = array_sum(array_column($inscripciones, 'valor'));

    // Guardamos en la sesión la descripción para que se use en la vista de confirmación
    $request->session()->put('inscripciones', $inscripciones);
    $request->session()->put('total', $total);
    $request->session()->put('descripcionProducto', $descripcionProducto); // Guardamos la descripción final

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


