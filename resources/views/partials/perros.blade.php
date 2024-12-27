
@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto w-full">
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Nombre del Perro</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Propietario</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Conductor</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Nacimiento</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Raza</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Sexo</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Microchip</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Libro de Origenes</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Cartilla de Trabajo</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">País</th>
                <th class="border border-gray-300 px-1.5 py-2 text-center text-sm font-medium text-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($perros as $perro)
                <tr>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->nombre_perro }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->propietario }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->conductor }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->fecha_nacimiento }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->raza }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->sexo }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->microchip }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->libro_de_origenes }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->cartilla_de_trabajo }}</td>
                    <td class="border border-gray-300 px-1.5 py-2 text-sm text-gray-800 text-center">{{ $perro->pais }}</td>
                    <td class="border border-gray-300 text-sm text-gray-800 text-center" style="width: 190px;">
                        <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <button id="inscribirBtn" class="inscribir-perro-btn px-2 py-1 text-white bg-green-600 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 font-medium text-sm rounded-lg shadow-md transition ease-in-out duration-150" data-id="{{ $perro->id }}" title="Inscribirse a una Prueba">
                                Inscribirse
                            </button>
                            <button class="edit-perro-btn px-2 py-1 text-white bg-blue-500 rounded hover:bg-blue-600" 
                                    data-id="{{ $perro->id }}" title="Editar Perro">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </button>
                            <form action="{{ route('perros.destroy', $perro) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a {{ $perro->nombre_perro }}?');" style="margin: 0;">                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600" title="Eliminar Perro" style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6l-2 14H7L5 6"></path>
                                        <path d="M10 11v6"></path>
                                        <path d="M14 11v6"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Paginación -->
<div class="mt-4">
    {{ $perros->links('pagination::tailwind') }}
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
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const numerosSociosValidos = [
                '0002', '0006', '0007', '0008', '0009', '0010', '0011', '0012', '0015', '0016', '0017', '0018', '0019', '0020', '0021', '0022', '0023', '0024', '0025', '0026', '0028', '0031', '0032', '0033', '0034', '0035', '0037', '0038', '0039', '0040', '0041', '0042', '0043', '0044', '0045', '0046', '0047', '0048', '0049', '0050', '0051', '0052', '0053', '0054', '0055', '0056', '0057', '0058', '0059', '0060', '0061', '0062', '0063', '0065', '0066', '0069', '0070', '0076', '0077', '0078', '0079', '0080', '0082', '0083', '0084', '0085', '0086', '0088', '0089', '0090', '0091', '0093', '0094', '0096', '0098', '0099', '0100', '0101', '0102', '0103', '0104', '0105', '0107', '0108', '0109', '0110', '0111', '0112', '0114', '0115', '0116', '0117', '0118', '0119', '0120', '0121', '0122', '0123', '0124', '0125', '0126', '0127', '0128', '0130', '0131', '0132', '0133', '0134', '0136', '0137', '0138', '0139', '0140', '0141', '0145', '0148', '0149', '0150', '0151', '0152', '0153', '0154', '0155', '0156', '0157', '0158', '0160', '0161', '0162', '0163', '0164', '0165', '0166', '0167', '0168', '0169', '0170', '0171', '0172', '0173', '0174', '0175', '0176', '0177', '0178', '0180', '0182', '0184', '0186', '0187', '0188', '0190', '0191', '0192', '0195', '0196', '0197', '0198', '0199', '0200', '0202', '0203', '0205', '0206', '0208', '0209', '0210', '0211', '0212', '0214', '0216', '0218', '0219', '0220', '0221', '0222', '0223', '0224', '0225', '0226', '0227', '0228', '0229', '0230', '0231', '0232', '0233', '0234', '0235', '0236', '0237', '0238', '0239', '0240', '0241', '0242', '0243', '0244', '0245', '0246', '0247', '0248', '0249', '0250', '0251', '0252', '0253', '0254', '0255', '0256', '0257', '0258', '0259', '0260', '0261'
            ];
            const inscribirBtns = document.querySelectorAll('.inscribir-perro-btn');
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
                    const numeroSocio = @json(Auth::check() ? Auth::user()->numero_socio : null);
                    const esSocioValido = numeroSocio && numerosSociosValidos.includes(numeroSocio);
                    const precio = esSocioValido ? 35 : 40;
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
            inscribirBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const perroId = this.dataset.id;
                @auth
                    modal.classList.remove('hidden');
                    document.getElementById(`perro_${perroId}`).checked = true;
                    actualizarTotal();
                @else
                    window.location.href = '{{ route('login') }}';
                @endauth
            });
        });
    
            //Cerrar el modal con boton de X
            const closeModalXBtn = document.getElementById('closeModalXBtn');
            closeModalXBtn.addEventListener('click', function () {
                modal.classList.add('hidden');
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
                const numeroSocio = @json(Auth::check() ? Auth::user()->numero_socio : null);
                const esSocioValido = numeroSocio && numerosSociosValidos.includes(numeroSocio); // Definir esSocioValido aquí
                document.querySelectorAll('.inscripcion').forEach(inscripcion => {
                    const prueba = inscripcion.querySelector('#prueba option:checked').textContent;
                    const fechas = Array.from(inscripcion.querySelectorAll('input[name^="fechas_"]:checked')).map(input => input.value);
                    const perros = Array.from(inscripcion.querySelectorAll('input[name="perros[]"]:checked')).map(input => input.nextElementSibling.textContent.trim());
                    const precio = esSocioValido ? 35 : 40; // Usar esSocioValido aquí
                    fechas.forEach(fecha => {
                        perros.forEach(perro => {
                            inscripciones.push({ prueba, fecha, perro, valor: precio });
                        });
                    });
                });
    
                console.log(inscripciones); // Verificar los datos capturados
    
                document.getElementById('inscripcionesInput').value = JSON.stringify(inscripciones);
                document.getElementById('confirmarInscripcionForm').submit();
            });
        });
    </script>