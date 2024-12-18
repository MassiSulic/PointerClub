<div class="bg-[#F8F4E5] p-4 rounded-lg ">
    <div class="bg-[#8E6E53] text-white text-center py-2">
        <h2 class="text-xl font-bold">CALENDARIO</h2>
    </div>
    <table class="w-full table-auto border-collapse border border-[#23383E] text-center">
        <thead class="bg-[#8E6E53] text-white">
            <tr>
                <th class="py-2">DIA</th>
                <th class="py-2">ENE</th>
                <th>FEB</th>
                <th>MAR</th>
                <th>ABR</th>
                <th>MAY</th>
                <th>JUN</th>
                <th>JUL</th>
                <th>AGO</th>
                <th>SEP</th>
                <th>OCT</th>
                <th>NOV</th>
                <th>DIC</th>
            </tr>
        </thead>
        <tbody>
            @foreach(range(1, 31) as $week)
                <tr>
                    <td class="border border-[#23383E] py-2">{{ $week }}</td>
                    @foreach(range(1, 12) as $month)
                        <td class="border border-[#23383E]">
                            @if(isset($events[$month][$week]))
                                <div class="bg-[#23383E] text-white p-1 rounded">
                                    {{ $events[$month][$week] }}
                                </div>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>