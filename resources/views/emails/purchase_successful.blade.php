<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2d87f0;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f7f7f7;
        }
        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 20px;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por tu compra, {{ $userName }}!</h1>
        <p>Nos complace informarte que tu compra ha sido procesada correctamente. Aquí están los detalles de tu pedido:</p>
        
        <!-- Detalles de la compra -->
        <table>
            <tr>
                <th>Descripción</th>
                <td>{{ $description }}</td>
            </tr>
            <tr>
                <th>Monto</th>
                <td>{{ $amount }} €</td>
            </tr>
            <tr>
                <th>Pedido #</th>
                <td>{{ $order }}</td>
            </tr>
        </table>
        
        <!-- Detalle de productos o servicios -->
        <h3>Detalles de la compra:</h3>
        @if($detalle)
            <table>
                <thead>
                    <tr>
                        <th>Perro</th>
                        <th>Prueba</th>
                        <th>Fechas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalle as $item)
                        <tr>
                            <td>{{ $item['perro'] }}</td>
                            <td>{{ $item['prueba'] }}</td>
                            <td>{{ implode(' - ', $item['fechas'] ?? ['Fecha no especificada']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se han encontrado detalles adicionales para tu compra.</p>
        @endif

        <div class="total">
            <p><strong>Total a pagar: {{ $amount }} €</strong></p>
        </div>

        <div class="footer">
            <p>Si tienes alguna pregunta o necesitas más detalles, no dudes en ponerte en contacto con nosotros.</p>
            <p>Gracias por confiar en nosotros.</p>
        </div>
    </div>
</body>
</html>

