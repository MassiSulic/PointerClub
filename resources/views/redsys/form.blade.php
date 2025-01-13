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
    {!! $form !!}  <!-- Aquí insertamos el formulario HTML tal como está -->

    <script>
        window.onload = function() {
            // Depuración para verificar si el formulario está presente
            console.log('Formulario de pago:', document.forms[0]);

            // Redirigir automáticamente al formulario de pago
            document.forms[0].submit();
        }
    </script>
</body>
</html>

    
