<x-layout>
    <div class="mt-48 mb-12 flex flex-row justify-center gap-4 flex-wrap">
        @foreach ($blogs as $blog)
            <!-- Componente de tarjeta de blog -->
            <x-blog-card :title="$blog->title" :excerpt="$blog->excerpt" :contentUrl="route('blog.show', $blog->slug)" :image="$blog->image" onclick="openModal('{{ route('blog.show', $blog->slug) }}', '{{ $blog->title }}')" />
        @endforeach
    </div>

    <!-- Usamos el componente modal -->
    <x-blog-modal />
</x-layout>
