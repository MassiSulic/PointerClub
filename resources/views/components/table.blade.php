<div class="overflow-x-auto">
    <table class="min-w-full border-collapse border border-gray-300 text-center text-sm">
        <thead class="bg-MarronSecundario text-white uppercase">
            <tr>
                @foreach ($headers as $header)
                    <th class="border border-gray-300 p-5">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-AzulPrimario text-white">
            @foreach ($rows as $row)
                <tr class="">
                    @foreach ($row as $cell)
                        <td class="border border-gray-300 px-4 py-2">{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
