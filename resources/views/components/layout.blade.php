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

<body>
    @include('partials.navigation')
    {{ $slot }}
</body>

</html>
