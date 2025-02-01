@extends('layouts.admin')

@section('content')
    <div class="flex justify-center items-start min-h-screen pt-8">
        <div class="bg-gray-100 p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Editar Resultado</h1>

            <!-- Cargar configuración de TinyMCE -->
            <x-head.tinymce-config/>

            <form action="{{ route('admin.resultados.update', $resultado->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700 font-semibold">Título:</label>
                    <input type="text" name="titulo" id="titulo" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" 
                        value="{{ old('titulo', $resultado->titulo) }}">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-semibold">Descripción:</label>
                    <textarea id="descripcion" name="descripcion"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('descripcion', $resultado->descripcion) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="texto_destacado" class="block text-gray-700 font-semibold">Texto Destacado:</label>
                    <textarea name="texto_destacado"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('texto_destacado', $resultado->texto_destacado) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="imagen1" class="block text-gray-700 font-semibold">Imagen 1 (actual):</label>
                    @if($resultado->imagen1)
                        <img src="{{ asset('storage/'.$resultado->imagen1) }}" class="w-40 h-40 object-cover rounded-lg shadow mb-2">
                    @endif
                    <input type="file" name="imagen1" id="imagen1"
                        class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label for="imagen2" class="block text-gray-700 font-semibold">Imagen 2 (actual):</label>
                    @if($resultado->imagen2)
                        <img src="{{ asset('storage/'.$resultado->imagen2) }}" class="w-40 h-40 object-cover rounded-lg shadow mb-2">
                    @endif
                    <input type="file" name="imagen2" id="imagen2"
                        class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
