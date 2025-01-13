<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #007BFF;
        }
        .summary {
            margin-bottom: 20px;
        }
        .summary p {
            margin: 0 0 10px;
        }
        .details {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .details th {
            background-color: #f1f1f1;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por tu compra, {{ $userName }}!</h1>
        <div class="summary">
            <p><strong>Descripción:</strong> {{ $description }}</p>
            <p><strong>Monto Total:</strong> {{ $amount }} €</p>
            <p><strong>Pedido #:</strong> {{ $order }}</p>
        </div>
        <div class="details">
            <h2>Detalle de tu inscripción</h2>
            <table>
                <thead>
                    <tr>
                        <th>Perro</th>
                        <th>Prueba</th>
                        <th>Fechas</th>
                        <th>Subtotal (€)</th>
                    </tr>
                </thead>
                <tbody>
                    {!! $detalleHtml !!}
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Si tienes alguna pregunta o necesitas ayuda, contáctanos a través de nuestro sitio web.</p>
            <p>Atentamente,<br>El equipo de Pointer Club Español</p>
        </div>
    </div>
</body>
</html>
