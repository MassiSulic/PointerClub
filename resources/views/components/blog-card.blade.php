{{-- resources/views/components/blog-card.blade.php --}}

<div class="max-w-xs rounded overflow-hidden shadow-lg">
    <img class="w-full h-48" src="{{ $image }}" alt="Blog image">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $title }}</div>
        <p class="text-gray-700 text-base">{{ $excerpt }}</p>
    </div>
    <div class="px-6 py-4">
        <button class="text-white bg-MarronSecundario hover:bg-yellow-900 font-semibold py-0.5 px-2 rounded" onclick="openModal('{{ $contentUrl }}', '{{ $title }}')">Leer más</button>
    </div>
</div>

