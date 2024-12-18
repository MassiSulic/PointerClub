@include('partials.navigation')

<x-app-layout class="text-gray-900">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 h-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Gestión de Perros</h3>

                    <button id="add-perro-btn" 
                    class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium text-sm rounded-lg shadow-md transition ease-in-out duration-150 mb-2">
                    Añadir Perro +
                    </button>

                    @include('partials.perros')

                    {{ $perros->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-6 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Inscripciones</h3>

                    <button id="add-inscripcion-btn" 
                    class="px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium text-sm rounded-lg shadow-md transition ease-in-out duration-150 mb-2">
                    Nueva Inscripción +
                    </button>
                    
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b">Prueba</th>
                                <th class="px-4 py-2 border-b">Fecha</th>
                                <th class="px-4 py-2 border-b">Perro</th>
                                <th class="px-4 py-2 border-b">Valor</th>
                                <th class="px-4 py-2 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inscripciones as $inscripcion)
                                <tr>
                                    <td class="px-4 py-2 border-b text-center">{{ $inscripcion->prueba }}</td>
                                    <td class="px-4 py-2 border-b text-center">{{ $inscripcion->fecha }}</td>
                                    <td class="px-4 py-2 border-b text-center">{{ $inscripcion->perro }}</td>
                                    <td class="px-4 py-2 border-b text-center">{{ $inscripcion->valor }} euros</td>
                                    <td class="px-4 py-2 border-b text-center">
                                        <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
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
<div id="inscripcion-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center z-50">
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






<!-- Modal para Crear/Editar -->
<div id="perro-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 p-6 relative">
        <!-- Título del Modal -->
        <h2 id="modal-title" class="text-2xl font-bold text-gray-800 mb-4">Añadir Perro</h2>

        <!-- Botón de cerrar -->
        <button id="modal-close-btn" 
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400">
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

                <!-- Campo: Nombre del conductor -->
                <div>
                    <label for="conductor" class="block text-sm font-medium text-gray-700">Nombre del conductor</label>
                    <input type="text" id="conductor" name="conductor" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           required>
                </div>

                <!-- Campo: Chip -->
                <div>
                    <label for="chip" class="block text-sm font-medium text-gray-700">Chip</label>
                    <input type="number" id="chip" name="chip" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           required>
                </div>

                <!-- Campo: LOE -->
                <div>
                    <label for="loe" class="block text-sm font-medium text-gray-700">LOE</label>
                    <input type="number" id="loe" name="loe" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           required>
                </div>

                <!-- Campo: Cartilla -->
                <div>
                    <label for="cartilla" class="block text-sm font-medium text-gray-700">Cartilla</label>
                    <input type="number" id="cartilla" name="cartilla" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Campo: Raza -->
                <div>
                    <label for="raza" class="block text-sm font-medium text-gray-700">Raza</label>
                    <select id="raza" name="raza" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                            required>
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
    document.addEventListener('DOMContentLoaded', function () {
            // Abrir el modal para añadir un nuevo perro
            document.getElementById('add-perro-btn').addEventListener('click', function () {
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
        document.getElementById('raza').value = '';
        document.getElementById('sexo').value = '';
        document.getElementById('chip').value = '';
        document.getElementById('loe').value = '';
        document.getElementById('cartilla').value = '';
        document.getElementById('pais').value = '';

        // Mostrar el modal
        document.getElementById('perro-modal').classList.remove('hidden');
    });

    
        // Abrir el modal para editar un perro existente
        document.querySelectorAll('.edit-perro-btn').forEach(button => {
    button.addEventListener('click', function () {
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
                document.getElementById('conductor').value = data.conductor;
                document.getElementById('raza').value = data.raza;
                document.getElementById('sexo').value = data.sexo;
                document.getElementById('chip').value = data.chip;
                document.getElementById('loe').value = data.loe;
                document.getElementById('cartilla').value = data.cartilla;
                document.getElementById('pais').value = data.pais;

                document.getElementById('modal-title').innerText = 'Editar Perro';
                document.getElementById('perro-modal').classList.remove('hidden');
            })
            .catch(error => console.error('Error fetching perro data:', error));
    });
});

    
        // Cerrar el modal
        document.getElementById('modal-cancel-btn').addEventListener('click', function () {
            console.log('Botón "Cancelar" del modal presionado');
            document.getElementById('perro-modal').classList.add('hidden');
        });
    
        // Botón de cerrar (extra)
        document.getElementById('modal-close-btn').addEventListener('click', function () {
            console.log('Botón "Cerrar" del modal presionado');
            document.getElementById('perro-modal').classList.add('hidden');
        });
    });
    </script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Abrir el modal para editar una inscripción existente
        document.querySelectorAll('.edit-inscripcion-btn').forEach(button => {
            button.addEventListener('click', function () {
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

                        document.getElementById('inscripcion-modal-title').innerText = 'Editar Inscripción';
                        document.getElementById('inscripcion-modal').classList.remove('hidden');
                    })
                    .catch(error => console.error('Error fetching inscripcion data:', error));
            });
        });

        // Cerrar el modal
        document.getElementById('inscripcion-modal-cancel-btn').addEventListener('click', function () {
            document.getElementById('inscripcion-modal').classList.add('hidden');
        });

        // Botón de cerrar (extra)
        document.getElementById('inscripcion-modal-close-btn').addEventListener('click', function () {
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