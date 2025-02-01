@extends('layouts.admin')
@include('layouts.navigation')
@section('content')
    <h1 class="text-2xl font-bold mb-4 text-white">Listado de Inscripciones</h1>
    
    <!-- Contenedor para alinear el botón a la derecha -->
    <div class="flex justify-end mb-2">
        <a href="{{ route('admin.export.inscripciones') }}" class="flex items-center px-4 py-2 bg-white text-black rounded hover:bg-green-700 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                <path fill="#169154" d="M29,6H15.744C14.781,6,14,6.781,14,7.744v7.259h15V6z"></path><path fill="#18482a" d="M14,33.054v7.202C14,41.219,14.781,42,15.743,42H29v-8.946H14z"></path>
                <path fill="#0c8045" d="M14 15.003H29V24.005000000000003H14z"></path>
                <path fill="#17472a" d="M14 24.005H29V33.055H14z"></path><g>
                <path fill="#29c27f" d="M42.256,6H29v9.003h15V7.744C44,6.781,43.219,6,42.256,6z"></path><path fill="#27663f" d="M29,33.054V42h13.257C43.219,42,44,41.219,44,40.257v-7.202H29z"></path>
                <path fill="#19ac65" d="M29 15.003H44V24.005000000000003H29z"></path><path fill="#129652" d="M29 24.005H44V33.055H29z"></path></g>
                <path fill="#0c7238" d="M22.319,34H5.681C4.753,34,4,33.247,4,32.319V15.681C4,14.753,4.753,14,5.681,14h16.638 C23.247,14,24,14.753,24,15.681v16.638C24,33.247,23.247,34,22.319,34z"></path>
                <path fill="#fff" d="M9.807 19L12.193 19 14.129 22.754 16.175 19 18.404 19 15.333 24 18.474 29 16.123 29 14.013 25.07 11.912 29 9.526 29 12.719 23.982z"></path>
            </svg>
            Descargar
        </a>
    </div>

    <div class="w-full overflow-auto bg-white shadow-md rounded-lg">
              
        <table class="w-full border border-gray-300">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-3 py-2 border">
                        <!-- Usuario -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Usuario</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Identificación -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Identificación</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'identificacion', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'identificacion', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Email -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Email</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Teléfono -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Teléfono</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'telefono', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'telefono', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- País (sin orden) -->
                        <div class="inline-flex items-center">
                            <span>País</span>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Región -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Región</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'region', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'region', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Prueba y Disciplina -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Prueba y Disciplina</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'prueba', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'prueba', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Fecha de Prueba -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Fecha de Prueba</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'fecha', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'fecha', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Valor -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Valor</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'valor', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'valor', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- ¿Pagó? -->
                        <div class="inline-flex items-center space-x-1">
                            <span>¿Pagó?</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'pago', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'pago', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Fecha Inscripción -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Fecha Inscripción</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Perro -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Perro</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'nombre_perro', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'nombre_perro', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Raza -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Raza</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'raza', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'raza', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Sexo -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Sexo</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'sexo', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'sexo', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Fecha Nacimiento -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Fecha Nacimiento</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'fecha_nacimiento', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'fecha_nacimiento', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Libro de Origenes -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Libro de Origenes</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'libro_de_origenes', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'libro_de_origenes', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Microchip -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Microchip</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'microchip', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'microchip', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Cartilla de Trabajo -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Cartilla de Trabajo</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'cartilla_de_trabajo', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'cartilla_de_trabajo', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Conductor -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Conductor</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'conductor', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'conductor', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- Propietario -->
                        <div class="inline-flex items-center space-x-1">
                            <span>Propietario</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'propietario', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'propietario', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
            
                    <th class="px-3 py-2 border">
                        <!-- País (columna final con orden) -->
                        <div class="inline-flex items-center space-x-1">
                            <span>País</span>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'pais', 'direction' => 'asc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▲
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'pais', 'direction' => 'desc']) }}"
                               class="text-xs text-gray-600 hover:text-gray-900">
                                ▼
                            </a>
                        </div>
                    </th>
                </tr>
            </thead>                      
            <tbody class="text-gray-800 text-sm">
                @foreach($inscripciones as $insc)
                    @php
                        $user = $insc->user;
                        $perro = $insc->perroModel;
                    @endphp
                    <tr class="border-b hover:bg-gray-100">
                        {{-- <td class="px-3 py-2 border">
                            <!-- Botón Editar -->
                            <button onclick="openEditModal({{ json_encode($insc) }})" class="text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4 20h16v2H4v-2zM5.41 13.41L14 4.83V2h-2.83L2 11.17l3.41 3.41zM21.41 2.59a2 2 0 00-2.83 0L14 7.17l3.41 3.41 4.17-4.17a2 2 0 000-2.83z"/>
                                </svg>
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('admin.inscripciones.destroy', $insc->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6 21h12a2 2 0 002-2V7H4v12a2 2 0 002 2zm12-14h-3V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2H4v2h16V7zM9 5h6v2H9V5z"/>
                                    </svg>
                                </button>
                            </form>
                        </td> --}}
                        <td class="px-3 py-2 border">{{ $user->name ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $user->identificacion ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $user->email ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $user->telefono ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $user->pais ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $user->region ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $insc->prueba }}</td>
                        <td class="px-3 py-2 border">{{ $insc->fecha }}</td>
                        <td class="px-3 py-2 border">{{ $insc->valor }}</td>
                        <td class="px-3 py-2 border">{{ $insc->pago == 1 ? 'SÍ' : 'NO' }}</td>
                        <td class="px-3 py-2 border">{{ $insc->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-3 py-2 border">{{ $perro->nombre_perro ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->raza ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->sexo ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->fecha_nacimiento ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->libro_de_origenes ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->microchip ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->cartilla_de_trabajo ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->conductor ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->propietario ?? 'N/A' }}</td>
                        <td class="px-3 py-2 border">{{ $perro->pais ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <!-- Paginación con parámetros de ordenación -->
    <div class="mt-4">
        {{ $inscripciones->appends(['sort' => request('sort'), 'direction' => request('direction')])->links() }}
    </div>



    <!-- Modal de edición -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
    <div class="bg-white rounded-lg p-6 w-2/3">
        <h2 class="text-xl font-bold mb-4">Editar Inscripción</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold">Usuario</label>
                    <input type="text" id="editUsuario" name="usuario" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Identificación</label>
                    <input type="text" id="editIdentificacion" name="identificacion" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Email</label>
                    <input type="email" id="editEmail" name="email" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Teléfono</label>
                    <input type="text" id="editTelefono" name="telefono" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">País</label>
                    <input type="text" id="editPais" name="pais" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Región</label>
                    <input type="text" id="editRegion" name="region" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Prueba y Disciplina</label>
                    <input type="text" id="editPrueba" name="prueba" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Fecha de Prueba</label>
                    <input type="date" id="editFecha" name="fecha" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Valor</label>
                    <input type="number" id="editValor" name="valor" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">¿Pagó?</label>
                    <select id="editPago" name="pago" class="w-full border rounded p-2">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Fecha Inscripción</label>
                    <input type="text" id="editFechaInscripcion" name="fecha_inscripcion" class="w-full border rounded p-2" disabled>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Nombre del Perro</label>
                    <input type="text" id="editPerro" name="perro" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Raza</label>
                    <input type="text" id="editRaza" name="raza" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Sexo</label>
                    <select id="editSexo" name="sexo" class="w-full border rounded p-2">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold">Fecha de Nacimiento</label>
                    <input type="date" id="editFechaNacimiento" name="fecha_nacimiento" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Libro de Orígenes</label>
                    <input type="text" id="editLibroOrigenes" name="libro_origenes" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">N° Chip</label>
                    <input type="text" id="editMicrochip" name="microchip" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">N° Cartilla</label>
                    <input type="text" id="editCartilla" name="cartilla" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Conductor</label>
                    <input type="text" id="editConductor" name="conductor" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold">Propietario</label>
                    <input type="text" id="editPropietario" name="propietario" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-500 text-white rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(inscripcion) {
        document.getElementById('editUsuario').value = inscripcion.user ? inscripcion.user.name : '';
        document.getElementById('editIdentificacion').value = inscripcion.user ? inscripcion.user.identificacion : '';
        document.getElementById('editEmail').value = inscripcion.user ? inscripcion.user.email : '';
        document.getElementById('editTelefono').value = inscripcion.user ? inscripcion.user.telefono : '';
        document.getElementById('editPais').value = inscripcion.user ? inscripcion.user.pais : '';
        document.getElementById('editRegion').value = inscripcion.user ? inscripcion.user.region : '';

        document.getElementById('editPrueba').value = inscripcion.prueba ?? '';
        document.getElementById('editFecha').value = inscripcion.fecha ?? '';
        document.getElementById('editValor').value = inscripcion.valor ?? '';
        document.getElementById('editPago').value = inscripcion.pago ?? '';
        document.getElementById('editFechaInscripcion').value = inscripcion.created_at ?? '';

        document.getElementById('editPerro').value = inscripcion.perroModel ? inscripcion.perroModel.nombre_perro : '';
        document.getElementById('editRaza').value = inscripcion.perroModel ? inscripcion.perroModel.raza : '';
        document.getElementById('editSexo').value = inscripcion.perroModel ? inscripcion.perroModel.sexo : '';
        document.getElementById('editFechaNacimiento').value = inscripcion.perroModel ? inscripcion.perroModel.fecha_nacimiento : '';
        document.getElementById('editLibroOrigenes').value = inscripcion.perroModel ? inscripcion.perroModel.libro_de_origenes : '';
        document.getElementById('editMicrochip').value = inscripcion.perroModel ? inscripcion.perroModel.microchip : '';
        document.getElementById('editCartilla').value = inscripcion.perroModel ? inscripcion.perroModel.cartilla_de_trabajo : '';
        document.getElementById('editConductor').value = inscripcion.perroModel ? inscripcion.perroModel.conductor : '';
        document.getElementById('editPropietario').value = inscripcion.perroModel ? inscripcion.perroModel.propietario : '';


        document.getElementById('editForm').action = `/admin/inscripciones/${inscripcion.id}`;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function confirmDelete(event) {
        if (!confirm("¿Estás seguro de que deseas eliminar esta inscripción? Esta acción no se puede deshacer.")) {
            event.preventDefault();
        }
    }
</script>


@endsection
