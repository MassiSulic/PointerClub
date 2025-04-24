<div class="flex flex-col lg:flex-row md:flex-col bg-[#E8E6D9] py-12 gap-8">
    <div>
        <img src="{{ asset('image/Concursos/Recurso 14.jpg') }}" alt="Perro concurso" class="w-80 mx-auto lg:mx-0">
    </div>

    <div class="p-4 lg:w-2/3 w-full">
        <h1 class="text-left text-2xl px-4 py-1 border-b-4 border-MarronSecundario">{{ $titulo }}</h1>

        <div>
            <ul class="flex flex-col space-y-6 pl-4 py-4 mx-auto">
                <li class="flex flex-row items-end">
                    <span class="text-lg font-semibold text-black">Prueba:</span>
                    <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $prueba }}</span>
                </li>
                <li class="flex flex-row items-end">
                    <span class="text-lg font-semibold text-black">Disciplina/s:</span>
                    <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $disciplina }}</span>
                </li>
                <li class="flex flex-row items-end">
                    <span class="text-lg font-semibold text-black">Fecha:</span>
                    <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $fecha }}</span>
                </li>
                <div class="flex flex-col lg:flex-row gap-4">
                    <li class="flex flex-row items-end w-full">
                        <span class="text-lg font-semibold text-black">Responsable:</span>
                        <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $responsable }}</span>
                    </li>
                    <li class="flex flex-row items-end w-2/3">
                        <span class="text-lg font-semibold text-black">Tel:</span>
                        <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $telefono }}</span>
                    </li>
                    <li class="flex flex-row items-end w-full">
                        <span class="text-lg font-semibold text-black">Delegación:</span>
                        <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $delegacion }}</span>
                    </li>
                </div>
                <li class="flex flex-row items-end">
                    <span class="text-lg font-semibold text-black">Jueces:</span>
                    <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $jueces }}</span>
                </li>
                <li class="flex flex-row items-end">
                    <span class="text-lg font-semibold text-black">Observaciones:</span>
                    <span class="w-full border-b-2 border-b-black border-transparent bg-transparent pl-2">{{ $observaciones }}</span>
                </li>
            </ul>
        </div>

        <div class="flex justify-end items-center gap-8 mt-2">
            <!-- Enlace dinámico -->
            <a href="{{ $url }}" class="w-30 px-2 py-1 bg-[#C7CBC6] text-black font-semibold hover:bg-[#616261] hover:text-black border-2 border-black transition-all duration-300 text-center">
                INSCRIPCIÓN
            </a>
        </div>
    </div>
</div>
