<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        h2 {
            color: #2a7a46;
            font-size: 20px;
            margin-top: 20px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 15px;
        }
        .inscripcion {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .inscripcion strong {
            color: #333;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }
        .footer a {
            color: #2a7a46;
            text-decoration: none;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            color: #2a7a46;
        }
        .order-number {
            font-size: 16px;
            margin-top: 15px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

    <h1>Inscripción exitosa</h1>

    <p>Estimado <strong>{{ $userName }}</strong>,</p>
    <p>Nos complace informarle que su inscripción ha sido procesada con éxito. A continuación, encontrará los detalles de su inscripción.</p>

    <h2>Detalles de Inscripción:</h2>
    <ul>
        @php
            $totalAmount = 0; // Variable para el total
        @endphp
        @foreach ($inscripcionesData as $inscripcion)
            @php
                $totalAmount += $inscripcion['valor']; // Sumar el valor de cada inscripción
            @endphp
            <li class="inscripcion">
                <strong>Perro:</strong> {{ $inscripcion['perro'] }} <br>
                <strong>Prueba:</strong> {{ $inscripcion['prueba'] }} <br>
                <strong>Fecha:</strong> {{ $inscripcion['fecha'] }} <br>
                <strong>Valor:</strong> {{ $inscripcion['valor'] }} euros
            </li>
        @endforeach
    </ul>

    <div class="total">
        <p><strong>Total: {{ number_format($totalAmount, 2, ',', '.') }} euros</strong></p>
    </div>

    <div class="order-number">
        <p><strong>Número de Pedido:</strong> {{ $order }}</p>
    </div>

    <div class="footer">
        <p>Si tiene alguna pregunta, no dude en <a href="mailto:info@pointerclubespana.es">contactarnos</a>.</p>
    </div>

</body>
</html>
