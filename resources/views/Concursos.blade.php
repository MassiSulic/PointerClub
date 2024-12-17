<x-layout>
    <br><br><br><br>
    <div class="mt-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Concursos</h1>
<button id="inscribirBtn" class="bg-green-500 text-white px-4 py-2 rounded">+ Inscribir mi perro</button>        </div>
        <div class="overflow-x-auto w-11/12 mx-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Concurso</th>
                        <th class="px-4 py-2 border-b">Fecha</th>
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
                            <td class="px-4 py-2 border-b">{{ $prueba->fecha }}</td>
                            <td class="px-4 py-2 border-b">{{ $prueba->lugar }}</td>
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
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-3xl h-4/5 overflow-y-auto">
            <h2 class="text-xl font-bold mb-4">Inscribirse a una prueba</h2>
            <div id="inscripciones">
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
    
                    <label for="perro" class="block text-sm font-medium text-gray-700 mt-4">Perro</label>
                    <select id="perro" name="perro" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                        <option value="">Selecciona un perro</option>
                        @foreach($perros as $perro)
                            <option value="{{ $perro->id }}">{{ $perro->nombre_perro }} - Chip: {{ $perro->chip }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button id="addInscripcionBtn" class="mt-4">Hacer otra inscripción</button>
            <button id="inscribirBtn" class="mt-4">Terminar inscripción</button>
            <button id="closeModalBtn" class="mt-4">Cancelar las incripciones</button>
        </div>
    </div>

<!-- Cambios en los botones -->
<style>
    #addInscripcionBtn {
        background-color: #9ba32a;
        color: rgb(255, 255, 255);
        width: 235px;
        text-align: center;
    }

    #inscribirBtn {
        background-color: #042d39;
        color: white;
        width: 235px;
        text-align: center;
    }

    #closeModalBtn {
        background-color: #82181f;
        color: white;
        width: 235px;
        text-align: center;
    }

    button {
        padding: 8px 12px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
        cursor: pointer;
    }
</style>

    {{-- abre y cierra el modal de inscripciones --}}
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inscribirBtn = document.getElementById('inscribirBtn');
            const modal = document.getElementById('modal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const inscripcionesContainer = document.getElementById('inscripciones');
            const addInscripcionBtn = document.getElementById('addInscripcionBtn');
    
            let inscripcionIndex = 0; // Índice único para cada inscripción
    
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
            });
    
            // Evento para agregar una nueva inscripción
            addInscripcionBtn.addEventListener('click', function () {
                inscripcionIndex++; // Incrementar el índice para la nueva inscripción
    
                // Crear un separador con tres líneas finas
                const separador = document.createElement('div');
                separador.className = 'separador';
                separador.innerHTML = `
                    <div style="margin: 30px 0; display: flex; flex-direction: column; gap: 2px;">
                        <div style="border-top: 1px solid #82181f;"></div>
                        <div style="border-top: 1px solid #9ba32a;"></div>
                        <div style="border-top: 1px solid #82181f;"></div>
                    </div>
                `;
    
                // Clonar el formulario de inscripción
                const inscripcion = document.querySelector('.inscripcion').cloneNode(true);
                const nuevoPruebaSelect = inscripcion.querySelector('#prueba');
                const nuevoFechasContainer = inscripcion.querySelector('#fechas');
    
                // Resetear los valores
                nuevoPruebaSelect.selectedIndex = 0;
                nuevoFechasContainer.innerHTML = '';
    
                // Asignar evento de cambio al nuevo select con el índice único
                nuevoPruebaSelect.addEventListener('change', function () {
                    cargarFechas(nuevoPruebaSelect, nuevoFechasContainer, inscripcionIndex);
                });
    
                // Insertar el separador y luego la nueva inscripción
                inscripcionesContainer.appendChild(separador);
                inscripcionesContainer.appendChild(inscripcion);
            });
    
            // Asignar evento de cambio inicial para el primer formulario
            const pruebaSelectInicial = document.querySelector('.inscripcion #prueba');
            const fechasContainerInicial = document.querySelector('.inscripcion #fechas');
            pruebaSelectInicial.addEventListener('change', function () {
                cargarFechas(pruebaSelectInicial, fechasContainerInicial, inscripcionIndex);
            });
    
            // Disparar el evento change para el primer formulario
            pruebaSelectInicial.dispatchEvent(new Event('change'));
        });
    </script>
    

    



</x-layout>