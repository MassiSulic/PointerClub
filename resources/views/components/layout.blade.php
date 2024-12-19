<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $metaDescription ?? 'Esta es la pagina del Pointer Club Español' }}">
    <title>{{ $metaTitle ?? 'Pointer Club Español' }}</title>
    <!-- Importación de estilos para tailwind. ATENCIÓN! Para que funcione tiene que estar el servidor de desarrollo de vit (npm run dev) -->
    @vite('resources/css/app.css')
</head>
<!-- Ver de cambiar la navegación de la carpeta partials (Que yo cree) a la carpeta layouts que ya la trae laravel por defecto -->

<body class="min-h-screen flex flex-col bg-BlancoTerciario overflow-x-hidden">
    @include('partials.navigation')
    <main class="flex-grow overflow-auto">
        {{ $slot }}
    </main>

    @include('partials.footer')
    @vite('resources/js/app.js')

    <div class=" fixed z-50 right-8 bottom-12 bg-BlancoTerciario rounded-full p-3">
        <a href="" class="">
            <img src="{{ asset('svg/footer/pointerwhastapp.svg') }}" alt="WhatsApp" class=" w-12">
        </a>
    </div>
    
</body>

</html>
