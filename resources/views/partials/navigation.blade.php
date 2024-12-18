<!-- Navbar para dispositivos móviles (visible desde 0px hasta 1023px) -->
<nav class="fixed top-0 left-0 w-full bg-AzulPrimario text-white z-50 block lg:hidden">
    <!-- Botón menú para mobile y tablet -->
    <div class="flex justify-between items-center p-4">
        <a href="{{ route('Inicio') }}">
            <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo" class="w-16">
        </a>
        <button id="menu-button" class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Menú desplegable (mobile y tablet) -->
    <div id="mobile-menu" class="hidden bg-AzulPrimario text-white p-4">
        <ul class="space-y-2 text-sm">
            <li><a href="{{ route('elPointer') }}" class="block hover:underline">El Pointer</a></li>
            <li class="relative">
                <button id="club-mobile-button" class="flex items-center justify-between w-full hover:underline">
                    Club
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Submenú -->
                <ul id="club-mobile-menu" class="hidden bg-AzulPrimario text-white pl-4 mt-2 space-y-1">
                    <li><a href="{{ route('JuntaDirectiva') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Junta Directiva</a></li>
                    <li><a href="{{ route('Delegaciones') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Delegaciones</a></li>
                    <li><a href="{{ route('Criaderos') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Criaderos</a></li>
                    <li><a href="{{ route('Galeria') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Galeria</a></li>
                </ul>
            </li>
            <li><a href="{{ route('Concursos') }}" class="block" class=" hover:underline ">Concursos</a></li>
            <li><a href="{{ route('Inscripciones') }}" class="block" class=" hover:underline ">Inscripciones</a></li>
            <li><a href="{{ route('Resultados') }}" class="block" class=" hover:underline ">Resultados</a></li>
            <li><a href="{{ route('Socios') }}" class="block" class=" hover:underline ">Socios</a></li>
            <li><a href="{{ route('Actualidad') }}" class="block" class=" hover:underline ">Actualidad</a></li>
            <li><a href="{{ route('Contacto') }}" class="block" class=" hover:underline ">Contacto</a></li>
        </ul>
    </div>
</nav>

<!-- Navbar para escritorio (visible solo desde 1024px en adelante) -->
<nav class="fixed top-0 left-0 flex flex-col z-50 w-full hidden lg:flex">
    <div class="relative">
        <div class="w-full flex justify-center h-20 bg-black bg-opacity-80">
            <img src="{{ asset('svg/navbar/pointerbanderas.svg') }}" alt="Banderas Navbar" class="w-1/2">
        </div>

        <div class="absolute inset-y-0 right-0 flex items-center mr-28 w-48 gap-4">
            <a href="https://www.instagram.com/pointerclubespana/">
                <img src="{{ asset('svg/navbar/Instagram.svg') }}" alt="Instagram" class="w-7">
            </a>
            <a href="https://www.facebook.com/pointerclubspain/">
                <img src="{{ asset('svg/navbar/Facebook.svg') }}" alt="Facebook" class="w-7">
            </a>
            <a href="{{ route('login') }}">
                <img src="{{ asset('svg/navbar/Usuario.svg') }}" alt="Usuario" class="w-7">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Buscar.svg') }}" alt="Buscar" class="w-7">
            </a>
        </div>
    </div>

    <!-- Menú de navegación en escritorio -->
    <div class="w-full flex justify-center bg-AzulPrimario relative h-12">
        <div class="">
            <a href="{{ route('Inicio') }}">
                <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo del sitio" class=" absolute w-28 left-32 top-1/2 -translate-y-1/2">
            </a>
        </div>
        <ul class="flex items-center gap-4 text-white">
            <li><a href="{{ route('elPointer') }}" class=" hover:underline ">El Pointer</a></li>
            <li class="relative group">
                <a class="flex items-center hover:underline">
                    Club
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <!-- Submenú -->
                <ul class="hidden group-hover:flex absolute bg-AzulPrimario text-white flex-col left-0 top-full py-2">
                    <li><a href="{{ route('JuntaDirectiva') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Junta Directiva</a></li>
                    <li><a href="{{ route('Delegaciones') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Delegaciones</a></li>
                    <li><a href="{{ route('Criaderos') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Criaderos</a></li>
                    <li><a href="{{ route('Galeria') }}" class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Galeria</a></li>
                </ul>
            </li>
            <li><a href="{{ route('Concursos') }}" class=" hover:underline ">Concursos</a></li>
            <li><a href="{{ route('Inscripciones') }}" class=" hover:underline ">Inscripciones</a></li>
            <li><a href="{{ route('Resultados') }}" class=" hover:underline ">Resultados</a></li>
            <li><a href="{{ route('Socios') }}" class=" hover:underline ">Socios</a></li>
            <li><a href="{{ route('Actualidad') }}" class=" hover:underline ">Actualidad</a></li>
            <li><a href="{{ route('Contacto') }}" class=" hover:underline ">Contacto</a></li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const clubMobileButton = document.getElementById('club-mobile-button');
        const clubMobileMenu = document.getElementById('club-mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        clubMobileButton.addEventListener('click', () => {
            clubMobileMenu.classList.toggle('hidden');
        });
    });
</script>
