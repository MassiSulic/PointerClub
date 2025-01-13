<h1>Compra exitosa</h1>
<p>Estimado {{ $userName }},</p>
<p>Su inscripción ha sido procesada con éxito.</p>
<p><strong>Descripción:</strong> {{ $description }}</p>
<p><strong>Total:</strong> {{ $amount }}</p>

<h2>Detalles de Inscripción:</h2>
<ul>
    @foreach ($inscripcionesData as $inscripcion)
        <li>
            <strong>Perro:</strong> {{ $inscripcion['perro'] }} <br>
            <strong>Prueba:</strong> {{ $inscripcion['prueba'] }} <br>
            <strong>Fecha:</strong> {{ $inscripcion['fecha'] }} <br>
            <strong>Valor:</strong> {{ $inscripcion['valor'] }} euros
        </li>
    @endforeach
</ul>

