<x-layout>
    <br><br><br><br>
    <div class="mt-16"> <!-- Aumentar el margen superior -->
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold" style="color: #1c313b;">Concursos</h1>
        </div>
        <div class="flex justify-end items-center mb-4"> <!-- Mover el botón a la derecha -->
            <button id="inscribirBtn" class="bg-[#1c313b] text-white px-4 py-2 rounded">+ Inscribir mi perro</button>
        </div>
    </div>
        <div class="overflow-x-auto w-11/12 mx-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Concurso</th>
                        <th class="px-4 py-2 border-b">Fechas</th>
                        <th class="px-4 py-2 border-b">Lugar</th>
                        <th class="px-4 py-2 border-b">Disciplina</th>
                        <th class="px-4 py-2 border-b">Juez 1</th>
                        <th class="px-4 py-2 border-b">Juez 2</th>
                        <th class="px-4 py-2 border-b">Juez 3</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pruebas as $prueba)
                        <tr>
                            <td class="px-4 py-2 border-b" style="max-width: 200px;">
                                <div class="truncate" x-data="{ showTooltip: false }" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                    {{ \Illuminate\Support\Str::limit($prueba->nombre_prueba, 24, '...') }}
                                    <div x-show="showTooltip" class="absolute bg-gray-700 text-white text-xs rounded py-1 px-4 z-10" style="min-width: 200px;">
                                        {{ $prueba->nombre_prueba }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-b">{{ str_replace('|', ' - ', $prueba->fecha) }}</td>                            <td class="px-4 py-2 border-b">{{ $prueba->lugar }}</td>
                            <td class="px-4 py-2 border-b">{{ $prueba->disciplina }}</td>
                            <td class="px-4 py-2 border-b">{{ $prueba->nombre_juez_1 }}</td>
                            <td class="px-4 py-2 border-b">{{ $prueba->nombre_juez_2 }}</td>
                            <td class="px-4 py-2 border-b">{{ $prueba->nombre_juez_3 }}</td>                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal -->
<form id="confirmarInscripcionForm" action="{{ route('confirmar') }}" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="inscripciones" id="inscripcionesInput">
</form>
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-3xl h-4/5 flex flex-col">
        <h2 class="text-xl font-bold mb-4">Inscribirse a una prueba</h2>
        <div id="inscripciones" class="flex-grow overflow-y-auto">
            <div class="inscripcion">
                <label for="prueba" class="block text-sm font-medium text-gray-700">Prueba</label>
                <select id="prueba" name="prueba" 
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none
                 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                 <option value="">Selecciona una prueba</option>
                    @foreach($pruebas as $prueba)
                        <option value="{{ $prueba->id }}" data-fechas="{{ $prueba->fecha }}">{{ $prueba->nombre_prueba }}</option>
                    @endforeach
                </select>

                <label for="fecha" class="block text-sm font-medium text-gray-700 mt-4">Fecha</label>
                <div id="fechas" class="mt-1">
                    @foreach($pruebas as $prueba)
                        @php
                            $fechas = explode('|', $prueba->fecha);
                        @endphp
                        @foreach($fechas as $fecha)
                            <div class="flex items-center">
                                <input id="fecha_{{ $loop->parent->index }}_{{ $loop->index }}" name="fechas[]" type="checkbox" value="{{ $fecha }}" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <label for="fecha_{{ $loop->parent->index }}_{{ $loop->index }}" class="ml-2 block text-sm text-gray-900">{{ $fecha }}</label>
                            </div>
                        @endforeach
                    @endforeach
                </div>

                <label for="perros" class="block text-sm font-medium text-gray-700 mt-4">Selecciona tus perros</label>
                <div id="perrosCheckboxes" class="mt-2">
                    @foreach($perros as $perro)
                        <div class="flex items-center">
                            <input id="perro_{{ $perro->id }}" name="perros[]" type="checkbox" value="{{ $perro->id }}" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            <label for="perro_{{ $perro->id }}" class="ml-2 block text-sm text-gray-900">
                                {{ $perro->nombre_perro }} 
                            </label>
                            <span class="ml-2 block text-sm text-gray-900">40 euros</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex justify-around p-4 bg-gray-100">
            <button id="addInscripcionBtn" class="bg-blue-500 text-white py-2 px-4 rounded">Hacer otra inscripción</button>
            <button id="terminarInscripcionBtn" class="bg-green-500 text-white py-2 px-4 rounded">Terminar inscripción</button>
            <button id="closeModalBtn" class="bg-red-500 text-white py-2 px-4 rounded">Cancelar las inscripciones</button>
        </div>
        <div class="flex justify-end p-4 bg-gray-100">
            <span id="totalPrecio" class="text-lg font-bold">Total: 0 euros</span>
        </div>
    </div>
</div>


    {{-- abre y cierra el modal de inscripciones --}}
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const inscribirBtn = document.getElementById('inscribirBtn');
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const inscripcionesContainer = document.getElementById('inscripciones');
    const addInscripcionBtn = document.getElementById('addInscripcionBtn');
    const terminarInscripcionBtn = document.getElementById('terminarInscripcionBtn');
    const totalPrecioSpan = document.getElementById('totalPrecio');

    let inscripcionIndex = 0; // Índice único para cada inscripción
    let totalPrecio = 0; // Total del precio

    // Función para cargar las fechas de la prueba seleccionada
    function cargarFechas(pruebaSelect, fechasContainer, index) {
        const selectedOption = pruebaSelect.options[pruebaSelect.selectedIndex];
        const fechas = selectedOption.getAttribute('data-fechas') ? selectedOption.getAttribute('data-fechas').split('|') : [];

        // Limpiar fechas anteriores
        fechasContainer.innerHTML = '';

        // Agregar nuevas fechas
        fechas.forEach((fecha, fechaIndex) => {
            const checkboxId = `fecha_${index}_${fechaIndex}`;
            const checkbox = `
                <div class="flex items-center">
                    <input id="${checkboxId}" name="fechas_${index}[]" type="checkbox" value="${fecha}" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <label for="${checkboxId}" class="ml-2 block text-sm text-gray-900">${fecha}</label>
                </div>
            `;
            fechasContainer.insertAdjacentHTML('beforeend', checkbox);
        });

        // Agregar evento a los nuevos checkboxes
        fechasContainer.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                actualizarTotal();
            });
        });
    }

    // Función para actualizar el total del precio
    function actualizarTotal() {
        totalPrecio = 0;
        document.querySelectorAll('.inscripcion').forEach(inscripcion => {
            const fechasSeleccionadas = inscripcion.querySelectorAll('input[name^="fechas_"]:checked').length;
            const perrosSeleccionados = inscripcion.querySelectorAll('input[name="perros[]"]:checked').length;
            totalPrecio += fechasSeleccionadas * perrosSeleccionados * 40;
        });
        totalPrecioSpan.textContent = `Total: ${totalPrecio} euros`;
    }

    // Evento para abrir el modal
    inscribirBtn.addEventListener('click', function () {
        @auth
            modal.classList.remove('hidden');
        @else
            window.location.href = '{{ route('login') }}';
        @endauth
    });

    // Evento para cerrar el modal y limpiar todos los campos
    closeModalBtn.addEventListener('click', function () {
        modal.classList.add('hidden');

        // Eliminar todas las inscripciones menos la original
        const inscripciones = document.querySelectorAll('.inscripcion');
        inscripciones.forEach((inscripcion, index) => {
            if (index > 0) {
                inscripcion.remove();
            }
        });

        // Eliminar todos los separadores
        const separadores = document.querySelectorAll('.separador');
        separadores.forEach(separador => separador.remove());

        // Limpiar y reiniciar los campos de la inscripción original
        const pruebaSelect = document.querySelector('.inscripcion #prueba');
        const fechasContainer = document.querySelector('.inscripcion #fechas');
        const perroSelect = document.querySelector('.inscripcion #perro');

        pruebaSelect.selectedIndex = 0;
        fechasContainer.innerHTML = '';
        if (perroSelect) perroSelect.selectedIndex = 0;

        // Resetear el índice de inscripción
        inscripcionIndex = 0;

        pruebaSelect.dispatchEvent(new Event('change'));

        // Resetear el total del precio
        totalPrecio = 0;
        totalPrecioSpan.textContent = `Total: ${totalPrecio} euros`;
    });

    // Evento para agregar una nueva inscripción
    addInscripcionBtn.addEventListener('click', function () {
        inscripcionIndex++; // Incrementar el índice para la nueva inscripción

        // Crear un separador con tres líneas finas
        const separador = document.createElement('div');
        separador.className = 'separador';
        separador.innerHTML = `
            <div style="margin: 30px 0; display: flex; flex-direction: column; gap: 2px;">
                <div style="border-top: 1px solid grey;"></div>
            </div>
        `;

        // Clonar el formulario de inscripción
        const inscripcion = document.querySelector('.inscripcion').cloneNode(true);
        inscripcion.setAttribute('data-index', inscripcionIndex);
        const nuevoPruebaSelect = inscripcion.querySelector('#prueba');
        const nuevoFechasContainer = inscripcion.querySelector('#fechas');

        // Resetear los valores
        nuevoPruebaSelect.selectedIndex = 0;
        nuevoFechasContainer.innerHTML = '';

        // Asignar evento de cambio al nuevo select con el índice único
        nuevoPruebaSelect.addEventListener('change', function () {
            cargarFechas(nuevoPruebaSelect, nuevoFechasContainer, inscripcionIndex);
        });

        // Hacer únicos los IDs de los inputs clonados
        inscripcion.querySelectorAll('input').forEach(input => {
            const originalId = input.id;
            const newId = originalId + '_clone_' + inscripcionIndex;
            input.id = newId;
            const label = inscripcion.querySelector(`label[for="${originalId}"]`);
            if (label) {
                label.setAttribute('for', newId);
            }
        });

        // Insertar el separador y luego la nueva inscripción
        inscripcionesContainer.appendChild(separador);
        inscripcionesContainer.appendChild(inscripcion);

        // Agregar evento a los nuevos checkboxes
        inscripcion.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                actualizarTotal();
            });
        });
    });

    // Asignar evento de cambio inicial para el primer formulario
    const pruebaSelectInicial = document.querySelector('.inscripcion #prueba');
    const fechasContainerInicial = document.querySelector('.inscripcion #fechas');
    pruebaSelectInicial.addEventListener('change', function () {
        cargarFechas(pruebaSelectInicial, fechasContainerInicial, inscripcionIndex);
    });

    // Disparar el evento change para el primer formulario
    pruebaSelectInicial.dispatchEvent(new Event('change'));

    // Agregar evento a los checkboxes iniciales
    document.querySelectorAll('input[name="fechas[]"], input[name="perros[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            actualizarTotal();
        });
    });

    // Asignar índice a la inscripción inicial
    document.querySelector('.inscripcion').setAttribute('data-index', inscripcionIndex);

    // Evento para terminar la inscripción y enviar los datos
    terminarInscripcionBtn.addEventListener('click', function () {
    const inscripciones = [];
    document.querySelectorAll('.inscripcion').forEach(inscripcion => {
        const prueba = inscripcion.querySelector('#prueba option:checked').textContent;
        const fechas = Array.from(inscripcion.querySelectorAll('input[name^="fechas_"]:checked')).map(input => input.value);        const perros = Array.from(inscripcion.querySelectorAll('input[name="perros[]"]:checked')).map(input => input.nextElementSibling.textContent.trim());

        fechas.forEach(fecha => {
            perros.forEach(perro => {
                inscripciones.push({ prueba, fecha, perro, valor: 40 });
            });
        });
    });

    console.log(inscripciones); // Verificar los datos capturados

    document.getElementById('inscripcionesInput').value = JSON.stringify(inscripciones);
    document.getElementById('confirmarInscripcionForm').submit();
});
});
    </script>

</x-layout>