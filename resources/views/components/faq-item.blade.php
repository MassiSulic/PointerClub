<div class="">
    <button class="w-full text-left py-2 focus:outline-none flex justify-between items-center"
        onclick="this.nextElementSibling.classList.toggle('hidden'); 
                this.nextElementSibling.classList.toggle('max-h-0'); 
                this.nextElementSibling.classList.toggle('opacity-0');">
        <span class="font-semibold">{{ $question }}</span>
        <img src="{{asset('svg/FAQs/+.svg')}}" alt="icono desplegable" class=" h-3">
    </button>
    <div class="p-4 hidden h-auto max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
        <p>{{ $answer }}</p>
    </div>
</div>
