<!-- Navbar para dispositivos móviles (visible desde 0px hasta 1023px) -->
<nav class="fixed top-0 left-0 w-full bg-AzulPrimario text-white z-50 block lg:hidden">
    <!-- Botón menú para mobile y tablet -->
    <div class="flex justify-between items-center p-4">
        <a href="{{ route('Inicio') }}">
            <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo" class="w-16">
        </a>
        <img src="svg/navbar/BanderasMobile.svg" class=" w-64" alt="">
        <button id="menu-button" class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Menú desplegable (mobile y tablet) -->
    <div id="mobile-menu" class="hidden bg-AzulPrimario text-white p-4 h-screen">
        <ul class="space-y-4 text-lg">
            <li><a href="{{ route('elPointer') }}" class="block hover:underline">El Pointer</a></li>
            <li class="relative">
                <button id="club-mobile-button" class="flex items-center justify-between w-full hover:underline">
                    Club
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Submenú -->
                <ul id="club-mobile-menu" class="hidden bg-AzulPrimario text-white pl-4 mt-2 space-y-1">
                    <li><a href="{{ route('JuntaDirectiva') }}"
                            class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Junta Directiva</a>
                    </li>
                    <li><a href="{{ route('Delegaciones') }}"
                            class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Delegaciones</a>
                    </li>
                    <li><a href="{{ route('Criaderos') }}"
                            class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Criaderos</a></li>
                    <li><a href="{{ route('Galeria') }}"
                            class="px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">Galeria</a></li>
                </ul>
            </li>
            <li><a href="{{ route('Concursos') }}" class="block" class=" hover:underline ">Concursos</a></li>
            <li><a href="{{ route('Inscripciones') }}" class="block" class=" hover:underline ">Inscripciones</a></li>
            <li><a href="{{ route('resultados') }}" class="block" class=" hover:underline ">Resultados</a></li>
            <li><a href="{{ route('Socios') }}" class="block" class=" hover:underline ">Socios</a></li>
            <li><a href="{{ route('Actualidad') }}" class="block" class=" hover:underline ">Actualidad</a></li>
            <li><a href="{{ route('Contacto') }}" class="block" class=" hover:underline ">Contacto</a></li>

            @auth
                    <li class=" flex justify-center">
                        <a href="{{ route('dashboard') }}"
                            class=" text-white bg-MarronSecundario hover:bg-yellow-900 font-semibold py-0.5 px-2 rounded">Mi
                            Cuenta
                        </a>
                    </li>
            @else
                <li class=" flex justify-center">
                    <a href="{{ route('login') }}"
                        class="  text-white bg-MarronSecundario hover:bg-yellow-900 font-semibold py-0.5 px-2 rounded">Iniciar Sesión</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<!-- Navbar para escritorio (visible solo desde 1024px en adelante) -->
<nav class="fixed top-0 left-0 flex flex-col z-50 w-full hidden lg:flex bg-black bg-opacity-80">
    <div class=" flex justify-center items-center h-16 w-full container mx-auto gap-10 ">
        <!-- Banderas -->
        <img src="{{ asset('svg/navbar/pointerbanderas.svg') }}" alt="Banderas Navbar" class=" w-[600px]">

        <!-- Redes sociales -->
        <div class=" flex gap-2">
            <a href="https://www.instagram.com/pointerclubespana/" target="_blank">
                <img src="{{ asset('svg/navbar/Instagram.svg') }}" alt="Instagram" class="w-6">
            </a>
            <a href="https://www.facebook.com/pointerclubspain/" target="_blank">
                <img src="{{ asset('svg/navbar/Facebook.svg') }}" alt="Facebook" class="w-6">
            </a>
            @auth
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                    <img src="{{ asset('svg/navbar/Usuario.svg') }}" alt="Usuario" class="w-6">
                </a>
            @else
                <a href="{{ route('login') }}">
                    <img src="{{ asset('svg/navbar/Usuario.svg') }}" alt="Usuario" class="w-6">
                </a>
            @endauth
            {{-- <a href="">
                <img src="{{ asset('svg/navbar/Buscar.svg') }}" alt="Buscar" class="w-6">
            </a> --}}
        </div>
    </div>



    <!-- Menú de navegación en escritorio -->

    <div class="bg-AzulPrimario h-12 flex items-center">
        <div class=" w-full flex justify-center container mx-auto gap-6 ">
            <div class="z-20 ">
                <a href="{{ route('Inicio') }}">
                    <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo del sitio" class="w-28">
                </a>
            </div>
            <ul class="flex items-center gap-4 text-white">
                <li>
                    <a href="{{ route('elPointer') }}"
                        class="{{ Route::is('elPointer') ? 'underline' : '' }} hover:underline">
                        El Pointer
                    </a>
                </li>
                <li class="relative group">
                    <a class="flex items-center hover:underline">
                        Club
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    <!-- Submenú -->
                    <ul
                        class="hidden group-hover:flex absolute bg-AzulPrimario text-white flex-col left-0 top-full py-2">
                        <li>
                            <a href="{{ route('JuntaDirectiva') }}"
                                class="{{ Route::is('JuntaDirectiva') ? 'underline' : '' }} px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">
                                Junta Directiva
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Delegaciones') }}"
                                class="{{ Route::is('Delegaciones') ? 'underline' : '' }} px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">
                                Delegaciones
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Criaderos') }}"
                                class="{{ Route::is('Criaderos') ? 'underline' : '' }} px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">
                                Criaderos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Galeria') }}"
                                class="{{ Route::is('Galeria') ? 'underline' : '' }} px-4 py-2 whitespace-nowrap hover:bg-opacity-80 hover:underline">
                                Galería
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('Concursos') }}"
                        class="{{ Route::is('Concursos') ? 'underline' : '' }} hover:underline">
                        Concursos
                    </a>
                </li>
                <li>
                    <a href="{{ route('Inscripciones') }}"
                        class="{{ Route::is('Inscripciones') ? 'underline' : '' }} hover:underline">
                        Inscripciones
                    </a>
                </li>
                <li>
                    <a href="{{ route('resultados') }}"
                        class="{{ Route::is('resultados') ? 'underline' : '' }} hover:underline">
                        Resultados
                    </a>
                </li>
                <li>
                    <a href="{{ route('Socios') }}"
                        class="{{ Route::is('Socios') ? 'underline' : '' }} hover:underline">
                        Socios
                    </a>
                </li>
                <li>
                    <a href="{{ route('Actualidad') }}"
                        class="{{ Route::is('Actualidad') ? 'underline' : '' }} hover:underline">
                        Actualidad
                    </a>
                </li>
                <li>
                    <a href="{{ route('Contacto') }}"
                        class="{{ Route::is('Contacto') ? 'underline' : '' }} hover:underline">
                        Contacto
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                            class="{{ Route::is('dashboard') || Route::is('admin.dashboard') ? 'underline' : '' }} block bg-white text-gray-800 hover:text-white font-semibold py-0.5 px-2 rounded border"
                            style="border-color: #032D39; background-color: #8E6E53;">
                            Mi Cuenta
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="{{ Route::is('login') ? 'underline' : '' }} block bg-white text-gray-800 hover:text-white font-semibold py-0.5 px-2 rounded border"
                            style="border-color: #032D39; background-color: #8E6E53;">
                            Iniciar Sesión
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
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
