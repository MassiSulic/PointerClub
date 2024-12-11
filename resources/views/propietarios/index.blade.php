<x-app-layout>
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-bold text-center mb-6">Lista de Propietarios</h1>

        <!-- Mostrar mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de propietarios -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Identificación</th>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Apellido</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propietarios as $propietario)
                    <tr class="text-gray-800">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $propietario->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $propietario->identificacion }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $propietario->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $propietario->apellido }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('propietarios.edit', $propietario) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('propietarios.destroy', $propietario) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No hay propietarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Botón para agregar nuevo propietario -->
        <div class="mt-6 text-center">
            <a href="{{ route('propietarios.create') }}" class="bg-indigo-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                Agregar Propietario
            </a>
        </div>
    </div>
</x-app-layout>
