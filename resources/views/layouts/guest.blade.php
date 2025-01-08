<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pointer Club Español') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 relative"
        style="background-image: url({{ asset('image/login/wallpaper.jpg') }}); 
           background-size: cover; 
           background-position: center; 
           background-repeat: no-repeat;">

        <!-- Capa de overlay con efecto vidrio -->
        <div class="absolute inset-0 bg-black bg-opacity-30 backdrop-blur-sm z-10"></div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 backdrop-blur-xl bg-white bg-opacity-80 shadow-md overflow-hidden sm:rounded-lg z-20 relative">
            <div class=" p-12 flex justify-center">
                <a href="{{ route('Inicio') }}">
                    <img src="{{ asset('svg/navbar/Logo.svg') }}" alt="Logo del sitio" class="w-28">
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>

</body>

</html>
