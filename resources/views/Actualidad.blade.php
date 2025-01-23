<x-layout>
    <div class="mt-48 mb-12 flex flex-row gap-4 flex-wrap px-12 max-w-screen-2xl mx-auto">
        @foreach ($blogs as $blog)
            <!-- Componente de tarjeta de blog -->
            <x-blog-card :title="$blog->title" :excerpt="$blog->excerpt" :contentUrl="route('blog.show', $blog->slug)" :image="$blog->image" onclick="openModal('{{ route('blog.show', $blog->slug) }}', '{{ $blog->title }}')" />
        @endforeach
    </div>

    <!-- Usamos el componente modal -->
    <x-blog-modal />
</x-layout>
