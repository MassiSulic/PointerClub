@php
    $headers = ['DELEGACIÓN', 'APELLIDOS', 'NOMBRE', 'POBLACIÓN', 'PROVINCIA', 'TEL.'];
    $rows = [
        ['Galicia', 'Álvarez Rubiños', 'Francisco', 'Lugo', 'Lugo', '676158348'],
        ['Valencia y Murcia', 'Chilet Aguilar', 'Jesus', 'Pobla de Vallbona', 'Valencia', '615454984'],
        ['Extremadura', 'Fuentes Duran', 'Rafael', 'Azuaga', 'Badajoz', '699939241'],
        ['Aragón', 'García Calleja', 'Iván', 'Zaragoza', 'Zaragoza', '686718923'],
        ['Cataluña', 'Okkinga', 'Dannielle', 'Lloret de Mar', 'Girona', '679828741'],
        ['Andalucía', 'Palomo Roldán', 'Juan Miguel', 'Jimena de la Frontera', 'Cádiz', '625595491'],
        ['Mallorca', 'Serra Crespi', 'Agustín', 'Sa Pobla (Mallorca)', 'Islas Baleares', '666539049'],
        ['País Vasco', 'Areitio Caritaonandia', 'Juan Luis', 'Garai', 'Bizkaia', '659445966'],
        ['Castilla La Mancha y Madrid', 'Meneses Paños', 'Julian', 'San Clemente', 'Cuenca', '687552626'],
    ];
@endphp

<x-layout>
    <div class="mt-48 mb-24 flex flex-col space-y-12">
        <!-- Descripción -->
        <p class="text-center p-3 bg-[#E8E6D9] text-MarronSecundario">
            En este apartado podrás encontrar a todas las delegaciones, sus representantes y los datos de<br>
            contacto de cada uno, para posibles dudas o eventos a realizarse en su área representada.
        </p>

        <!-- Imagen -->
        <img class="lg:w-1/3 sm:w-96 w-64 mx-auto" src="{{ asset('svg/club/Recurso 12.svg') }}" alt="Mapa con las delegaciones">

        <!-- Tabla -->
        <div class="overflow-x-auto lg:mx-48 sm:mx-20">
            <x-table :headers="$headers" :rows="$rows" />
        </div>
    </div>
</x-layout>
