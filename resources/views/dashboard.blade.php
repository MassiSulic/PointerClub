@include('partials.navigation')
<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-1 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-full">
                    <h3 class="text-lg font-bold mb-4">Gestión de Perros</h3>

                    <!-- Botón para añadir un perro -->
                    <button id="add-perro-btn"
                        class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium text-sm rounded-lg shadow-md transition ease-in-out duration-150 mb-6">
                        Añadir Perro +
                    </button>



                    <!-- Incluir la vista perros -->
                    @include('partials.perros')

                    <!-- Paginación -->
                    {{ $perros->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-6 w-full">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-1 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4" id="inscripciones">Mis Inscripciones</h3>

                    {{-- <button id="add-inscripcion-btn" 
                    class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium text-sm rounded-lg shadow-md transition ease-in-out duration-150 mb-2">
                    Nueva Inscripción +
                    </button> --}}

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700">
                                    Concurso - Disciplina</th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700">
                                    Fecha del Concurso</th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700">
                                    Perro</th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700">
                                    Valor</th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700">
                                    Estado</th>    
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($inscripciones as $inscripcion)
                                @php
                                    $partesPrueba = explode(' - ', $inscripcion->prueba);
                                    $pruebaSinFecha = $partesPrueba[0] . ' - ' . $partesPrueba[1];
                                @endphp
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800 text-center">
                                        {{ $pruebaSinFecha }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800 text-center">
                                        {{ $inscripcion->fecha }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800 text-center">
                                        {{ $inscripcion->perro }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800 text-center">
                                        {{ $inscripcion->valor }} euros</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm text-center">
                                        @if ($inscripcion->pago == 0)
                                            <span class="text-red-500">Pendiente de pago</span>
                                        @else
                                            <span class="text-green-500">Pagado</span>
                                        @endif
                                    </td>    
                                    <td
                                        class="border border-gray-300 px-4 py-2 text-sm text-gray-800 space-x-2 text-center">
                                        <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}"
                                            method="POST" class="inline-block"
                                            onsubmit="return confirm('¿Seguro de Eliminar esta Inscripción?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $inscripciones->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials.footer')


<!-- Modal para Editar Inscripción -->
<div id="inscripcion-modal"
    class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 p-6 relative">
        <!-- Título del Modal -->
        <h2 id="inscripcion-modal-title" class="text-2xl font-bold text-gray-800 mb-4">Editar Inscripción</h2>

        <!-- Botón de cerrar -->
        <button id="inscripcion-modal-close-btn"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400">
            &times;
        </button>

        <!-- Formulario -->
        <form id="inscripcion-form" method="POST" action="" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" id="inscripcion-id" name="inscripcion_id">

            <!-- Campos del formulario -->
            <div>
                <label for="inscripcion-prueba" class="block text-sm font-medium text-gray-700">Prueba</label>
                <input type="text" id="inscripcion-prueba" name="prueba"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="inscripcion-fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="inscripcion-fecha" name="fecha"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="inscripcion-perro" class="block text-sm font-medium text-gray-700">Perro</label>
                <input type="text" id="inscripcion-perro" name="perro"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="inscripcion-valor" class="block text-sm font-medium text-gray-700">Valor</label>
                <input type="number" id="inscripcion-valor" name="valor"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" id="inscripcion-modal-cancel-btn"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>






<!-- Modal para Crear/Editar Perros -->
<div id="perro-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 p-6 relative">
        <!-- Título del Modal -->
        <h2 id="modal-title" class="text-2xl font-bold text-gray-800 mb-4">Añadir Perro</h2>

        <!-- Botón de cerrar -->
        <button id="modal-close-btn"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 text-4xl">
            &times;
        </button>

        <!-- Formulario -->
        <form id="perro-form" method="POST" action="{{ route('perros.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" id="perro-id" name="perro_id">

            <!-- Grid para organizar los campos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Campo: Nombre del perro -->
                <div>
                    <label for="nombre_perro" class="block text-sm font-medium text-gray-700">Nombre del perro</label>
                    <input type="text" id="nombre_perro" name="nombre_perro"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Campo: Nombre del propietario -->
                <div>
                    <label for="propietario" class="block text-sm font-medium text-gray-700">Nombre del
                        propietario</label>
                    <input type="text" id="propietario" name="propietario"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Campo: Nombre del conductor -->
                <div>
                    <label for="conductor" class="block text-sm font-medium text-gray-700">Nombre del
                        conductor</label>
                    <select id="conductor" name="conductor"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Seleccione un conductor</option>
                        @foreach ([
        'Albamonte, Sandro',
        'Aringhieri, Samuele',
        'Avril, Davide',
        'Bardon, Pascal',
        'Boissonnade',
        'Boitheauville, Adrien',
        'Borrella, Raúl',
        'Brun',
        'Burlat, Pascal',
        'Cassiaut, Pierre',
        'Cherubini, Fabio',
        'Coulon, Floriant',
        'Faissat, Jerome',
        'Gaitan, Juan Diego',
        'Garcia Vincent',
        'Gaspar Jimenez',
        'Gatti, Stefano',
        'Giovannelli',
        'Gómez, Francisco',
        'Gutierrez, Alberto',
        'Iazzetta, Mauro',
        'Inacio, Ricardo',
        'Jáñez, José Antonio',
        'Laffon, J. M.',
        'Latreille',
        'Lisarde Sabater, Vicente',
        'Locatelli, Roberto',
        'Lorca',
        'Maymard',
        'Medrano, Nacho',
        'Merle Des Isles, Antony',
        'Mitic, Aleksandar',
        'Mora Mota, Jose M.',
        'Nicoletti, Nicola',
        'Nikolic, Zoran',
        'Pezzotta, Giuseppe',
        'Pianaro, Graziano',
        'Sanz, José Luís',
        'Scarpecci, Simone',
        'Soddu, Lucca',
        'Sohier, Patrick',
        'Stankovic, Boban',
        'Tenailleau',
        'Teulieres, Patrick',
        'Trullen, Héctor',
        'Balado, Jesus',
        'Bischi, Leonardo',
        'Blanchet',
        'Bounaude',
        'Bourgeois, Emmanuel',
        'Bruni, Davide',
        'Burresi, Leonardo',
        'Condado, Yann',
        'Dave, Camille',
        'Esser',
        'Fernández, Pablo',
        'Fontecedro, Giuseppe',
        'Garcia Verdejo, Antonio',
        'Gavrilovic, Dejan',
        'Giavarinni, Claudio',
        'Ginestet, A.',
        'Gonzales, Xavi',
        'Hamon, Thierry',
        'Imizcoz, Daniel',
        'Kartalija, Stanislav',
        'Lemos, Rui',
        'Lombardi, Rudy',
        'López, Juan',
        'Maggiolo, Luigi',
        'Massias, Patrick',
        'Mavridis, Thorodis',
        'Moreno, Javier',
        'Moretti',
        'Nunziata, Andrea',
        'Pachis',
        'Palomo, Juan Miguel',
        'Pezzota, Ernesto',
        'Pioppi, Giovanni',
        'Richelli, Matteo',
        'Roche, Nicolas',
        'Sánchez Ropero, Francisco',
        'Scudiero, Paolo',
        'Simeons, Richard',
        'Targuetti, Emannuel',
        'Testa, Angelo',
        'Traina, Severino',
        'Villamiel, César',
    ] as $conductor)
                            <option value="{{ $conductor }}">{{ $conductor }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo: Fecha de nacimiento -->
                <div>
                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de
                        nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Campo: Microchip -->
                <div>
                    <label for="microchip" class="block text-sm font-medium text-gray-700">Microchip</label>
                    <input type="text" id="microchip" name="microchip"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        maxlength="16" required>
                    <small>Hasta 16 dígitos numéricos.</small>
                </div>

                <!-- Campo: Libro de Orígenes -->
                <div>
                    <label for="libro_de_origenes" class="block text-sm font-medium text-gray-700">Libro de
                        Orígenes</label>
                    <input type="text" id="libro_de_origenes" name="libro_de_origenes"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        maxlength="16" required>
                    <small>Máximo 16 caracteres, puede incluir números, letras y el símbolo "/".</small>
                </div>

                <!-- Campo: Cartilla de trabajo -->
                <div>
                    <label for="cartilla_de_trabajo" class="block text-sm font-medium text-gray-700">Cartilla de
                        trabajo</label>
                    <input type="text" id="cartilla_de_trabajo" name="cartilla_de_trabajo"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        maxlength="7">
                    <small>Máximo 7 caracteres, puede incluir números, letras y el símbolo "/".</small>
                </div>

                <!-- Campo: Raza -->
                <div>
                    <label for="raza" class="block text-sm font-medium text-gray-700">Raza</label>
                    <select id="raza" name="raza"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Seleccione la raza</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Setter Inglés">Setter Inglés</option>
                        <option value="Setter Gordon">Setter Gordon</option>
                        <option value="Setter Irlandés">Setter Irlandés</option>
                    </select>
                </div>

                <!-- Campo: Sexo -->
                <div>
                    <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                    <select id="sexo" name="sexo"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Seleccione el sexo</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>

                <!-- Campo: País -->
                <div>
                    <label for="pais" class="block text-sm font-medium text-gray-700">País</label>
                    <input type="text" id="pais" name="pais"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" id="modal-cancel-btn"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>





<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Abrir el modal para añadir un nuevo perro
        document.getElementById('add-perro-btn').addEventListener('click', function() {
            console.log('Botón "Añadir Perro" presionado');
            const form = document.getElementById('perro-form');

            // Limpiar el formulario y eliminar el campo _method si existe
            form.reset();
            const existingMethod = form.querySelector('input[name="_method"]');
            if (existingMethod) existingMethod.remove(); // Eliminar el campo PUT dinámico

            // Configurar la acción del formulario para "store"
            form.action = "{{ route('perros.store') }}";

            // Restablecer valores del modal
            document.getElementById('perro-id').value = '';
            document.getElementById('modal-title').innerText = 'Añadir Perro';
            document.getElementById('nombre_perro').value = '';
            document.getElementById('propietario').value = '';
            document.getElementById('conductor').value = '';
            document.getElementById('fecha_nacimiento').value = '';
            document.getElementById('raza').value = '';
            document.getElementById('sexo').value = '';
            document.getElementById('microchip').value = '';
            document.getElementById('libro_de_origenes').value = '';
            document.getElementById('cartilla_de_trabajo').value = '';
            document.getElementById('pais').value = '';

            // Mostrar el modal
            document.getElementById('perro-modal').classList.remove('hidden');
        });


        // Abrir el modal para editar un perro existente
        document.querySelectorAll('.edit-perro-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;

                // Limpiar el formulario y campo _method
                const form = document.getElementById('perro-form');
                form.reset(); // Limpiar los campos existentes
                const existingMethod = form.querySelector('input[name="_method"]');
                if (existingMethod) existingMethod.remove(); // Eliminar el campo si ya existe

                fetch(`/perros/${id}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        form.action = `/perros/${id}`;
                        form.insertAdjacentHTML('beforeend',
                            '<input type="hidden" name="_method" value="PUT">');

                        document.getElementById('perro-id').value = id;
                        document.getElementById('nombre_perro').value = data.nombre_perro;
                        document.getElementById('propietario').value = data.propietario;
                        document.getElementById('conductor').value = data.conductor;
                        document.getElementById('fecha_nacimiento').value = data
                            .fecha_nacimiento;
                        document.getElementById('raza').value = data.raza;
                        document.getElementById('sexo').value = data.sexo;
                        document.getElementById('microchip').value = data.microchip;
                        document.getElementById('libro_de_origenes').value = data
                            .libro_de_origenes;
                        document.getElementById('cartilla_de_trabajo').value = data
                            .cartilla_de_trabajo;
                        document.getElementById('pais').value = data.pais;

                        document.getElementById('modal-title').innerText = 'Editar Perro';
                        document.getElementById('perro-modal').classList.remove('hidden');
                    })
                    .catch(error => console.error('Error fetching perro data:', error));
            });
        });


        // Cerrar el modal
        document.getElementById('modal-cancel-btn').addEventListener('click', function() {
            console.log('Botón "Cancelar" del modal presionado');
            document.getElementById('perro-modal').classList.add('hidden');
        });

        // Botón de cerrar (extra)
        document.getElementById('modal-close-btn').addEventListener('click', function() {
            console.log('Botón "Cerrar" del modal presionado');
            document.getElementById('perro-modal').classList.add('hidden');
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Abrir el modal para editar una inscripción existente
        document.querySelectorAll('.edit-inscripcion-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;

                // Limpiar el formulario y campo _method
                const form = document.getElementById('inscripcion-form');
                form.reset(); // Limpiar los campos existentes
                const existingMethod = form.querySelector('input[name="_method"]');
                if (existingMethod) existingMethod.remove(); // Eliminar el campo si ya existe

                fetch(`/inscripciones/${id}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        form.action = `/inscripciones/${id}`;
                        form.insertAdjacentHTML('beforeend',
                            '<input type="hidden" name="_method" value="PUT">');

                        document.getElementById('inscripcion-id').value = id;
                        document.getElementById('inscripcion-prueba').value = data.prueba;
                        document.getElementById('inscripcion-fecha').value = data.fecha;
                        document.getElementById('inscripcion-perro').value = data.perro;
                        document.getElementById('inscripcion-valor').value = data.valor;

                        document.getElementById('inscripcion-modal-title').innerText =
                            'Editar Inscripción';
                        document.getElementById('inscripcion-modal').classList.remove(
                            'hidden');
                    })
                    .catch(error => console.error('Error fetching inscripcion data:', error));
            });
        });

        // Cerrar el modal
        document.getElementById('inscripcion-modal-cancel-btn').addEventListener('click', function() {
            document.getElementById('inscripcion-modal').classList.add('hidden');
        });

        // Botón de cerrar (extra)
        document.getElementById('inscripcion-modal-close-btn').addEventListener('click', function() {
            document.getElementById('inscripcion-modal').classList.add('hidden');
        });
    });
</script>

{{-- redirijir a la página de inscripciones --}}
<script>
    document.getElementById('add-inscripcion-btn').addEventListener('click', function() {
        window.location.href = "{{ route('Inscripciones') }}";
    });
</script>


{{--  Validacion de input Cartilla de Trabajo --}}
<script>
    document.getElementById('cartilla_de_trabajo').addEventListener('input', function(e) {
        let value = e.target.value.toUpperCase(); // Convertir a mayúsculas
        const validValue = value.replace(/[^A-Z0-9/]/g, ''); // Eliminar caracteres no permitidos
        if (value !== validValue) {
            e.target.value = validValue; // Actualizar el valor del input
        } else {
            e.target.value = value; // Actualizar el valor del input
        }
        if (validValue.length > 7) {
            e.target.setCustomValidity('Máximo 7 caracteres, puede incluir números, letras y el símbolo "/".');
        } else {
            e.target.setCustomValidity('');
        }
    });
</script>
{{--  Validacion de input Cartilla de Trabajo --}}



{{-- Validacion de input de Microchip --}}
<script>
    document.getElementById('microchip').addEventListener('input', function(e) {
        const value = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
        e.target.value = value.slice(0, 16); // Limitar a 16 caracteres
    });
</script>
{{-- Validacion de input de Microchip --}}


{{-- Validacion de input de Libro de Orígenes --}}
<script>
    document.getElementById('libro_de_origenes').addEventListener('input', function(e) {
        let value = e.target.value.toUpperCase(); // Convertir a mayúsculas
        const validValue = value.replace(/[^A-Z0-9/]/g, ''); // Eliminar caracteres no permitidos
        if (value !== validValue) {
            e.target.value = validValue; // Actualizar el valor del input
        } else {
            e.target.value = value; // Actualizar el valor del input
        }
        if (validValue.length > 16) {
            e.target.setCustomValidity('Máximo 16 caracteres, puede incluir números, letras y el símbolo "/".');
        } else {
            e.target.setCustomValidity('');
        }
    });
</script>
{{-- Validacion de input de Libro de Orígenes --}}
