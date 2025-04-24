@extends('layouts.admin')
@include('layouts.navigation')
@section('content')
    <div class="flex justify-center items-start min-h-screen pt-8">
        <div class="bg-gray-100 p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">{{ $resultado->titulo }}</h1>

            <div class="mb-4">
                <strong class="block text-gray-700">Descripción:</strong>
                <div class="border p-4 bg-white rounded-lg shadow text-gray-800">{!! $resultado->descripcion !!}</div>
            </div>

            <div class="mb-4">
                <strong class="block text-gray-700">Texto Destacado:</strong>
                <div class="border p-4 bg-white rounded-lg shadow text-gray-800">{!! $resultado->texto_destacado !!}</div>
            </div>

            <div class="mb-4">
                <strong class="block text-gray-700">Imágenes:</strong>
                <div class="flex space-x-4">
                    @if($resultado->imagen1)
                        <img src="{{ asset('storage/'.$resultado->imagen1) }}" class="w-40 h-40 object-cover rounded-lg shadow">
                    @endif
                    @if($resultado->imagen2)
                        <img src="{{ asset('storage/'.$resultado->imagen2) }}" class="w-40 h-40 object-cover rounded-lg shadow">
                    @endif
                </div>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('admin.resultados.index') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-all duration-300">
                    Volver
                </a>
            </div>
        </div>
    </div>
@endsection
