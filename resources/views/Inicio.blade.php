<x-layout>
    <div class="w-full bg-neutral-100 overflow-hidden text-[#123240]">
        <!-- Sección Superior con Imagen y Texto -->
        <style>
            .bg-responsive {
                background-image: url('{{ asset('image/home/cel-37.jpg') }}');
            }

            @media (min-width: 1024px) {
                .bg-responsive {
                    background-image: url('{{ asset('image/home/escritorio-2.jpg') }}');
                }
            }
        </style>

        <div class="relative h-screen bg-cover bg-center flex justify-end items-center bg-responsive">
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
                    <a href="{{ route('Socios') }}">
                        <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                            MÁS INFO
                        </button>
                    </a>

                </div>
                <!-- Segundo Bloque -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('svg/home/Megafono.svg') }}" alt="Icono 2" class="w-28 h-28">
                    <h3 class="mt-4 text-lg w-74 ">NOVEDADES Y ACTUALIDAD,<br> enterate de todo.</h3>
                    <a href="{{ route('Actualidad') }}">
                        <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                            MÁS INFO
                        </button>
                    </a>

                </div>
                <!-- Tercer Bloque -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('svg/home/Trofeo.svg') }}" alt="Icono 3" class="w-28 h-28">
                    <h3 class="mt-4 text-lg w-60 ">Próximo CONCURSO. <span
                            class=" bg-MarronSecundario px-2 rounded-full text-white">AZUAGA 2024</span></h3>
                    <a href="#proximo-concurso">
                        <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                            MÁS INFO
                        </button>
                    </a>

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

        <div class="bg-BlancoTerciario">
            <div class=" py-24 flex flex-row justify-center gap-4 flex-wrap">
                @foreach ($blogs as $blog)
                    <!-- Componente de tarjeta de blog -->
                    <x-blog-card :title="$blog->title" :excerpt="$blog->excerpt" :contentUrl="route('blog.show', $blog->slug)" :image="$blog->image"
                        onclick="openModal('{{ route('blog.show', $blog->slug) }}', '{{ $blog->title }}')" />
                @endforeach
            </div>

            <!-- Usamos el componente modal -->
            <x-blog-modal />
        </div>

        <div class=" bg-BlancoTerciario" id="proximo-concurso"></div>

        <div class=" text-BlancoTerciario">
            <div class="grid grid-cols-1 lg:grid-cols-2 bg-MarronSecundario">
                <!-- Imagen del perro -->
                <div class="bg-cover bg-top h-full"
                    style="background-image: url({{ asset('image/home/escritorio-4.jpg') }}); min-height: 300px;">
                </div>

                <!-- Contenido del evento -->
                <div class="">
                    <h1 class="text-3xl font-bold lg:text-left text-center text-white bg-AzulPrimario p-8 lg:pl-20">
                        Próximo CONCURSO.</h1>
                    <img src="image/home/ProximoConcurso/1.jpg" alt="">
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
                    <img src="{{ asset('svg/home/icons-partners/pointergarmin.svg') }}" alt="" class=" w-48 ">
                    <img src="{{ asset('svg/home/icons-partners/pointerorvis.svg') }}" alt=""
                        class=" w-48 md:place-self-start ">
                </div>
            </div>

        </div>
    </div>

</x-layout>
