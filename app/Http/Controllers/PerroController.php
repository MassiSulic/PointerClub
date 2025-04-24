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
    //numeros de socios
    protected $sociosValidos = [
        ['numero' => '0002', 'nombre' => 'Aguilar Ferrer, José'],
        ['numero' => '0006', 'nombre' => 'Alonso Vázquez, José Manuel'],
        ['numero' => '0007', 'nombre' => 'Álvarez Alonso, José Luís'],
        ['numero' => '0008', 'nombre' => 'Álvarez García, Luís Antonio'],
        ['numero' => '0009', 'nombre' => 'Álvarez Rubiños, Francisco'],
        ['numero' => '0010', 'nombre' => 'Amengual Bennasar, Margalida Merce'],
        ['numero' => '0011', 'nombre' => 'Amengual Florit, Antonio'],
        ['numero' => '0012', 'nombre' => 'Amengual Vanrell, Guillermo'],
        ['numero' => '0015', 'nombre' => 'Aragón Díez, José Luís'],
        ['numero' => '0016', 'nombre' => 'Arnal López, Jesús'],
        ['numero' => '0017', 'nombre' => 'Arrieta Abarguchi, Luís'],
        ['numero' => '0018', 'nombre' => 'Ayesta Ortúzar, Gabriel'],
        ['numero' => '0019', 'nombre' => 'Azkue Bidaurrazaga, Juan María'],
        ['numero' => '0020', 'nombre' => 'Azpiazu Arriola, Jesús'],
        ['numero' => '0021', 'nombre' => 'Baldó Sierra, José'],
        ['numero' => '0022', 'nombre' => 'Balsera Gómez, Lorenzo'],
        ['numero' => '0023', 'nombre' => 'Barceló Pie, Francesc'],
        ['numero' => '0024', 'nombre' => 'Berezo Ruiz, Pedro Carlos'],
        ['numero' => '0025', 'nombre' => 'Betanzos Ferrán, Alfonso'],
        ['numero' => '0026', 'nombre' => 'Borrella Colomer, Raúl'],
        ['numero' => '0028', 'nombre' => 'Burlat, Pascal'],
        ['numero' => '0031', 'nombre' => 'Calabrese, Fabio'],
        ['numero' => '0032', 'nombre' => 'Canals Rebassa, José'],
        ['numero' => '0033', 'nombre' => 'Cardenas Fiol, Rafael'],
        ['numero' => '0034', 'nombre' => 'Carmona Moreno, José'],
        ['numero' => '0035', 'nombre' => 'Castro Rubio, Roberto'],
        ['numero' => '0037', 'nombre' => 'Cobo Tarifa, Antonio José'],
        ['numero' => '0038', 'nombre' => 'Costeira Freitas, Ricardo Augusto'],
        ['numero' => '0039', 'nombre' => 'Cristofol Marena, Jordi'],
        ['numero' => '0040', 'nombre' => 'Curto Martínez, Pedro Juan'],
        ['numero' => '0041', 'nombre' => 'De Llano Durán, Pedro'],
        ['numero' => '0042', 'nombre' => 'Devesa Pérez, Óscar'],
        ['numero' => '0043', 'nombre' => 'Díaz Fernández, José Manuel'],
        ['numero' => '0044', 'nombre' => 'Díez Rebanal, Raimundo'],
        ['numero' => '0045', 'nombre' => 'Ducher, Pierre'],
        ['numero' => '0046', 'nombre' => 'Durán García, Joaquín'],
        ['numero' => '0047', 'nombre' => 'Eskisabel Munduate, Alberto'],
        ['numero' => '0048', 'nombre' => 'Espina Ortolazabal, Iñaki'],
        ['numero' => '0049', 'nombre' => 'Etxeandia Mujika, Jon'],
        ['numero' => '0050', 'nombre' => 'Faraldo Fernández, Eliseo'],
        ['numero' => '0051', 'nombre' => 'Faubell Muñoz, Manuel'],
        ['numero' => '0052', 'nombre' => 'Faugere, Pierre'],
        ['numero' => '0053', 'nombre' => 'Faus Esteve, Miguel'],
        ['numero' => '0054', 'nombre' => 'Fernández Iglesias, Pablo'],
        ['numero' => '0055', 'nombre' => 'Fernández Montes, Francisco'],
        ['numero' => '0056', 'nombre' => 'Fernández Morillo, Cristóbal'],
        ['numero' => '0057', 'nombre' => 'Fernández Zamora, Alfredo'],
        ['numero' => '0058', 'nombre' => 'Ferreira Martínez, Emilio'],
        ['numero' => '0059', 'nombre' => 'Ferreras Ferreras, Vicente Agustín'],
        ['numero' => '0060', 'nombre' => 'Fondado Galarraga, Fausto'],
        ['numero' => '0061', 'nombre' => 'Font Vasquez, Eric'],
        ['numero' => '0062', 'nombre' => 'Fuentes Durán, Rafael'],
        ['numero' => '0063', 'nombre' => 'Gaitán Díaz, Juan Diego'],
        ['numero' => '0065', 'nombre' => 'García Calleja, Iván'],
        ['numero' => '0066', 'nombre' => 'García Enrique, Francisco'],
        ['numero' => '0069', 'nombre' => 'García Verdejo, Antonio'],
        ['numero' => '0070', 'nombre' => 'García Vicent, Francisco'],
        ['numero' => '0076', 'nombre' => 'Gómez González, Francisco'],
        ['numero' => '0077', 'nombre' => 'González Casas, Dorindo'],
        ['numero' => '0078', 'nombre' => 'Gonzales Casas, Carlos Alberto'],
        ['numero' => '0079', 'nombre' => 'González Álvarez, Antonio'],
        ['numero' => '0080', 'nombre' => 'González Díaz, Juan Antonio'],
        ['numero' => '0082', 'nombre' => 'Grimaldi Amancio, Javier'],
        ['numero' => '0083', 'nombre' => 'Güenaga Urkidi, Tomás'],
        ['numero' => '0084', 'nombre' => 'Güenaga Urkidi, Roberto'],
        ['numero' => '0085', 'nombre' => 'Guerrero Ordóñez, José'],
        ['numero' => '0086', 'nombre' => 'Gutiérrez Martínez, Carlos'],
        ['numero' => '0088', 'nombre' => 'Gutiérrez Pérez, Plácido'],
        ['numero' => '0089', 'nombre' => 'Haro Kay, Álvaro'],
        ['numero' => '0090', 'nombre' => 'Hernández Bravo, Rafael'],
        ['numero' => '0091', 'nombre' => 'Herraz García, Fernando'],
        ['numero' => '0093', 'nombre' => 'Herrero Sastre, José María'],
        ['numero' => '0094', 'nombre' => 'Horta Arroyo, Carmelo'],
        ['numero' => '0096', 'nombre' => 'Iantoschi, Antonio'],
        ['numero' => '0098', 'nombre' => 'Imizcoz Mendizábal, Daniel'],
        ['numero' => '0099', 'nombre' => 'Jauregui Viteri, Mikel'],
        ['numero' => '0100', 'nombre' => 'Jiménez Cruz, Salvador'],
        ['numero' => '0101', 'nombre' => 'Jiménez Ruíz, Gaspar'],
        ['numero' => '0102', 'nombre' => 'Lago Quintela, Alejandro'],
        ['numero' => '0103', 'nombre' => 'Lagunas Renom, Josep'],
        ['numero' => '0104', 'nombre' => 'Lalin Ferreiroá, Carlos'],
        ['numero' => '0105', 'nombre' => 'Lisarde Sabater, Vicente'],
        ['numero' => '0107', 'nombre' => 'Llompart Lenndines, Jaime'],
        ['numero' => '0108', 'nombre' => 'Loïc, Tanneau'],
        ['numero' => '0109', 'nombre' => 'López Amer, José Antonio'],
        ['numero' => '0110', 'nombre' => 'López López, Iván'],
        ['numero' => '0111', 'nombre' => 'Lorca Caballero, Francisco José'],
        ['numero' => '0112', 'nombre' => 'Lorenzo Pazos, José Manuel'],
        ['numero' => '0114', 'nombre' => 'Lourenço Afonso, Sergio Manuel'],
        ['numero' => '0115', 'nombre' => 'Lucas Ugarte, Mikel'],
        ['numero' => '0116', 'nombre' => 'Madaras Aranburu, Iñaki'],
        ['numero' => '0117', 'nombre' => 'Madruga Satoca, Xavier'],
        ['numero' => '0118', 'nombre' => 'Maíz Aldalur, Eneko'],
        ['numero' => '0119', 'nombre' => 'Manso Gómez, Fernando'],
        ['numero' => '0120', 'nombre' => 'Manso Gutiérrez, Ricardo Enrique'],
        ['numero' => '0121', 'nombre' => 'Mañas Izquierdo, Casimiro'],
        ['numero' => '0122', 'nombre' => 'Marcaida Celaya, Axier'],
        ['numero' => '0123', 'nombre' => 'Marco Brotons, José'],
        ['numero' => '0124', 'nombre' => 'Marcos Arroyo, Evaristo Javier'],
        ['numero' => '0125', 'nombre' => 'Marín García, Alfonso Lorenzo'],
        ['numero' => '0126', 'nombre' => 'Martín Núñez, Miguel'],
        ['numero' => '0127', 'nombre' => 'Martínez Alcázar, Casildo'],
        ['numero' => '0128', 'nombre' => 'Martínez del Viso, José Antonio'],
        ['numero' => '0130', 'nombre' => 'Mas Vidal, Juan Antonio'],
        ['numero' => '0131', 'nombre' => 'Mascarell Climent, Raúl'],
        ['numero' => '0132', 'nombre' => 'Masferrer Culubret, Albert'],
        ['numero' => '0133', 'nombre' => 'Ezequiel Mele, Marcos'],
        ['numero' => '0134', 'nombre' => 'Mercado Puerto, Ángel'],
        ['numero' => '0136', 'nombre' => 'Mingot Pascual, Pedro'],
        ['numero' => '0137', 'nombre' => 'Miñaur Sagarduy, Germán'],
        ['numero' => '0138', 'nombre' => 'Mitjangos Abalos, Francisco'],
        ['numero' => '0139', 'nombre' => 'Montero Moya, Luís Enrique'],
        ['numero' => '0140', 'nombre' => 'Mora Mota, José Manuel'],
        ['numero' => '0141', 'nombre' => 'Mora Payeras, Guillermo'],
        ['numero' => '0145', 'nombre' => 'Moreno Yuste, Adolfo'],
        ['numero' => '0148', 'nombre' => 'Mossi Zaragoza, J. Vicente'],
        ['numero' => '0149', 'nombre' => 'Muriel, Gueris'],
        ['numero' => '0150', 'nombre' => 'Nava Álvarez, Senén'],
        ['numero' => '0151', 'nombre' => 'Negrín Pérez, Rafael'],
        ['numero' => '0152', 'nombre' => 'Nicolás Arce, Francisco'],
        ['numero' => '0153', 'nombre' => 'Nieto González, Pedro'],
        ['numero' => '0154', 'nombre' => 'Ocio Martínez, Francisco Javier'],
        ['numero' => '0155', 'nombre' => 'Okkinga, Dannielle'],
        ['numero' => '0156', 'nombre' => 'Olaya López, Miguel'],
        ['numero' => '0157', 'nombre' => 'Olazagoita Lazaro, Aitor'],
        ['numero' => '0158', 'nombre' => 'Oñaederra Aguirregabilla, Javier'],
        ['numero' => '0160', 'nombre' => 'Page, Anne Marie'],
        ['numero' => '0161', 'nombre' => 'Palacios Olmedo, Francisco'],
        ['numero' => '0162', 'nombre' => 'Palomo Roldán, Juan Miguel'],
        ['numero' => '0163', 'nombre' => 'Pardo Jurado, Antonio F.'],
        ['numero' => '0164', 'nombre' => 'Paresz Rufiñol, José'],
        ['numero' => '0165', 'nombre' => 'Pascual Carbonell, Antonio'],
        ['numero' => '0166', 'nombre' => 'Pena Vázquez, Andrés'],
        ['numero' => '0167', 'nombre' => 'Peña Lucena, José'],
        ['numero' => '0168', 'nombre' => 'Pérez Camacho, Adrián'],
        ['numero' => '0169', 'nombre' => 'Pol Bover, Lorenzo'],
        ['numero' => '0170', 'nombre' => 'Prieto Fernández, Ángel'],
        ['numero' => '0171', 'nombre' => 'Provost, Daniel'],
        ['numero' => '0172', 'nombre' => 'Ramírez Del Valle, Leonardo'],
        ['numero' => '0173', 'nombre' => 'Recondo Juangorena, Joxan'],
        ['numero' => '0174', 'nombre' => 'Redruello Suárez, Jose Miguel'],
        ['numero' => '0175', 'nombre' => 'Reixac Moya, Antonio'],
        ['numero' => '0176', 'nombre' => 'Rocafull Ribes, Juan Miguel'],
        ['numero' => '0177', 'nombre' => 'Rodrigo Vaquero, Jesús'],
        ['numero' => '0178', 'nombre' => 'Rodríguez Flores, Juan'],
        ['numero' => '0180', 'nombre' => 'Rodríguez Somoza, Antonio'],
        ['numero' => '0182', 'nombre' => 'Romero Daras, Francisco Vicente'],
        ['numero' => '0184', 'nombre' => 'Ruíz Terrón, Alejandro'],
        ['numero' => '0186', 'nombre' => 'Ruíz Torres, Jesús'],
        ['numero' => '0187', 'nombre' => 'Sagasti, Iñaki'],
        ['numero' => '0188', 'nombre' => 'Salamanca Mir, Rafael'],
        ['numero' => '0190', 'nombre' => 'Salort Fuster, Martí'],
        ['numero' => '0191', 'nombre' => 'Salvidea Martínez de Murgia, Patxi'],
        ['numero' => '0192', 'nombre' => 'San Vicente Gómez, Jagoba'],
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
        ['numero' => '0262', 'nombre' => 'Álvarez Díez, Manuel'],
        ['numero' => '0263', 'nombre' => 'Trullen Del Campo, Héctor'],
        ['numero' => '0264', 'nombre' => 'Bousquet, Jérôme'],
        ['numero' => '0265', 'nombre' => 'Cambón Bertoa, Esteban'],
        ['numero' => '0266', 'nombre' => 'Bertrand, Juan Claude'],
        ['numero' => '0267', 'nombre' => 'Mazerolles, Giles'],
        ['numero' => '0268', 'nombre' => 'Berradi Al-Arrami, Amin'],
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
