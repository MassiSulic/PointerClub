<!-- Footer 1: Visible en escritorio -->

<footer class="bg-AzulPrimario text-white py-8 flex justify-center flex-col lg:block hidden">
    <div class="container mx-auto grid md:grid-cols-3 px-12">
        <!-- Logo y Menú (Mayor tamaño) -->
        <div class="col-span-2 flex items-center gap-8 ">
            <img src="{{ asset('svg/footer/Mesa de trabajo 39.svg') }}" alt="Pointer Club" class="h-32">
            <nav class="flex text-base w-full gap-4 ">
                <div class=" flex flex-col w-full">
                    <a href="{{ route('elPointer') }}" class="hover:underline">El&nbsp;Pointer </a>
                    <a href="{{ route('Concursos') }}" class="hover:underline">Concursos</a>
                </div>
                <div class=" flex flex-col w-full">
                    <a href="{{ route('Inscripciones') }}" class="hover:underline">Inscripciones</a>
                    <a href="{{ route('Resultados') }}" class="hover:underline">Resultados</a>
                </div>
                <div class=" flex flex-col w-full">
                    <a href="{{ route('Socios') }}" class="hover:underline">Socios</a>
                    <a href="{{ route('Actualidad') }}" class="hover:underline">Actualidad</a>
                </div>
                <div class=" flex flex-col w-full">
                    <a href="{{ route('Contacto') }}" class="hover:underline">Contacto</a>
                </div>
            </nav>
        </div>

        <!-- Redes Sociales e Iconos (Menor tamaño) -->
        <div class="flex items-center justify-around gap-8 ml-4">
            <div class="flex flex-row gap-4">
                <a href=""><img src="{{ asset('svg/footer/Mesa de trabajo 43.svg') }}" alt="WhatsApp" class="h-8"></a>
                <a href="https://www.instagram.com/pointerclubespana/?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw%3D%3D"><img src="{{ asset('svg/footer/Mesa de trabajo 43_1.svg') }}" alt="Instagram" class="h-8"></a>
                <a href="https://www.facebook.com/pointerclubspain/?locale=es_ES"><img src="{{ asset('svg/footer/Mesa de trabajo 44.svg') }}" alt="Facebook" class="h-8"></a>
            </div>
            <div class="flex flex-row items-center gap-4">
                <img src="{{ asset('svg/home/Mesa de trabajo 34.svg') }}" alt="FCI" class=" h-24 mb-7">
                <img src="{{ asset('svg/home/pointerFCI concurso.svg') }}" alt="RSCE" class="h-24">
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="border border-MarronSecundario mt-4 mx-20 w-full"></div>
    </div>

    <div class="container mx-auto grid grid-cols-1 px-12">
        <p class="text-sm text-[#B4B4B4] pt-4">
            © 2024 Blömma. Todos los derechos reservados |
            <a href="{{ route('Privacidad') }}" class="hover:underline">Política de privacidad</a> |
            <a href="{{ route('Cookies') }}" class="hover:underline">Política de cookies</a> |
            <a href="{{ route('Legal') }}" class="hover:underline">Aviso legal</a> |
            <a href="{{ route('Envios') }}" class="hover:underline">Política de envíos</a>
        </p>
    </div>
</footer>

<!-- Footer 2: Visible en móviles -->
<footer class="bg-AzulPrimario text-BlancoTerciario py-8 flex justify-center flex-col lg:hidden block">
    <div class="container mx-auto">
        <!-- Logo (Arriba en tablet) -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('svg/footer/Mesa de trabajo 39.svg') }}" alt="Pointer Club" class="h-32">
        </div>

        <!-- Menú (Debajo del logo, centrado) -->
        <div class="flex justify-center mb-6">
            <nav class="text-xl flex flex-col items-center gap-8">
                <div class="text-center">
                    <a href="{{ route('elPointer') }}" class="hover:underline">El&nbsp;Pointer</a>
                </div>
                <div class="text-center">
                    <a href="{{ route('Concursos') }}" class="hover:underline">Concursos</a>
                    <br>
                    <a href="{{ route('Inscripciones') }}" class="hover:underline">Inscripciones</a>
                </div>
                <div class="text-center">
                    <a href="{{ route('Resultados') }}" class="hover:underline">Resultados</a>
                    <br>
                    <a href="{{ route('Socios') }}" class="hover:underline">Socios</a>
                </div>
                <div class="text-center">
                    <a href="{{ route('Actualidad') }}" class="hover:underline">Actualidad</a>
                    <br>
                    <a href="{{ route('Contacto') }}" class="hover:underline">Contacto</a>
                </div>
            </nav>
        </div>

        <!-- Redes Sociales (Debajo del menú, centrado) -->
        <div class="flex justify-center my-12">
            <div class="flex space-x-4">
                <a href=""><img src="{{ asset('svg/footer/Mesa de trabajo 43.svg') }}" alt="WhatsApp" class="h-10"></a>
                <a href="https://www.instagram.com/pointerclubespana/?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw%3D%3D"><img src="{{ asset('svg/footer/Mesa de trabajo 43_1.svg') }}" alt="Instagram" class="h-10"></a>
                <a href="https://www.facebook.com/pointerclubspain/?locale=es_ES"><img src="{{ asset('svg/footer/Mesa de trabajo 44.svg') }}" alt="Facebook" class="h-10"></a>
            </div>
        </div>

        <!-- Iconos (Debajo de redes sociales, centrado) -->
        <div class="flex justify-center my-10">
            <div class="flex space-x-5">
                <img src="{{ asset('svg/home/Mesa de trabajo 34.svg') }}" alt="RSCE" class="h-28">
                <img src="{{ asset('svg/home/pointerFCI concurso.svg') }}" alt="FCI" class="h-28 mt-3">
            </div>
        </div>

        <!-- Línea de separación -->
        <div class="flex justify-center">
            <div class="border border-MarronSecundario mt-4 w-full mx-4"></div>
        </div>

        <!-- Políticas y Derechos (Centrados al final) -->
        <div class="container mx-auto flex justify-center my-4 w-10/12">
            <p class="text-sm text-BlancoTerciario text-center">
                © 2024 Blömma. Todos los derechos reservados |
                <a href="{{ route('Privacidad') }}" class="hover:underline">Política de privacidad</a> |
                <a href="{{ route('Cookies') }}" class="hover:underline">Política de cookies</a> |
                <a href="{{ route('Legal') }}" class="hover:underline">Aviso legal</a> |
                <a href="{{ route('Envios') }}" class="hover:underline">Política de envíos</a>
            </p>
        </div>
    </div>
</footer>
