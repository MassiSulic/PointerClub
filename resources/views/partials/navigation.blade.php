{{-- <div class=" h-48 bg-black "></div> --}}

<nav class=" fixed top-0 left-0 flex flex-col z-50 ">
    <div class=" relative ">

        <div class=" w-screen flex justify-center h-20 bg-black bg-opacity-80 ">
            <img src="{{ asset('svg/navbar/pointerbanderas.svg') }}" alt="Banderas Navbar" class=" w-1/2 ">
        </div>

        <div class=" absolute inset-y-0 right-0 flex items-center mr-20 w-52 gap-4 ">

            <a href="">
                <img src="{{ asset('svg/navbar/Instagram.svg') }}" alt="Banderas Navbar" class=" w-8 ">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Facebook.svg') }}" alt="Banderas Navbar" class=" w-8 ">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Usuario.svg') }}" alt="Banderas Navbar" class=" w-8 ">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Buscar.svg') }}" alt="Banderas Navbar" class=" w-8 ">
            </a>
        </div>

    </div>

    <div class="w-full flex justify-center bg-AzulPrimario relative h-12">
        <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo del sitio" class="w-28 absolute left-52 top-1/2 -translate-y-1/2">
        <ul class="flex items-center gap-4 text-white">
            <li><a href="{{ route('elPointer') }}">El Pointer</a></li>
            <li><a href="{{ route('Club') }}">Club</a></li>
            <li><a href="{{ route('Concursos') }}">Concursos</a></li>
            <li><a href="{{ route('Inscripciones') }}">Inscripciones</a></li>
            <li><a href="{{ route('Resultados') }}">Resultados</a></li>
            <li><a href="{{ route('Socios') }}">Socios</a></li>
            <li><a href="{{ route('Actualidad') }}">Actualidad</a></li>
            <li><a href="{{ route('Contacto') }}">Contacto</a></li>
        </ul>
    </div>
    
</nav>
