<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PruebaInscripta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseSuccessfulMail;
use App\Mail\PurchasePendingMail;

class InscripcionController extends Controller
{
    public function confirmar(Request $request)
    {
        $inscripciones = json_decode($request->input('inscripciones'), true);

        // Limpiar el nombre de la prueba, eliminando las fechas solo para la descripción en Redsys
        foreach ($inscripciones as &$inscripcion) {
            // Solo limpiamos las fechas del nombre de la prueba, no tocamos las fechas elegidas por el usuario
            $inscripcion['prueba'] = preg_replace('/ - \d{2}\/\d{2}\/\d{2}/', '', $inscripcion['prueba']);
        }

        $total = array_sum(array_column($inscripciones, 'valor'));
        return view('confirmar', compact('inscripciones', 'total'));
    }

    public function pagarDespues(Request $request)
    {
        $inscripciones = json_decode($request->input('inscripciones'), true);

        // Limpiar el nombre de la prueba, eliminando las fechas solo para la descripción en Redsys
        foreach ($inscripciones as &$inscripcion) {
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
                'pago' => 0,
            ]);
        }

        $total = array_sum(array_column($inscripciones, 'valor'));
        $user = Auth::user();
        $order = time();

        // Enviar correo de inscripción pendiente
        Mail::to($user->email)->send(new PurchasePendingMail($user->name, $total, $order, $inscripciones));

        // Construir la descripción del producto para Redsys
        $descripcionProducto = '';
        foreach ($inscripciones as $inscripcion) {
            $descripcionProducto .= "Perro: {$inscripcion['perro']} - Prueba: {$inscripcion['prueba']} - Fecha: {$inscripcion['fecha']} \n";
        }

        // Guardar la descripción y otros datos en la sesión
        $request->session()->put('inscripciones', $inscripciones);
        $request->session()->put('total', $total);
        $request->session()->put('descripcionProducto', $descripcionProducto); // Guardamos la descripción final

        return redirect()->route('confirmarGet')->with('showPopup', true);
    }

    public function confirmarInscripcion(Request $request)
    {
        $inscripciones = json_decode($request->input('inscripciones'), true);
        $user = Auth::user();
        $total = array_sum(array_column($inscripciones, 'valor'));
        $order = time();

        // Verificar si la acción es "Pagar después"
        if ($request->input('accion') === 'pagar_despues') {
            // Enviar correo de inscripción pendiente
            Mail::to($user->email)->send(new PurchasePendingMail($user->name, $total, $order, $inscripciones));
            return redirect()->route('dashboard')->with('success', 'Inscripción pendiente. Recuerde abonar el día de la competencia.');
        } else {
            // Enviar correo de compra exitosa
            Mail::to($user->email)->send(new PurchaseSuccessfulMail($user->name, 'Descripción de la compra', $total, $order, $inscripciones));
            return redirect()->route('dashboard')->with('success', 'Inscripción exitosa.');
        }
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