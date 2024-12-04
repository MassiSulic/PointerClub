<footer class="bg-[#23383E] text-white py-8">
    <div class="container mx-auto flex flex-wrap justify-between items-center px-12">
        <!-- Logo y Menú -->
        <div class="flex items-center space-x-8 ">
            <img src="{{ asset('svg/footer/Mesa de trabajo 39.svg') }}" alt="Pointer Club" class="h-32">
            <nav class="flex space-x-6 text-sm">
                <a href="{{ route('elPointer') }}" class="hover:underline">El Pointer Club</a>
                <a href="{{ route('Concursos') }}" class="hover:underline">Concursos</a>
                <a href="{{ route('Inscripciones') }}" class="hover:underline">Inscripciones</a>
                <a href="{{ route('Resultados') }}" class="hover:underline">Resultados</a>
                <a href="{{ route('Socios') }}" class="hover:underline">Socios</a>
                <a href="{{ route('Actualidad') }}" class="hover:underline">Actualidad</a>
                <a href="{{ route('Contacto') }}" class="hover:underline">Contacto</a>
            </nav>
        </div>
        <!-- Redes Sociales e Iconos -->
        <div class="flex items-center space-x-6">
            <a href=""><img src="{{ asset('svg/footer/Mesa de trabajo 43.svg') }}" alt="WhatsApp" class="h-6"></a>
            <a href="#"><img src="{{ asset('svg/footer/Mesa de trabajo 43_1.svg') }}" alt="Instagram" class="h-6"></a>
            <a href="#"><img src="{{ asset('svg/footer/Mesa de trabajo 44.svg') }}" alt="Facebook" class="h-6"></a>
            <img src="{{ asset('svg/home/Mesa de trabajo 34.svg') }}" alt="FCI" class="h-28 mb-8">
            <img src="{{ asset('svg/home/pointerFCI concurso.svg') }}" alt="RSCE" class="h-28">
        </div>
    </div>

    <div class="flex justify-center ">
        <div class=" border  border-[#616261] mt-4 w-4/5"></div>
    </div>

    <div class=" container mx-auto flex flex-wrap justify-between items-center ">
        <p class=" px-12 text-sm text-[#B4B4B4] pt-4">
            © 2024 Blömma. Todos los derechos reservados | 
            <a href="{{ route('Privacidad') }}" class="hover:underline">Política de privacidad</a> |
            <a href="{{ route('Cookies') }}" class="hover:underline">Política de cookies</a> |
            <a href="{{ route('Legal') }}" class="hover:underline">Aviso legal</a> |
            <a href="{{ route('Envios') }}" class="hover:underline">Política de envíos</a>
        </p>
    </div>
</footer>
