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
                        <td class="px-4 py-2 border-b text-center">{{ $inscripcion['valor'] }} euros</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="3" class="px-4 py-2 border-b text-right font-bold">Total:</td>
                        <td class="px-4 py-2 border-b text-center font-bold">{{ $total }} euros</td>
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
            <form id="redsysForm" action="{{ route('redsys.process') }}" method="POST">
                @csrf
                {{-- Limpiar el campo 'prueba' antes de enviarlo --}}
                @php
                    $inscripcionesLimpiadas = array_map(function ($inscripcion) {
                        $inscripcion['prueba'] = trim($inscripcion['prueba']); // Eliminar saltos de línea y espacios
                        return $inscripcion;
                    }, $inscripciones);
                @endphp

                <input type="hidden" name="nombre_prueba" value="{{ $inscripcionesLimpiadas[0]['prueba'] }}">
                <input type="hidden" name="total" value="{{ $total }}">
                <input type="hidden" name="detalle" value="{{ json_encode($inscripcionesLimpiadas) }}">
                <button type="submit" class="text-white py-2 px-4 rounded" style="background-color: #28a745;">Pagar ahora</button>
            </form>            
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