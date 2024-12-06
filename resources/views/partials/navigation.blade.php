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
            <li><a href="{{ route('elPointer') }}" class="block">El Pointer</a></li>
            <li><a href="{{ route('Club') }}" class="block">Club</a></li>
            <li><a href="{{ route('Concursos') }}" class="block">Concursos</a></li>
            <li><a href="{{ route('Inscripciones') }}" class="block">Inscripciones</a></li>
            <li><a href="{{ route('Resultados') }}" class="block">Resultados</a></li>
            <li><a href="{{ route('Socios') }}" class="block">Socios</a></li>
            <li><a href="{{ route('Actualidad') }}" class="block">Actualidad</a></li>
            <li><a href="{{ route('Contacto') }}" class="block">Contacto</a></li>
        </ul>
    </div>
</nav>

<!-- Navbar para escritorio (visible solo desde 1024px en adelante) -->
<nav class="fixed top-0 left-0 flex flex-col z-50 w-full hidden lg:flex">
    <div class="relative">
        <div class="w-full flex justify-center h-20 bg-black bg-opacity-80">
            <img src="{{ asset('svg/navbar/pointerbanderas.svg') }}" alt="Banderas Navbar" class="w-1/2">
        </div>

        <div class="absolute inset-y-0 right-0 flex items-center mr-20 w-52 gap-4">
            <a href="">
                <img src="{{ asset('svg/navbar/Instagram.svg') }}" alt="Instagram" class="w-8">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Facebook.svg') }}" alt="Facebook" class="w-8">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Usuario.svg') }}" alt="Usuario" class="w-8">
            </a>
            <a href="">
                <img src="{{ asset('svg/navbar/Buscar.svg') }}" alt="Buscar" class="w-8">
            </a>
        </div>
    </div>

    <!-- Menú de navegación en escritorio -->
    <div class="w-full flex justify-center bg-AzulPrimario relative h-12">
        <a href="{{ route('Inicio') }}">
            <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo del sitio" class="w-28 absolute left-52 top-1/2 -translate-y-1/2">
        </a>

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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
