<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store"> <!-- Evitar caché -->
    <title>Redirigiendo al Pago</title>
</head>
<body>
    <h1>Redirigiendo al sistema de pagos...</h1>
    <p>Por favor, espera mientras se completa el proceso de pago.</p>

    <!-- Spinner de carga -->
    <div id="loadingSpinner" style="display: block;">
        <img src="loading-spinner.gif" alt="Cargando...">
    </div>

    <!-- Formulario de pago generado por Redsys -->
    {!! $form !!}  <!-- Aquí insertamos el formulario HTML tal como está -->

    <script>
        // Asegurarse de que el formulario esté completamente cargado antes de enviarlo
        document.addEventListener('DOMContentLoaded', function () {
            try {
                // Verificar si el formulario existe
                if (document.forms[0]) {
                    // Ocultar el spinner de carga y enviar el formulario
                    document.getElementById('loadingSpinner').style.display = 'none';
                    document.forms[0].submit();
                }
            } catch (error) {
                // Si hay un error, mostrar un mensaje
                alert('Hubo un problema al redirigir al sistema de pagos. Por favor, intenta de nuevo.');
            }
        });
    </script>
</body>
</html>

    
