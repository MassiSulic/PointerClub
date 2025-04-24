<script src="https://cdn.tiny.cloud/1/zv58l0n9kgvn4kein2cw5t1eicfrlz49o6v6nhq5hxifgtdi/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: 'textarea#descripcion',
            plugins: 'code table lists link image media',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image media | code',
            menubar: false,
            height: 300,
            branding: false,
            content_css: 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'
        });
    });
</script>
