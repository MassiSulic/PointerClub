@extends('layouts.admin')

@section('content')
<div class="flex justify-center items-start min-h-screen pt-16 pb-20">
        <div class="bg-gray-100 p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Nuevo Resultado</h1>

            <!-- Cargar configuración de TinyMCE -->
            <x-head.tinymce-config/>

            <form action="{{ route('admin.resultados.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700 font-semibold">Título:</label>
                    <input type="text" name="titulo" id="titulo"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-semibold">Descripción:</label>
                    <!-- Editor TinyMCE -->
                    <textarea id="descripcion" name="descripcion"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>

                <div class="mb-4">
                    <label for="texto_destacado" class="block text-gray-700 font-semibold">Texto destacado:</label>
                    <textarea id="texto_destacado" name="texto_destacado"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>

                <div class="mb-4">
                    <label for="imagen1" class="block text-gray-700 font-semibold">Imagen 1:</label>
                    <input type="file" name="imagen1" id="imagen1"
                        class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label for="imagen2" class="block text-gray-700 font-semibold">Imagen 2:</label>
                    <input type="file" name="imagen2" id="imagen2"
                        class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
