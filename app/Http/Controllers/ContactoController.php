<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviarConsulta(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tel' => 'required|string|max:15|regex:/^[0-9]+$/',
            'correo' => 'required|email|max:255',
            'mensaje' => 'required|string|max:1000',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no debe exceder los 255 caracteres.',
            'tel.required' => 'El campo teléfono es obligatorio.',
            'tel.string' => 'El campo teléfono debe ser una cadena de texto.',
            'tel.max' => 'El campo teléfono no debe exceder los 15 caracteres.',
            'tel.regex' => 'El campo teléfono solo debe contener números.',
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.email' => 'El campo correo debe ser una dirección de correo válida.',
            'correo.max' => 'El campo correo no debe exceder los 255 caracteres.',
            'mensaje.required' => 'El campo mensaje es obligatorio.',
            'mensaje.string' => 'El campo mensaje debe ser una cadena de texto.',
            'mensaje.max' => 'El campo mensaje no debe exceder los 1000 caracteres.',
        ]);

        $data = $request->only('nombre', 'tel', 'correo', 'mensaje');

        Mail::send('emails.contacto', $data, function ($message) use ($data) {
            $message->to('info@pointerclubespana.es')
                ->subject('Quiero ser Socio del Pointer');
        });

        return back()->with('success', 'Consulta enviada con éxito.');
    }
}