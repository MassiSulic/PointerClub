<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class PropietarioController extends Controller
{
    /**
     * Mostrar todos los propietarios.
     */
    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
    }

    public function show(Propietario $propietario)
    {
        return view('propietarios.show', compact('propietario'));
    }
    
    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Guardar un nuevo propietario.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'identificacion' => 'required|string|max:12|unique:propietarios',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'numero_socio' => 'nullable|string|max:10',
            'direccion' => 'required|string|max:50',
            'region' => 'required|string|max:20',
            'pais' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:propietarios',
            'telefono' => 'required|string|max:20',
        ]);

        Propietario::create($validated);

        return redirect()->route('propietarios.index')->with('success', 'Propietario registrado correctamente.');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(Propietario $propietario)
    {
        return view('propietarios.edit', compact('propietario'));
    }

    /**
     * Actualizar un propietario existente.
     */
    public function update(Request $request, Propietario $propietario)
    {
        $validated = $request->validate([
            'identificacion' => 'required|string|max:12|unique:propietarios,identificacion,' . $propietario->id,
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'numero_socio' => 'nullable|string|max:10',
            'direccion' => 'required|string|max:50',
            'region' => 'required|string|max:20',
            'pais' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:propietarios,email,' . $propietario->id,
            'telefono' => 'required|string|max:20',
        ]);

        $propietario->update($validated);

        return redirect()->route('propietarios.index')->with('success', 'Propietario actualizado correctamente.');
    }

    /**
     * Eliminar un propietario.
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();

        return redirect()->route('propietarios.index')->with('success', 'Propietario eliminado correctamente.');
    }

    /**
 * Mostrar un propietario específico.
 */


}
