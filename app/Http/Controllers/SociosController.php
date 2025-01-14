<?php
// filepath: /c:/xampp/htdocs/PointerClub/app/Http/Controllers/SociosController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SociosController extends Controller
{
    public function enviarSolicitud(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'cp' => 'required|string|max:10|regex:/^[0-9]+$/',
            'tel' => 'required|string|max:15|regex:/^[0-9]+$/',
            'correo' => 'required|email|max:255',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'pais.required' => 'El campo país es obligatorio.',
            'provincia.required' => 'El campo provincia es obligatorio.',
            'ciudad.required' => 'El campo ciudad es obligatorio.',
            'cp.required' => 'El campo código postal es obligatorio.',
            'cp.regex' => 'El campo código postal solo debe contener números.',
            'tel.required' => 'El campo teléfono es obligatorio.',
            'tel.regex' => 'El campo teléfono solo debe contener números.',
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.email' => 'El campo correo debe ser una dirección de correo válida.',
        ]);

        $data = $request->only('nombre', 'apellido', 'pais', 'provincia', 'ciudad', 'cp', 'tel', 'correo');

        Mail::send('emails.socio', $data, function ($message) use ($data) {
            $message->to('info@pointerclubespana.es')
                ->subject('Nueva solicitud de socio');
        });

        return back()->with('success', 'Mensaje enviado con éxito.');
    }
}