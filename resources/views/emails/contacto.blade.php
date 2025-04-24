<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #1a202c;
        }
        .content p {
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .content span {
            font-weight: bold;
            color: #2d3748;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Nueva consulta desde el formulario de contacto</div>
        <div class="content">
            <p><span>Nombre:</span> {{ $nombre }}</p>
            <p><span>Tel:</span> {{ $tel }}</p>
            <p><span>Correo:</span> {{ $correo }}</p>
            <p><span>Mensaje:</span> {{ $mensaje }}</p>
        </div>
    </div>
</body>
</html>