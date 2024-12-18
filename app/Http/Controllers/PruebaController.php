<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prueba;
use App\Models\Perro; // Importar el modelo Perro
use Illuminate\Support\Facades\Auth; // Importar Auth
use Illuminate\Support\Facades\DB; // Importar DB

class PruebaController extends Controller
{
    /**
     * Muestra la lista de concursos y los perros del usuario autenticado.
     */
    public function index()
    {
        // Obtener todas las pruebas
        $pruebas = Prueba::all();

        // Obtener los perros del usuario autenticado
        $perros = Perro::where('user_id', Auth::id())->get();

        // Pasar ambas variables a la vista
        return view('Concursos', compact('pruebas', 'perros'));
    }

    /**
     * Muestra los detalles de un concurso específico.
     */
    public function show()
    {
        // Obtener todas las pruebas
        $pruebas = Prueba::all();

        // Obtener los perros del usuario autenticado
        $perros = Perro::where('user_id', Auth::id())->get();

        // Pasar ambas variables a la vista
        return view('Concursos', compact('pruebas', 'perros'));
    }

    /**
     * Maneja la inscripción de perros en las pruebas.
     */
    public function inscribir(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'inscripciones' => 'required|array',
            'inscripciones.*.prueba_id' => 'required|exists:pruebas,id',
            'inscripciones.*.perro_id' => 'required|exists:perros,id',
            'inscripciones.*.fechas' => 'required|array', // Validar fechas como array
            'inscripciones.*.fechas.*' => 'required|date', // Validar cada fecha individualmente
        ]);

        try {
            // Guardar cada inscripción en la tabla pivote
            foreach ($request->inscripciones as $inscripcion) {
                foreach ($inscripcion['fechas'] as $fecha) {
                    DB::table('perro_prueba')->insert([
                        'prueba_id' => $inscripcion['prueba_id'],
                        'perro_id' => $inscripcion['perro_id'],
                        'fecha' => $fecha,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Retornar respuesta exitosa
            return response()->json(['message' => 'Inscripciones realizadas con éxito']);
        } catch (\Exception $e) {
            // Capturar cualquier error y devolver un mensaje adecuado
            return response()->json(['error' => 'Hubo un error al realizar la inscripción: ' . $e->getMessage()], 500);
        }
    }
}
