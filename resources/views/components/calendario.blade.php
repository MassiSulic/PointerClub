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
                    <td class="border border-[#23383E] p-2">
                        @if(isset($events[$month]) && count($events[$month]) > 0)
                            @foreach($events[$month] as $event)
                                <div class="bg-[#23383E] text-white p-2 rounded w-full mb-1">
                                    <span class="font-bold">{{ \Carbon\Carbon::parse($event['date'])->format('d/m') }}</span> - {{ $event['name'] }}
                                </div>
                            @endforeach
                        @else
                            <div class="w-14"></div>
                        @endif
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
