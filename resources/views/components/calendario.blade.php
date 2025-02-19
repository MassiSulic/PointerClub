<div class="bg-[#F8F4E5]">
    <div class="bg-[#8E6E53] text-white text-center py-2 sticky top-0 z-10">
        <h2 class="text-xl font-bold">CALENDARIO</h2>
    </div>
    <table class="w-full table-auto border-collapse border border-[#23383E] text-center">
        <thead class="bg-[#8E6E53] text-white sticky top-0 z-20">
            <tr>
                @foreach(['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'] as $month)
                    <th class="py-2">{{ $month }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach(range(1, 12) as $month)
                    <td class="border border-[#23383E] p-2 align-top"> <!-- Alineación superior -->
                        @if(isset($events[$month]) && count($events[$month]) > 0)
                            <div class="flex flex-col items-start space-y-1"> <!-- Contenedor alineado arriba -->
                                @foreach($events[$month] as $event)
                                    <div class="bg-[#23383E] text-white p-2 rounded w-full">
                                        <span class="font-bold">{{ \Carbon\Carbon::parse($event['date'])->format('d/m') }}</span> - {{ $event['name'] }}
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="w-14 h-6"></div> <!-- Espaciado mínimo -->
                        @endif
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
