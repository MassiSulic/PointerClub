<nav class=" flex flex-col">
    <div class=" container ">
        <div class=" w-screen flex justify-center h-28 bg-AzulPrimario ">
            <img src="{{ asset('svg/pointerbanderas.svg') }}" alt="Banderas Navbar" class=" w-1/2 ">
        </div>
    </div>
    <div>
        <ul>
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
