<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Nueva Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #2a7a46;
            text-align: center;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .details p {
            margin: 8px 0;
        }
        .details strong {
            color: #333;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        .footer a {
            color: #2a7a46;
            text-decoration: none;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #2a7a46;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Se ha realizado una nueva compra</h1>

    <div class="details">
        <p><strong>Nombre del Usuario:</strong> {{ $userName }}</p>
    </div>

    @php
        $totalAmount = 0; // Variable para el total
    @endphp

    <div class="details">
        <h2>Datos de Inscripciones</h2>
        <ul>
            @foreach ($inscripcionesData as $inscripcion)
                @php
                    $totalAmount += $inscripcion['valor']; // Sumar el valor de cada inscripción
                @endphp
                <li>{{ $inscripcion['perro'] }} - {{ $inscripcion['prueba'] }} - {{ $inscripcion['fecha'] }} - {{ $inscripcion['valor'] }} euros</li>
            @endforeach
        </ul>
    </div>

    <div class="total">
        <p><strong>Total: {{ number_format($totalAmount, 2, ',', '.') }} euros</strong></p>
    </div>

    <div class="order-number">
        <p><strong>Número de Pedido:</strong> {{ $order }}</p>
    </div>

    <div class="footer">
        <p>Por favor, revisa la compra.</p>
    </div>

</body>
</html>