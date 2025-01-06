<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirigiendo al Pago</title>
</head>
<body>
    <h1>Redirigiendo al sistema de pagos...</h1>

    <!-- Formulario de pago generado por Redsys -->
    <form action="https://sis-t.redsys.es/sis/realizarPago" method="POST">
        @foreach($form as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" style="display:none;">Pagar ahora</button>
    </form>

    <script>
        // Redirigir automáticamente al formulario de pago
        document.forms[0].submit();
    </script>
</body>
</html>
