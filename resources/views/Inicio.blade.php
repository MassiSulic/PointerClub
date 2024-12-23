<x-layout>
    <div class="w-full bg-neutral-100 overflow-hidden text-[#123240]">
        <!-- Sección Superior con Imagen y Texto -->
        <div class="relative h-screen bg-cover bg-center flex justify-end items-center"
            style="background-image: url({{ asset('image/home/escritorio-2.jpg') }});">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
            <div class="text-BlancoTerciario z-10 lg:mr-36 lg:text-left mx-auto text-center h-screen flex flex-col">
                <div class="flex-grow flex items-center">
                    <h1 class="text-5xl">La naturaleza<br> se inclina<br> ante su arte.</h1>
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
                            class=" bg-MarronSecundario px-2 rounded-full text-white">AZUAGA 2024</span></h3>
                    <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                        MÁS INFO
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-AzulPrimario flex flex-col md:flex-row h-auto ">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-start p-6 text-BlancoTerciario text-left">
                <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-4">
                    JORNADA DE CAZA. Reunión<br> de aficionados al pointer.
                </h1>
                <p class="text-sm sm:text-base md:text-lg lg:text-xl mb-4">
                    30 de Noviembre 2024 en Badajoz.
                </p>
                <button
                    class="mt-4 px-4 py-2 bg-[#23383E] text-white hover:bg-[#616261] border-MarronSecundario border-2">
                    MÁS INFO
                </button>
            </div>
            <div class="w-full md:w-1/2 h-[300px] md:h-[600px]">
                <div class="h-full bg-cover bg-right"
                    style="background-image: url({{ asset('image/home/Recurso-8.jpg') }});"></div>
            </div>

        </div>

        <div class=" h-24 bg-BlancoTerciario"></div>

        <div class=" text-BlancoTerciario">
            <div class="grid grid-cols-1 lg:grid-cols-2 bg-MarronSecundario">
                <!-- Imagen del perro -->
                <div class="bg-cover bg-top h-full"
                    style="background-image: url({{ asset('image/home/escritorio-4.jpg') }}); min-height: 300px;"></div>

                <!-- Contenido del evento -->
                <div class="space-y-4 pb-8">
                    <h1 class="text-3xl font-bold lg:text-left text-center text-white bg-AzulPrimario p-8 lg:pl-20">
                        Próximo CONCURSO.</h1>
                    <!-- Logos de clubes -->
                    <div class="flex flex-wrap items-center justify-center gap-4 py-8">
                        <img src="{{ asset('svg/home/Mesa de trabajo 29.svg') }}" alt="icono-1" class="h-24">
                        <img src="{{ asset('svg/home/arion.psd@150x.png') }}" alt="icono-2" class="h-16">
                        <img src="{{ asset('svg/home/inMRvu.tif@150x.png') }}" alt="icono-3" class="h-20">
                        <img src="{{ asset('svg/home/Recurso 4@150x.png') }}" alt="icono-3" class="h-20">
                        <img src="{{ asset('svg/home/Recurso 6@150x.png') }}" alt="icono-3" class="h-20">
                    </div>

                    <h2 class=" text-xl font-semibold lg:pl-20 lg:text-left text-center">CAMPEONATO SOBRE PERDIZ<br>
                        SALVAJE DE MONTAÑA
                    </h2>
                    <span
                        class="text-2xl font-semibold text-BlancoTerciario bg-AzulPrimario px-5 rounded-full lg:ml-20 lg:text-left text-center block lg:inline ">SIERRA
                        DE AZUAGA 2024</span>

                    <!-- Fechas y ubicación -->
                    <div class="flex lg:justify-start justify-center lg:pl-20  gap-8 py-4">
                        <div class="flex items-center space-x-2">
                            <img src="{{ asset('svg/home/pointerhorario.svg') }}" alt="icono-4" class=" h-12">
                            <p>
                                <span class="font-bold">11 y 12 ENE.</span>
                            </p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <img src="{{ asset('svg/home/pointerubicacion.svg') }}" alt="icono-5" class="h-12">
                            <p>
                                <span class="font-bold">2700 HECTAREAS,</span><br>
                                Sierra de Azuaga.
                            </p>
                        </div>
                    </div>

                    <!-- Concentración y contacto -->
                    <div class=" lg:pl-20 lg:text-left text-center">
                        <h3 class="text-lg font-bold text-AzulPrimario">CONCENTRACIÓN</h3>
                        <p>08.30 H, "Bar El Cazador".</p>
                    </div>

                    <h3 class="text-lg pl-20 text-AzulPrimario"><strong>699 939241</strong> (Rafael Fuentes)</h3>

                    <!-- Botón -->
                    <div class=" flex justify-center lg:justify-start">
                        <button
                            class="my-4 lg:ml-20 px-4 py-2 bg-[#23383E] text-white hover:bg-[#616261] border-2 border-[#8E6E53] rounded ">
                            MÁS INFO
                        </button>
                    </div>

                </div>
            </div>

            <!-- Patrocinadores -->
            <div class="flex justify-center items-center flex-wrap space-x-4 bg-AzulPrimario p-8 gap-24 lg:pl-20">
                <img src="{{ asset('svg/home/Mesa de trabajo 37.svg') }}" alt="icono-6" class="h-7">
                <img src="{{ asset('svg/home/Mesa de trabajo 36.svg') }}" alt="icono-5" class="h-14">
                <img src="{{ asset('svg/home/Mesa de trabajo 38.svg') }}" alt="icono-7" class="h-14">
            </div>
        </div>

        <div class="bg-BlancoTerciario pt-12">
            <div class=" overflow-y-auto overflow-x-visible w-4/5 m-auto h-96">
                <x-calendar :events="[
                    2 => [
                        // Febrero
                        2 => ['Semana Andalucía GB, 02/02, Marchena.', 'Semana Andalucía BC, 02/02, Marchena.'],
                        3 => ['Semana Andalucía GB, 03/02, Marchena.', 'Semana Andalucía BC, 03/02, Marchena.'],
                        4 => ['Semana Andalucía GB, 04/02, Jerez.', 'Semana Andalucía BC, 04/02, Jerez.'],
                        5 => ['Semana Andalucía GB, 05/02, Jerez.', 'Semana Andalucía BC, 05/02, Jerez.'],
                        6 => ['Semana Andalucía GB, 06/02, Jerez.', 'Semana Andalucía BC, 06/02, Jerez.'],
                        8 => ['Copa Europa, 08/02, Jerez.'],
                        9 => ['Copa Europa, 09/02, Jerez.'],
                        11 => ['Campeonatos Europa BC Pointer, 11/02, Jerez.'],
                        12 => ['Campeonatos Europa BC Pointer, 12/02, Jerez.'],
                        13 => ['Campeonatos Europa GB Pointer, 13/02, Jerez.'],
                        14 => ['Campeonatos Europa GB Pointer, 14/02, Jerez.'],
                    ],
                ]" />




            </div>


            <div class=" flex flex-col items-center space-y-12 p-20 ">
                <div class=" gap-12 w-48 grid grid-cols-1 md:grid-cols-4 md:w-2/3 place-items-center ">
                    <img src="{{ asset('svg/home/icons-partners/pointerarios.svg') }}" alt="">
                    <img src="{{ asset('svg/home/icons-partners/pointerdeca.svg') }}" alt="">
                    <img src="{{ asset('svg/home/icons-partners/pointerdogtra.svg') }}" alt="">
                    <img src="{{ asset('svg/home/icons-partners/pointereskal.svg') }}" alt="">
                </div>
                <div class=" gap-12 grid grid-cols-1 md:grid-cols-3 md:w-2/3 place-items-center ">
                    <img src="{{ asset('svg/home/icons-partners/pointerfilson.svg') }}" alt=""
                        class=" w-48 md:place-self-end ">
                    <img src="{{ asset('svg/home/icons-partners/pointergarmin.svg') }}" alt=""
                        class=" w-48 ">
                    <img src="{{ asset('svg/home/icons-partners/pointerorvis.svg') }}" alt=""
                        class=" w-48 md:place-self-start ">
                </div>
            </div>

        </div>
    </div>

</x-layout>
