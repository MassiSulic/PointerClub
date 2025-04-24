<x-layout>
    <div class="mt-48 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col space-y-6 lg:mx-64 sm:mx-24">
            @foreach($resultados as $resultado)
                <!-- Título del resultado -->
                <h2 class="text-left text-2xl px-4 py-1 border-b-4 border-MarronSecundario">
                    {{ $resultado->titulo }}
                </h2>

                <!-- Descripción -->
                <p class="text-gray-800">
                    {!! $resultado->descripcion !!}
                </p>

                <!-- Texto destacado -->
                @if($resultado->texto_destacado)
                    <div class="p-4 bg-MarronSecundario text-BlancoTerciario">
                        <p>{!! $resultado->texto_destacado !!}</p>
                    </div>
                @endif

                <!-- Imágenes -->
                <div class="grid grid-cols-3 gap-4 pt-6 pb-12">
                    @if($resultado->imagen1)
                        <div class="">
                            <img src="{{ asset('storage/' . $resultado->imagen1) }}" alt="Imagen 1"
                                 class="w-full h-full object-cover rounded-lg shadow">
                        </div>
                    @endif
                    @if($resultado->imagen2)
                        <div class="">
                            <img src="{{ asset('storage/' . $resultado->imagen2) }}" alt="Imagen 2"
                                 class="w-full h-full object-cover rounded-lg shadow">
                        </div>
                    @endif
                </div>
            @endforeach
            <!-- Agregar los enlaces de paginación -->
            <div class="mt-4">
                {{ $resultados->links() }}
            </div>
        </div>
    </div>
</x-layout>
