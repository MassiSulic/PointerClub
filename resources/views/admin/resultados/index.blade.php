@extends('layouts.admin')
@include('layouts.navigation')
@section('content')

    <div class="container mx-auto p-6">
        <div class="bg-gray-100 p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Gestión de Resultados</h1>

            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.resultados.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                    Nuevo Resultado
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 bg-white rounded-lg shadow">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="border p-3">Título</th>
                            <th class="border p-3">Descripción</th>
                            <th class="border p-3">Texto Destacado</th>
                            <th class="border p-3">Imágenes</th>
                            <th class="border p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultados as $resultado)
                            <tr class="hover:bg-gray-100 transition-all">
                                <td class="border p-3 font-semibold">{{ $resultado->titulo }}</td>
                                <td class="border p-3 max-w-xs overflow-hidden truncate">{!! $resultado->descripcion !!}</td>
                                <td class="border p-3 max-w-xs overflow-hidden truncate">{!! $resultado->texto_destacado !!}</td>
                                <td class="border p-3 text-center">
                                    @if($resultado->imagen1 || $resultado->imagen2)
                                        <button onclick="mostrarImagenes('{{ asset('storage/'.$resultado->imagen1) }}', '{{ asset('storage/'.$resultado->imagen2) }}')" 
                                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded-lg text-sm">
                                            Ver
                                        </button>
                                    @else
                                        <span class="text-gray-500">Sin imágenes</span>
                                    @endif
                                </td>
                                <td class="border p-3 text-center">
                                    <a href="{{ route('admin.resultados.show', $resultado->id) }}" class="text-blue-500 hover:underline">Ver</a>
                                    <a href="{{ route('admin.resultados.edit', $resultado->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    <form action="{{ route('admin.resultados.destroy', $resultado->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ml-2" 
                                                onclick="return confirm('¿Estás seguro de eliminar este resultado?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Enlaces de paginación -->
                <div class="mt-4">
                    {{ $resultados->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar imágenes -->
    <div id="modal-imagenes" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg text-center">
            <h2 class="text-xl font-bold mb-4">Imágenes del Resultado</h2>
            <div id="imagenes-container" class="flex justify-center space-x-4"></div>
            <button onclick="cerrarModal()" class="mt-4 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                Cerrar
            </button>
        </div>
    </div>

    <!-- Script para manejar el modal -->
    <script>
        function mostrarImagenes(imagen1, imagen2) {
            let container = document.getElementById('imagenes-container');
            container.innerHTML = ''; // Limpiar contenido anterior
            
            if (imagen1 !== 'null') {
                let img1 = document.createElement('img');
                img1.src = imagen1;
                img1.classList = "w-40 h-40 object-cover rounded-lg";
                container.appendChild(img1);
            }

            if (imagen2 !== 'null') {
                let img2 = document.createElement('img');
                img2.src = imagen2;
                img2.classList = "w-40 h-40 object-cover rounded-lg";
                container.appendChild(img2);
            }

            document.getElementById('modal-imagenes').classList.remove('hidden');
        }

        function cerrarModal() {
            document.getElementById('modal-imagenes').classList.add('hidden');
        }
    </script>
@endsection
