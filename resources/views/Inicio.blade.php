<x-layout>
    <div class="w-full bg-neutral-100">
        <!-- Sección Superior con Imagen y Texto -->
        <div class="relative h-screen bg-cover bg-center flex justify-end items-center"
            style="background-image: url({{ asset('image/home/escritorio-2.jpg') }});">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
            <div class="text-BlancoTerciario w-1/4 z-10 mr-36 h-screen flex flex-col">
                <div class="flex-grow flex items-center">
                    <h1 class="text-5xl">La naturaleza se inclina ante su arte.</h1>
                </div>
                <p class="text-sm mb-4">ph. Milena Oleszczuk</p>
            </div>
        </div>


        <!-- Sección de Beneficios -->
        <div class="py-12 bg-BlancoTerciario">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
                <!-- Primer Bloque -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('svg/home/Tarjeta.svg') }}" alt="Icono 1" class="w-28 h-28">
                    <h3 class="mt-4 text-lg w-60 ">HAZTE SOCIO y recibe más beneficios.</h3>
                    <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                        MÁS INFO
                    </button>
                </div>
                <!-- Segundo Bloque -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('svg/home/Megafono.svg') }}" alt="Icono 2" class="w-28 h-28">
                    <h3 class="mt-4 text-lg w-74 ">NOVEDADES Y ACTUALIDAD,<br> enterate de todo.</h3>
                    <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                        MÁS INFO
                    </button>
                </div>
                <!-- Tercer Bloque -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('svg/home/Trofeo.svg') }}" alt="Icono 3" class="w-28 h-28">
                    <h3 class="mt-4 text-lg w-60 ">Próximo CONCURSO. <span
                            class=" bg-MarronSecundario px-2 rounded-full text-white">TOLEDO 2024</span></h3>
                    <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                        MÁS INFO
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-layout>
