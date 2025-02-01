<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PruebaInscripta;
use App\Models\User;
use App\Models\Perro;
use Illuminate\Support\Facades\DB;

class AdminInscripcionesController extends Controller
{
    /**
     * Muestra la lista de inscripciones para el panel de admin.
     */
    public function index(Request $request)
    {
        // Columnas permitidas para ordenar
        $validColumns = [
            'name', 'identificacion', 'email', 'telefono', 'region',
            'prueba', 'fecha', 'valor', 'pago', 'created_at',
            'nombre_perro', 'raza', 'sexo', 'fecha_nacimiento', 
            'libro_de_origenes', 'microchip', 'cartilla_de_trabajo',
            'conductor', 'propietario', 'pais'
        ];

        // Obtener la columna y la dirección de ordenamiento desde la URL
        $sort = $request->input('sort', 'created_at');  // Predeterminado: 'created_at'
        $direction = $request->input('direction', 'desc'); // Predeterminado: descendente

        // Validar si la columna es permitida
        if (!in_array($sort, $validColumns)) {
            $sort = 'created_at';  // Si no es válida, usa la predeterminada
        }

        // Obtener inscripciones con ordenamiento
        $inscripciones = PruebaInscripta::with(['user', 'perroModel'])
            ->leftJoin('users', 'pruebas_inscriptas.user_id', '=', 'users.id')
            ->leftJoin('perros', 'pruebas_inscriptas.perro', '=', 'perros.nombre_perro')
            ->select('pruebas_inscriptas.*', 'users.name', 'users.identificacion', 'users.email', 'users.telefono', 
                    'users.region', 'perros.nombre_perro', 'perros.raza', 'perros.sexo', 
                    'perros.fecha_nacimiento', 'perros.libro_de_origenes', 'perros.microchip', 
                    'perros.cartilla_de_trabajo', 'perros.conductor', 'perros.propietario', 'perros.pais')
            ->orderBy($sort, $direction)
            ->paginate(20);

        // Agregar parámetros de ordenación a la paginación
        $inscripciones->appends(['sort' => $sort, 'direction' => $direction]);

        return view('admin.inscripciones', compact('inscripciones', 'sort', 'direction'));
    }



    /**
     * Actualiza una inscripción desde el modal.
     */
    public function update(Request $request, $id)
    {
        $inscripcion = PruebaInscripta::findOrFail($id);
        
        // Validación de datos
        $request->validate([
            'usuario' => 'required|string|max:255',
            'identificacion' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'pais' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'prueba' => 'nullable|string|max:255',
            'fecha' => 'nullable|date',
            'valor' => 'nullable|numeric',
            'pago' => 'nullable|boolean',
            'perro' => 'nullable|string|max:255',
            'raza' => 'nullable|string|max:100',
            'sexo' => 'nullable|string|in:Macho,Hembra',
            'fecha_nacimiento' => 'nullable|date',
            'libro_origenes' => 'nullable|string|max:255',
            'microchip' => 'nullable|string|max:50',
            'cartilla' => 'nullable|string|max:50',
            'conductor' => 'nullable|string|max:255',
            'propietario' => 'nullable|string|max:255',
        ]);

        // Actualizar datos del usuario
        $usuario = $inscripcion->user;
        if ($usuario) {
            $usuario->name = $request->usuario;
            $usuario->identificacion = $request->identificacion;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->pais = $request->pais;
            $usuario->region = $request->region;
            $usuario->save();
        }

        // Actualizar datos del perro
        $perro = $inscripcion->perroModel;
        if ($perro) {
            $perro->nombre_perro = $request->perro;
            $perro->raza = $request->raza;
            $perro->sexo = $request->sexo;
            $perro->fecha_nacimiento = $request->fecha_nacimiento;
            $perro->libro_de_origenes = $request->libro_origenes;
            $perro->microchip = $request->microchip;
            $perro->cartilla_de_trabajo = $request->cartilla;
            $perro->conductor = $request->conductor;
            $perro->propietario = $request->propietario;
            $perro->save();
        }

        // Actualizar datos de la inscripción
        $inscripcion->prueba = $request->prueba;
        $inscripcion->fecha = $request->fecha;
        $inscripcion->valor = $request->valor;
        $inscripcion->pago = $request->pago;
        $inscripcion->save();

        return redirect()->route('admin.inscripciones')->with('success', 'Inscripción actualizada correctamente.');
    }

    /**
     * Elimina una inscripción después de confirmar la acción.
     */
    public function destroy($id)
    {
        $inscripcion = PruebaInscripta::findOrFail($id);
        
        // Eliminar la inscripción
        $inscripcion->delete();

        return redirect()->route('admin.inscripciones')->with('success', 'Inscripción eliminada correctamente.');
    }
}
