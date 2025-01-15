<x-layout>
    <br><br><br><br><br><br>
    <div class="mt-8">
        <h1 class="text-2xl font-bold mb-4 text-center" style="color: rgb(3, 44, 57);">Confirmar Inscripción</h1>
        
        <div class="overflow-x-auto w-11/12 mx-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Prueba</th>
                        <th class="px-4 py-2 border-b">Fecha</th>
                        <th class="px-4 py-2 border-b">Perro</th>
                        <th class="px-4 py-2 border-b">Valor de la prueba</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscripciones as $inscripcion)
                    @php
                        $partesPrueba = explode(' - ', $inscripcion['prueba']);
                        $pruebaSinFecha = $partesPrueba[0] . ' - ' . $partesPrueba[1];
                    @endphp
                    <tr>
                        <td class="px-4 py-2 border-b text-center">{{ $pruebaSinFecha }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $inscripcion['fecha'] }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $inscripcion['perro'] }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $inscripcion['precio'] }} euros</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="3" class="px-4 py-2 border-b text-right font-bold">Total:</td>
                        <td class="px-4 py-2 border-b text-center font-bold">{{ array_sum(array_column($inscripciones, 'precio')) }} euros</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- @if(session('success'))
            <div class="mt-4 text-center">
                <p class="text-green-500 font-bold">{{ session('success') }}</p>
                <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded mt-2 inline-block">Ver inscripciones</a>
            </div>
        @endif --}}

        <div class="flex justify-end mt-4 w-11/12 mx-auto mb-4">
            <form id="pagarDespuesForm" action="{{ route('pagar-despues') }}" method="POST" class="mr-2">
                @csrf
                <input type="hidden" name="inscripciones" value="{{ json_encode($inscripciones) }}">
                <button type="submit" class="text-white py-2 px-4 rounded" style="background-color: #776A54;">Pagar después</button>
            </form>
            {{-- COMENTADO HASTA SOLUCIONAR EL PAGO CON REDSYS --}}
            {{-- <form id="redsysForm" action="{{ route('redsys.process') }}" method="POST">
                @csrf
                @if(isset($inscripciones[0]))
                    <input type="hidden" name="nombre_prueba" value="{{ $inscripciones[0]['prueba'] }}">
                @else
                    <input type="hidden" name="nombre_prueba" value="">
                @endif
                <input type="hidden" name="total" value="{{ array_sum(array_column($inscripciones, 'valor')) }}">
                <input type="hidden" name="detalle" value="{{ json_encode($inscripciones) }}">
                <button type="submit" class="text-white py-2 px-4 rounded" style="background-color: #28a745;">Pagar ahora</button>
            </form>             --}}
        </div>
    </div>
</x-layout>

<!-- Modal de Inscripcion Correcta -->
<div id="inscripcionModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h5 class="text-lg font-bold mb-4">Inscripción</h5>
        <p>¡La inscripción se realizó correctamente!</p>
        <div class="mt-4 flex justify-end space-x-2">
            <a href="{{ route('dashboard') }}#inscripciones" class="bg-blue-500 text-white py-2 px-4 rounded">Ver inscripciones</a>
            <button id="closeModal" class="bg-blue-500 text-white py-2 px-4 rounded">Aceptar</button>
        </div>
    </div>
</div>
<!-- Modal de Inscripcion Correcta -->

{{-- Script para mensaje de inscripcion correcta --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('showPopup'))
            document.getElementById('inscripcionModal').classList.remove('hidden');
        @endif

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('inscripcionModal').classList.add('hidden');
        });
    });
</script>
{{-- Script para mensaje de inscripcion correcta --}}

{{-- Sanitizar los datos enviados --}}
<script>
    document.getElementById('redsysForm').addEventListener('submit', function(event) {
        let nombrePrueba = document.querySelector('input[name="nombre_prueba"]').value;
        let total = document.querySelector('input[name="total"]').value;
        let detalle = document.querySelector('input[name="detalle"]').value;

        // Sanitizar nombre_prueba: eliminar saltos de línea y espacios innecesarios
        nombrePrueba = nombrePrueba.replace(/\n/g, ' ').trim();

        // Sanitizar detalle: limpiar todos los saltos de línea y espacios extra en cada campo
        let detalleArray = JSON.parse(detalle);
        detalleArray = detalleArray.map(item => {
            return {
                prueba: item.prueba.replace(/\n/g, ' ').trim(),
                fecha: item.fecha.trim(),
                perro: item.perro.trim(),
                valor: item.valor
            };
        });

        // Volver a convertir detalle a JSON después de la sanitización
        detalle = JSON.stringify(detalleArray);

        // Asignar los valores sanitizados nuevamente a los inputs del formulario
        document.querySelector('input[name="nombre_prueba"]').value = nombrePrueba;
        document.querySelector('input[name="detalle"]').value = detalle;

        // Si algún valor está vacío, prevenimos el envío temporalmente
        if (!nombrePrueba || !total || !detalle) {
            event.preventDefault();
            alert('Faltan datos en el formulario. Verifica los campos.');
        }
    });
</script>

{{-- Sanitizar los datos enviados --}}



<!-- verificacion de datos enviados -->
<script>
document.getElementById('redsysForm').addEventListener('submit', function(event) {
    const nombrePrueba = document.querySelector('input[name="nombre_prueba"]').value;
    const total = document.querySelector('input[name="total"]').value;
    const detalle = document.querySelector('input[name="detalle"]').value;

    console.log('nombre_prueba:', nombrePrueba);
    console.log('total:', total);
    console.log('detalle:', detalle);

    // Si algo no está correcto, evita que el formulario se envíe (solo para depuración)
    // event.preventDefault();
});
</script>




