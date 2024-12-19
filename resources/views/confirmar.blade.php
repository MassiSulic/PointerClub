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

        @if(session('success'))
            <div class="mt-4 text-center">
                <p class="text-green-500 font-bold">{{ session('success') }}</p>
                <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded mt-2 inline-block">Ver inscripciones</a>
            </div>
        @endif

        <div class="flex justify-end mt-4 w-11/12 mx-auto mb-4">
            <form id="pagarDespuesForm" action="{{ route('pagar-despues') }}" method="POST">
                @csrf
                <input type="hidden" name="inscripciones" value="{{ json_encode($inscripciones) }}">
                <button type="submit" class="text-white py-2 px-4 rounded ml-2" style="background-color: #776A54;">Pagar después</button>
            </form>
        </div>
    </div>
</x-layout>