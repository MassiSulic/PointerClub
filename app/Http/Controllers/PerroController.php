<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perro;
use Illuminate\Support\Facades\Auth;
use App\Models\PruebaInscripta;
use App\Models\Prueba;

class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::with(['propietario'])
        ->where('user_id', Auth::user()->id) // Filtrar por usuario autenticado
        ->paginate(10);

        $pruebas = Prueba::all();

    $inscripciones = PruebaInscripta::where('user_id', Auth::user()->id)->paginate(10);

    // Cambia la vista al dashboard
    return view('dashboard', compact('perros', 'inscripciones', 'pruebas'));
    }



    public function create()
    {
        return view('dashboard.perros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'microchip' => 'required|string|max:16',
            'libro_de_origenes' => 'required|string|max:16',
            'nombre_perro' => 'required|string|max:50',
            'raza' => 'required|in:Pointer,Setter Inglés,Setter Gordon','Setter Irlandés',
            'sexo' => 'required|in:Macho,Hembra',
            'pais' => 'required|string|max:20',
            'cartilla_de_trabajo' => 'nullable|string|max:30',
            'conductor' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'propietario' => 'required|string|max:50',
        ], [
            'microchip.required' => 'El número de microchip es obligatorio.',
            'libro_de_origenes.required' => 'El número de LOE es obligatorio.',
            'nombre_perro.required' => 'El nombre del perro es obligatorio.',
            'raza.required' => 'La raza del perro es obligatoria.',
            'sexo.required' => 'El sexo del perro es obligatorio.',
            'pais.required' => 'El país es obligatorio.',
            'conductor.required' => 'El nombre del conductor es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'propietario.required' => 'El nombre del conductor es obligatorio.',
        ]);

        // Asignar el user_id al usuario autenticado
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        Perro::create($data);

        return redirect()->route('perros.index')->with('success', 'Perro registrado con éxito.');
    }


    
    public function edit($id)
    {
        $perro = Perro::findOrFail($id);

        // Verificar que el perro pertenece al usuario autenticado
        if ($perro->user_id !== Auth::id()) {
            return response()->json(['error' => 'No autorizado.'], 403);
        }

        return response()->json($perro);
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'fecha_nacimiento' => 'required|date',
        'microchip' => 'required|string|max:16',
        'libro_de_origenes' => 'required|string|max:16',
        'nombre_perro' => 'required|string|max:50',
        'raza' => 'required|in:Pointer,Setter Inglés,Setter Gordon,Setter Irlandés',
        'sexo' => 'required|in:Macho,Hembra',
        'pais' => 'required|string|max:20',
        'conductor' => 'required|string|max:50',
        'propietario' => 'required|string|max:50',
    ]);

    // Encontrar el perro y validar pertenencia
    $perro = Perro::findOrFail($id);

    if ($perro->user_id !== Auth::id()) {
        return response()->json(['error' => 'No autorizado.'], 403);
    }

    // Actualizar los datos
    $perro->update($request->all());

    return redirect()->route('perros.index')->with('success', 'Se actualizó correctamente el perro ' . $perro->nombre_perro);
}


    public function destroy(Perro $perro)
    {
        $perro->delete();

        return redirect()->route('perros.index')->with('success', 'Se eliminó correctamente el perro ' . $perro->nombre_perro);
    }

  }
