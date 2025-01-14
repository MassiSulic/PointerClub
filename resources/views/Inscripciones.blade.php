<x-layout>
    <br><br><br><br>
    <div class="mt-20 flex justify-center flex-col">
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold text-AzulPrimario">Inscribe a tu perro</h1>
        </div>
        <div class="items-center w-11/12 mx-auto flex justify-between py-12">
            <span class="font-bold text-xl text-AzulPrimario">Concursos disponibles</span>
            <button id="inscribirBtn" class=" bg-AzulPrimario text-white px-4 py-2 rounded">+ Inscribir mi perro</button>
        </div>
        <div class="overflow-x-auto w-11/12 mx-auto mb-10">
            @php
                $mostrarJuez1 = $pruebas->contains(function ($prueba) { return !is_null($prueba->nombre_juez_1); });
                $mostrarJuez2 = $pruebas->contains(function ($prueba) { return !is_null($prueba->nombre_juez_2); });
                $mostrarJuez3 = $pruebas->contains(function ($prueba) { return !is_null($prueba->nombre_juez_3); });
            @endphp
            <table class="min-w-full bg-white rounded">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-MarronSecundario text-white rounded-tl">Concurso</th>
                        <th class="px-4 py-2 bg-MarronSecundario text-white">Disciplina</th>
                        <th class="px-4 py-2 bg-MarronSecundario text-white">Fechas</th>
                        <th class="px-4 py-2 bg-MarronSecundario text-white">Lugar</th>
                        @if($mostrarJuez1)
                            <th class="px-4 py-2 bg-MarronSecundario text-white">Juez 1</th>
                        @endif
                        @if($mostrarJuez2)
                            <th class="px-4 py-2 bg-MarronSecundario text-white">Juez 2</th>
                        @endif
                        @if($mostrarJuez3)
                            <th class="px-4 py-2 bg-MarronSecundario text-white rounded-tr">Juez 3</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pruebas as $prueba)
                        <tr class="border-t border-AzulPrimario">
                            <td class="px-4 py-2 text-center border-r border-AzulPrimario" style="max-width: 200px;">
                                <div class="truncate" x-data="{ showTooltip: false }" @mouseenter="showTooltip = true"
                                    @mouseleave="showTooltip = false">
                                    {{ \Illuminate\Support\Str::limit($prueba->nombre_prueba, 24, '...') }}
                                    <div x-show="showTooltip"
                                        class="absolute bg-AzulPrimario text-white text-xs rounded py-1 px-4 z-10"
                                        style="min-width: 200px;">
                                        {{ $prueba->nombre_prueba }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-2 border-r border-AzulPrimario text-center">{{ $prueba->disciplina }}</td>
                            <td class="px-4 py-2 border-r border-AzulPrimario text-center">
                                {{ str_replace('|', ' - ', $prueba->fecha) }}</td>
                            <td class="px-4 py-2 border-r border-AzulPrimario text-center">{{ $prueba->lugar }}</td>
                            @if($mostrarJuez1)
                                <td class="px-4 py-2 text-center border-r border-AzulPrimario">{{ $prueba->nombre_juez_1 }}</td>
                            @endif
                            @if($mostrarJuez2)
                                <td class="px-4 py-2 text-center border-r border-AzulPrimario">{{ $prueba->nombre_juez_2 }}</td>
                            @endif
                            @if($mostrarJuez3)
                                <td class="px-4 py-2 text-center border-AzulPrimario">{{ $prueba->nombre_juez_3 }}</td>
                            @endif
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
        <div class="flex justify-end">
            <button id="closeModalXBtn" class="text-gray-500 hover:text-gray-700 text-4xl">&times;</button>
        </div>
        <h2 class="text-xl font-bold mb-4">Inscribirse a una prueba</h2>
        <div id="inscripciones" class="flex-grow overflow-y-auto">
            <div class="inscripcion">
                <label for="prueba" class="block text-sm font-medium text-gray-700">Prueba</label>
                <select id="prueba" name="prueba" 
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none
                 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                 <option value="">Selecciona una prueba</option>
                    @foreach($pruebas as $prueba)
                        @php
                            $fechas = explode('|', $prueba->fecha); // Convertir la cadena de fechas en un array
                        @endphp
                        <option value="{{ $prueba->id }}" data-fechas="{{ $prueba->fecha }}">
                            {{ $prueba->nombre_prueba }} - {{ $prueba->disciplina }} - {{ implode(' - ', $fechas) }}
                        </option>
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
                        <span id="precio_{{ $perro->id }}" class="ml-2 block text-sm text-gray-900"></span> <!-- Span para mostrar el precio dinámico -->
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


    <!-- Modal de Primero debes Añadir un perro -->
    <div id="mensajeModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Debes añadir un perro primero</h2>
            <div class="flex justify-end space-x-4">
                <button id="cancelarBtn" class="bg-gray-500 text-white py-2 px-4 rounded">Cancelar</button>
                <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Añadir Perro</a>
            </div>
        </div>
    </div>
    <!-- Modal de Primero debes Añadir un perro -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numerosSociosValidos = [
                '0002', '0006', '0007', '0008', '0009', '0010', '0011', '0012', '0015', '0016', '0017', '0018',
                '0019', '0020', '0021', '0022', '0023', '0024', '0025', '0026', '0028', '0031', '0032', '0033',
                '0034', '0035', '0037', '0038', '0039', '0040', '0041', '0042', '0043', '0044', '0045', '0046',
                '0047', '0048', '0049', '0050', '0051', '0052', '0053', '0054', '0055', '0056', '0057', '0058',
                '0059', '0060', '0061', '0062', '0063', '0065', '0066', '0069', '0070', '0076', '0077', '0078',
                '0079', '0080', '0082', '0083', '0084', '0085', '0086', '0088', '0089', '0090', '0091', '0093',
                '0094', '0096', '0098', '0099', '0100', '0101', '0102', '0103', '0104', '0105', '0107', '0108',
                '0109', '0110', '0111', '0112', '0114', '0115', '0116', '0117', '0118', '0119', '0120', '0121',
                '0122', '0123', '0124', '0125', '0126', '0127', '0128', '0130', '0131', '0132', '0133', '0134',
                '0136', '0137', '0138', '0139', '0140', '0141', '0145', '0148', '0149', '0150', '0151', '0152',
                '0153', '0154', '0155', '0156', '0157', '0158', '0160', '0161', '0162', '0163', '0164', '0165',
                '0166', '0167', '0168', '0169', '0170', '0171', '0172', '0173', '0174', '0175', '0176', '0177',
                '0178', '0180', '0182', '0184', '0186', '0187', '0188', '0190', '0191', '0192', '0195', '0196',
                '0197', '0198', '0199', '0200', '0202', '0203', '0205', '0206', '0208', '0209', '0210', '0211',
                '0212', '0214', '0216', '0218', '0219', '0220', '0221', '0222', '0223', '0224', '0225', '0226',
                '0227', '0228', '0229', '0230', '0231', '0232', '0233', '0234', '0235', '0236', '0237', '0238',
                '0239', '0240', '0241', '0242', '0243', '0244', '0245', '0246', '0247', '0248', '0249', '0250',
                '0251', '0252', '0253', '0254', '0255', '0256', '0257', '0258', '0259', '0260', '0261'
            ];
            const inscribirBtn = document.getElementById('inscribirBtn');
            const modal = document.getElementById('modal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const inscripcionesContainer = document.getElementById('inscripciones');
            const addInscripcionBtn = document.getElementById('addInscripcionBtn');
            const terminarInscripcionBtn = document.getElementById('terminarInscripcionBtn');
            const totalPrecioSpan = document.getElementById('totalPrecio');
            const precioSpan = document.getElementById('precio'); // Nuevo elemento para mostrar el precio

            let inscripcionIndex = 0; // Índice único para cada inscripción
            let totalPrecio = 0; // Total del precio

            // Función para cargar las fechas de la prueba seleccionada
            function cargarFechas(pruebaSelect, fechasContainer, index) {
                const selectedOption = pruebaSelect.options[pruebaSelect.selectedIndex];
                const fechas = selectedOption.getAttribute('data-fechas') ? selectedOption.getAttribute(
                    'data-fechas').split('|') : [];

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
                    const fechasSeleccionadas = inscripcion.querySelectorAll(
                        'input[name^="fechas_"]:checked').length;
                    const perrosSeleccionados = inscripcion.querySelectorAll(
                        'input[name="perros[]"]:checked').length;
                    const numeroSocio = @json(Auth::check() ? Auth::user()->numero_socio : null);
                    const esSocioValido = numeroSocio && numerosSociosValidos.includes(numeroSocio);
                    const precio = esSocioValido ? 35 : 40; // precio
                    totalPrecio += fechasSeleccionadas * perrosSeleccionados * precio;

                    // Actualizar el precio dinámico al lado del nombre del perro
                    inscripcion.querySelectorAll('input[name="perros[]"]:checked').forEach(perro => {
                        const precioSpan = document.getElementById(`precio_${perro.value}`);
                        if (precioSpan) {
                            precioSpan.textContent = `${precio} euros`;
                        }
                    });
                });
                totalPrecioSpan.textContent = `Total: ${totalPrecio} euros`;
            }

            // Evento para abrir el modal
            inscribirBtn.addEventListener('click', function() {
                    @auth
                    modal.classList.remove('hidden');
                @else
                    window.location.href = '{{ route('login') }}';
                @endauth
            });

        //Cerrar el modal con boton de X
        const closeModalXBtn = document.getElementById('closeModalXBtn'); closeModalXBtn.addEventListener('click',
            function() {
                modal.classList.add('hidden');
            });

        // Evento para cerrar el modal y limpiar todos los campos
        closeModalBtn.addEventListener('click', function() {
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
        addInscripcionBtn.addEventListener('click', function() {
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
            nuevoPruebaSelect.addEventListener('change', function() {
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
        const fechasContainerInicial = document.querySelector('.inscripcion #fechas'); pruebaSelectInicial
        .addEventListener('change', function() {
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
        terminarInscripcionBtn.addEventListener('click', function() {
            const inscripciones = [];
            const numeroSocio = @json(Auth::check() ? Auth::user()->numero_socio : null);
            const esSocioValido = numeroSocio && numerosSociosValidos.includes(
            numeroSocio); // Definir esSocioValido aquí
            document.querySelectorAll('.inscripcion').forEach(inscripcion => {
                const prueba = inscripcion.querySelector('#prueba option:checked').textContent;
                const fechas = Array.from(inscripcion.querySelectorAll(
                    'input[name^="fechas_"]:checked')).map(input => input.value);
                const perros = Array.from(inscripcion.querySelectorAll(
                    'input[name="perros[]"]:checked')).map(input => input.nextElementSibling
                    .textContent.trim());
                const precio = esSocioValido ? 35 : 40; // precio
                fechas.forEach(fecha => {
                    perros.forEach(perro => {
                        inscripciones.push({
                            prueba,
                            fecha,
                            perro,
                            valor: precio
                        });
                    });
                });
            });

            console.log(inscripciones); // Verificar los datos capturados

            document.getElementById('inscripcionesInput').value = JSON.stringify(inscripciones);
            document.getElementById('confirmarInscripcionForm').submit();
        });
        });

        // Abre modal para añadir perro en caso que no tenga perros añadidos
        const mensajeModal = document.getElementById('mensajeModal');
        const cancelarBtn = document.getElementById('cancelarBtn');
        const hayPerros = @json($perros->isNotEmpty());

        inscribirBtn.addEventListener('click', function() {
            if (hayPerros) {
                // Mostrar el modal de inscripción
                modal.classList.remove('hidden');
            } else {
                // Mostrar el modal de mensaje
                mensajeModal.classList.remove('hidden');
            }
        });

        cancelarBtn.addEventListener('click', function() {
            // Ocultar el modal de mensaje
            mensajeModal.classList.add('hidden');
        });
        // Abre modal para añadir perro en caso que no tenga perros añadidos
    </script>



</x-layout>
