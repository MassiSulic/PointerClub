<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración')</title>

    <!-- Agrega aquí tus enlaces a CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('partials.navigation')  <!-- Esto carga la barra de navegación -->
    <!-- Agrega aquí tus scripts si es necesario -->
</head>
<body class="font-sans"
    style="background-image: url({{ asset('image/Dashboard/IMG_0410.jpg') }}); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-color: rgba(0, 0, 0, 0.3); 
    backdrop-filter: blur(2px);">
    <br><br><br><br><br><br><br><br><br><br>
    
    
    <!-- Contenido Principal -->
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('partials.footer')

</body>
</html>

