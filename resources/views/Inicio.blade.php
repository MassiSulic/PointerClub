<x-layout>
    <div class="w-full bg-neutral-100 overflow-hidden">
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

        <div class="bg-AzulPrimario flex flex-col md:flex-row h-auto ">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-start p-6 text-BlancoTerciario text-left">
                <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-4">
                    Campeonato EUROPEO DE MONTAÑA<br> DE POINTER Y SETTER INGLES.
                </h1>
                <p class="text-sm sm:text-base md:text-lg lg:text-xl mb-4">
                    A celebrarse en Val Bredretto (Suiza), entre el 29<br> de septiembre y el 1 de octubre de 2024.
                </p>
                <button
                    class="mt-4 px-4 py-2 bg-[#23383E] text-white hover:bg-[#616261] border-MarronSecundario border-2">
                    MÁS INFO
                </button>
            </div>
            <div class="w-full md:w-1/2 h-64 md:h-full">
                <div class="bg-cover bg-right h-full"
                    style="background-image: url({{ asset('image/home/escritorio-3.jpg') }}); min-height: 600px;"></div>
            </div>
        </div>

        <div class=" h-96 bg-BlancoTerciario"></div>

        <div class=" text-BlancoTerciario">
            <div class="grid grid-cols-1 lg:grid-cols-2 bg-MarronSecundario">
                <!-- Imagen del perro -->
                <div class="bg-cover bg-top h-full"
                    style="background-image: url({{ asset('image/home/escritorio-4.jpg') }}); min-height: 600px;"></div>

                <!-- Contenido del evento -->
                <div class="space-y-4 pb-8">
                    <h1 class="text-3xl font-bold text-white bg-AzulPrimario p-8 pl-20">Próximo CONCURSO.</h1>
                    <!-- Logos de clubes -->
                    <div class="flex items-center space-x-4 justify-center gap-8">
                        <img src="{{ asset('svg/home/Mesa de trabajo 29.svg') }}" alt="icono-1" class="h-32">
                        <img src="{{ asset('svg/home/Mesa de trabajo 34.svg') }}" alt="icono-2" class="h-40 mb-9">
                        <img src="{{ asset('svg/home/pointerFCI concurso.svg') }}" alt="icono-3" class="h-44">
                    </div>

                    <h2 class=" text-xl font-semibold pl-20">PRUEBAS SELECTIVAS CAZA PRÁCTICA <strong>(CACIT)</strong>
                    </h2>
                    <span
                        class="text-2xl font-semibold text-BlancoTerciario bg-AzulPrimario px-5 rounded-full ml-20 ">TOLEDO
                        2024</span>

                    <!-- Fechas y ubicación -->
                    <div class="flex justify-start pl-20 gap-8 py-4">
                        <div class="flex items-start space-x-2">
                            <img src="{{ asset('svg/home/pointerhorario.svg') }}" alt="icono-4" class=" h-12">
                            <p>
                                <span class="font-bold">28 y 29 SEP.</span><br>
                                SEP. 2024 16.00 H.
                            </p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <img src="{{ asset('svg/home/pointerubicacion.svg') }}" alt="icono-5" class="h-12">
                            <p>
                                <span class="font-bold">Terrenos del Coto de Portillo y Fuensalida</span><br>
                                Toledo
                            </p>
                        </div>
                    </div>

                    <!-- Concentración y contacto -->
                    <div class=" pl-20">
                        <h3 class="text-lg font-bold text-AzulPrimario">CONCENTRACIÓN</h3>
                        <p>08.00 H, Rooster Café, C/Maestro Guerrero, 20, <br> 45510 Fuensalida, Toledo.</p>
                    </div>

                    <h3 class="text-lg pl-20 text-AzulPrimario"><strong>670064948</strong> (Javier Núñez)</h3>

                    <!-- Botón -->
                    <button
                        class="my-4 ml-20 px-4 py-2 bg-[#23383E] text-white hover:bg-[#616261] border-2 border-[#8E6E53] rounded ">
                        MÁS INFO
                    </button>
                </div>
            </div>

            <!-- Patrocinadores -->
            <div class="flex justify-center items-center flex-wrap space-x-4 bg-AzulPrimario p-8 gap-24 pl-20">
                <img src="{{ asset('svg/home/Mesa de trabajo 37.svg') }}" alt="icono-6" class="h-7">
                <img src="{{ asset('svg/home/Mesa de trabajo 36.svg') }}" alt="icono-5" class="h-14">
                <img src="{{ asset('svg/home/Mesa de trabajo 38.svg') }}" alt="icono-7" class="h-14">
            </div>
        </div>

        <div class="bg-BlancoTerciario h-screen">
            <x-calendar :events="[
                1 => [1 => 'Evento de Año Nuevo', 3 => 'Reunión General'],
                2 => [1 => 'Taller de Capacitación', 5 => 'Aniversario Empresa'],
                3 => [2 => 'Evento Especial'],
                4 => [4 => 'Vacaciones Semana Santa'],
                6 => [2 => 'Presentación Trimestral'],
                12 => [5 => 'Fiesta de Fin de Año']
            ]" />
        </div>
    </div>

</x-layout>
