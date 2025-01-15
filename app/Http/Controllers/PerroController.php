<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perro;
use Illuminate\Support\Facades\Auth;
use App\Models\PruebaInscripta;
use App\Models\Prueba;
use Illuminate\Support\Facades\Log;

class PerroController extends Controller
{

    protected $sociosValidos = [
        ['numero' => '0195', 'nombre' => 'Sánchez García, David'],
        ['numero' => '0196', 'nombre' => 'Sánchez Rodríguez, Antonio Jesús'],
        ['numero' => '0197', 'nombre' => 'Sánchez Ropero, Francisco'],
        ['numero' => '0198', 'nombre' => 'Sanchís Ferrer, Fernando'],
        ['numero' => '0199', 'nombre' => 'Sancho Lagares, Mario Antonio'],
        ['numero' => '0200', 'nombre' => 'Sanjuan Vallés, Antonio'],
        ['numero' => '0202', 'nombre' => 'Segarra Pomes, Santiago'],
        ['numero' => '0203', 'nombre' => 'Seito Vila, Juan Andrés'],
        ['numero' => '0205', 'nombre' => 'Serra Crespi, Agustín'],
        ['numero' => '0206', 'nombre' => 'Signes Soler, José Adolfo'],
        ['numero' => '0208', 'nombre' => 'Soubielle, Oliver'],
        ['numero' => '0209', 'nombre' => 'Suárez Díaz, Manuel Jesús'],
        ['numero' => '0210', 'nombre' => 'Teijeira Veiga, Manuel'],
        ['numero' => '0211', 'nombre' => 'Tordillo Osuna, Pedro'],
        ['numero' => '0212', 'nombre' => 'Torrelles Torguet, José María'],
        ['numero' => '0214', 'nombre' => 'Trejo Pineda, Francisco'],
        ['numero' => '0216', 'nombre' => 'Urra Gondra, Lorenzo'],
        ['numero' => '0218', 'nombre' => 'Velázquez Herrera, Carlos'],
        ['numero' => '0219', 'nombre' => 'Vidal Bergas, Jorge'],
        ['numero' => '0220', 'nombre' => 'Vidal Fueris, Carlos'],
        ['numero' => '0221', 'nombre' => 'Vidal Fueris, Francisco Javier'],
        ['numero' => '0222', 'nombre' => 'Villalonga Bordes, José María'],
        ['numero' => '0223', 'nombre' => 'Vizán Rodríguez, José Antonio'],
        ['numero' => '0224', 'nombre' => 'Yern Soler, Antonio'],
        ['numero' => '0225', 'nombre' => 'Zaragocí Lloret, Juan Bautista'],
        ['numero' => '0226', 'nombre' => 'Areitio Garitaonandia, Juan Luís'],
        ['numero' => '0227', 'nombre' => 'Le Chat, Erwann'],
        ['numero' => '0228', 'nombre' => 'Paturel, Frederic'],
        ['numero' => '0229', 'nombre' => 'Marquestaut, Jean Roger'],
        ['numero' => '0230', 'nombre' => 'Veres Bort, Alejandro'],
        ['numero' => '0231', 'nombre' => 'Cervantes Cano, Eugenio'],
        ['numero' => '0232', 'nombre' => 'Álvarez Candame, Rubén'],
        ['numero' => '0233', 'nombre' => 'Villamiel Gonzalez, César'],
        ['numero' => '0234', 'nombre' => 'Balbotín Leal, Raúl'],
        ['numero' => '0235', 'nombre' => 'Perez de Cea Escudero, David'],
        ['numero' => '0236', 'nombre' => 'Flores Ruíz, José Miguel'],
        ['numero' => '0237', 'nombre' => 'Meneses Paños, Julián'],
        ['numero' => '0238', 'nombre' => 'Rebordelo Maire, Manuel'],
        ['numero' => '0239', 'nombre' => 'Vicente Vicente, Antonio'],
        ['numero' => '0240', 'nombre' => 'Condado Bourdon, Yann'],
        ['numero' => '0241', 'nombre' => 'Condado González, José Cecilio'],
        ['numero' => '0242', 'nombre' => 'Blanco Pedrosa, Juan'],
        ['numero' => '0243', 'nombre' => 'Lage Díaz, José Rubén'],
        ['numero' => '0244', 'nombre' => 'Anakabe Calzacorta, José Luís'],
        ['numero' => '0245', 'nombre' => 'Fernández de Arroyabe Abascal, Aitor'],
        ['numero' => '0246', 'nombre' => 'Silva Gonzalez, Ángel'],
        ['numero' => '0247', 'nombre' => 'Valero Villar, Corsino'],
        ['numero' => '0248', 'nombre' => 'Trullen García, José Antonio'],
        ['numero' => '0249', 'nombre' => 'Ribes Ripol, Francisco'],
        ['numero' => '0250', 'nombre' => 'Otero Valenzuela, Javier'],
        ['numero' => '0251', 'nombre' => 'Bermúdez Chito, Javier'],
        ['numero' => '0252', 'nombre' => 'Gallardo Morgado, Juan Alfonso'],
        ['numero' => '0253', 'nombre' => 'Bouteneigre, Patrick'],
        ['numero' => '0254', 'nombre' => 'Torres Marín, Luís Miguel'],
        ['numero' => '0255', 'nombre' => 'Núñez García, Javier'],
        ['numero' => '0256', 'nombre' => 'Arana Urive, Daniel'],
        ['numero' => '0257', 'nombre' => 'Vallés Martínez, Vicente'],
        ['numero' => '0258', 'nombre' => 'Del Río Martín, Agustín'],
        ['numero' => '0259', 'nombre' => 'Carro Gómez, Ismael'],
        ['numero' => '0260', 'nombre' => 'Balado Casal, Jesús'],
        ['numero' => '0261', 'nombre' => 'Curto González, Enrique'],
    ];
    

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
            'numero_socio' => 'nullable|string|max:10',
            'microchip' => 'required|string|max:16',
            'libro_de_origenes' => 'required|string|max:16',
            'nombre_perro' => 'required|string|max:50',
            'raza' => 'required|in:Pointer,Setter Inglés,Setter Gordon,Setter Irlandés',
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

        // Normalización de valores
        $numeroInput = trim($data['numero_socio']);
        $nombreInput = trim($data['propietario']);

        // Validar si el socio es válido
        $esSocioValido = collect($this->sociosValidos)->contains(function ($socio) use ($numeroInput, $nombreInput) {
            return $socio['numero'] === $numeroInput && strcasecmp($socio['nombre'], $nombreInput) === 0;
        });

        $data['socio_valido'] = $esSocioValido; // Asignar el resultado de la validación

        // Logs para depuración
        Log::info("Datos ingresados: Número de Socio: {$numeroInput}, Propietario: {$nombreInput}");
        Log::info("Validación de socio válida: " . ($esSocioValido ? 'Sí' : 'No'));

        // Crear el registro del perro
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
        'numero_socio' => 'nullable|string|max:10',
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

    // Obtener todos los datos del request
    $data = $request->all();

    // Validar si el socio es válido
    $esSocioValido = collect($this->sociosValidos)->contains(function ($socio) use ($data) {
        return $socio['numero'] === $data['numero_socio'] && $socio['nombre'] === $data['propietario'];
    });

    $data['socio_valido'] = $esSocioValido; // Asignar el resultado de la validación

    // Actualizar el perro con los datos
    $perro->update($data);

    return redirect()->route('perros.index')->with('success', 'Se actualizó correctamente el perro ' . $perro->nombre_perro);
}



    public function destroy(Perro $perro)
    {
        $perro->delete();

        return redirect()->route('perros.index')->with('success', 'Se eliminó correctamente el perro ' . $perro->nombre_perro);
    }


    //esto es para validar el mensaje de si es socio o no en el modal de Añadir Perro
    public function validarSocio(Request $request)
    {
        $numeroSocio = trim($request->input('numero_socio'));
        $propietario = trim($request->input('propietario'));
    
        $esSocioValido = collect($this->sociosValidos)->contains(function ($socio) use ($numeroSocio, $propietario) {
            return $socio['numero'] === $numeroSocio && strcasecmp($socio['nombre'], $propietario) === 0;
        });
    
        return response()->json([
            'es_valido' => $esSocioValido,
            'mensaje' => $esSocioValido 
                ? '¡Eres socio! Bienvenido' 
                : 'El número de socio o el nombre del propietario son incorrectos.',
        ]);
    }
   


  }
