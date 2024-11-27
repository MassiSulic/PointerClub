<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pointer Club Español</title>
</head>
<!-- Ver de cambiar la navegación de la carpeta partials (Que yo cree) a la carpeta layouts que ya la trae laravel por defecto -->
<body>
    @include('partials.navigation')
    {{ $slot }}
</body>

</html>
