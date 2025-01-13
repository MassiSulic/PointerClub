<!-- filepath: /c:/xampp/htdocs/PointerClub/resources/views/emails/socio.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Socio</title>
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
        <div class="header">Nueva solicitud de socio</div>
        <div class="content">
            <p><span>Nombre:</span> {{ $nombre }}</p>
            <p><span>Apellido:</span> {{ $apellido }}</p>
            <p><span>País:</span> {{ $pais }}</p>
            <p><span>Provincia:</span> {{ $provincia }}</p>
            <p><span>Ciudad:</span> {{ $ciudad }}</p>
            <p><span>CP:</span> {{ $cp }}</p>
            <p><span>Tel:</span> {{ $tel }}</p>
            <p><span>Correo:</span> {{ $correo }}</p>
        </div>
    </div>
</body>
</html>