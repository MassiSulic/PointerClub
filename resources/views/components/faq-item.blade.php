<div>
    <button 
        class="w-full text-left pt-4 focus:outline-none flex justify-between items-center"
        onclick="toggleAccordion(this)">
        <span class="font-semibold">{{ $question }}</span>
        <img 
            src="{{ asset('svg/FAQs/+.svg') }}" 
            alt="icono desplegable" 
            class="h-3 transform transition-transform duration-500 ease-in-out"
        >
    </button>
    <div 
        class="p-2 max-h-0 opacity-0 overflow-y-scroll overflow-x-hidden transition-all duration-700 ease-in-out">
        <p>{!! $answer !!}</p>
    </div>
</div>

<script>
    function toggleAccordion(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('img');

        // Alternar clases para la animación del contenido
        if (content.classList.contains('max-h-0')) {
            content.classList.remove('max-h-0', 'opacity-0');
            content.classList.add('max-h-[1000px]', 'opacity-100'); // max-h-[1000px] para contenido largo
        } else {
            content.classList.add('max-h-0', 'opacity-0');
            content.classList.remove('max-h-[1000px]', 'opacity-100');
        }

        // Rotar el ícono
        icon.classList.toggle('rotate-180');
    }
</script>
