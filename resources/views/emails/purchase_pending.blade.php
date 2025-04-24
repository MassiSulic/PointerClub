<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción Pendiente</title>
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

    <h1>Inscripción Exitosa</h1>

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

    <p style="color: red; font-weight: bold; text-align: center;">Recuerde abonar la inscripción el día de la competencia o vía transferencia bancaria.</p>
    
    <div class="bg-gray-100 p-4 rounded-lg shadow-md mt-4 text-center font-bold">
        <p class="text-gray-700">
            Se podrá también realizar el pago de las inscripciones mediante transferencia bancaria a la cuenta bancaria del Pointer Club Español que sigue:
        </p>
        <p class="text-gray-700 mt-2">
            BIC/SWIFT - CLPEES2MXXX, IBAN - ES39 3035 0014 6601 4010 0158 (LABORAL KUTXA)
        </p>
        <p class="text-gray-700 mt-2">
            Los pagos por transferencia bancaria deben comunicarse al Pointer Club Español mediante el envío del correspondiente justificante bancario al email de Secretaria (<a href="mailto:secretariapointerclub@gmail.com" class="text-blue-500 underline">secretariapointerclub@gmail.com</a>).
        </p>
        <p class="text-gray-700 mt-2">
            El pago se verá reflejado en su cuenta de <a href="https://pointerclubespana.es/" class="text-blue-500 underline">pointerclubespana.es</a> en 48 hs.
        </p>
    </div>

    <div class="footer">
        <p>Si tiene alguna pregunta, no dude en <a href="mailto:info@pointerclubespana.es">contactarnos</a>.</p>
    </div>

</body>
</html>