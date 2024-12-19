<div class="overflow-x-auto">
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Nombre del perro</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Nombre del propietario</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Nombre del conductor</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Raza</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Sexo</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Chip</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">LOE</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Cartilla</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">País</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($perros as $perro)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->nombre_perro }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->propietario }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->conductor }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->raza }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->sexo }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->chip }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->loe }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->cartilla }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800">{{ $perro->pais }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-sm text-gray-800 space-x-2">
                        <button class="edit-perro-btn px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-600" 
                                data-id="{{ $perro->id }}">
                            Editar
                        </button>
                        <form action="{{ route('perros.destroy', $perro) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
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

