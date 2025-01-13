{{-- resources/views/components/blog-modal.blade.php --}}

<div id="blogModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-end justify-center">
    <div class="bg-white p-8 rounded-lg w-full m-4 lg:m-12 h-2/3 overflow-y-scroll relative">
        <button onclick="closeModal()" class="text-3xl text-MarronSecundario fixed right-12 lg:right-24">&times;</button>
        <div id="modalContent" class="prose"></div>
    </div>
</div>

<script>
    function openModal(url, title) {
        // Obtener el contenido del blog
        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalContent').innerHTML = data.content;
                document.getElementById('blogModal').classList.remove('hidden');
            })
            .catch(error => console.error('Error:', error));
    }

    function closeModal() {
        document.getElementById('blogModal').classList.add('hidden');
    }
</script>
