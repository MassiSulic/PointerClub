<x-layout>
    <div class="mt-48 mb-24 flex flex-col space-y-12">
        <!-- Descripción -->
        <p class="text-center p-3 bg-[#E8E6D9] text-MarronSecundario">
            Si tienes una duda, quieres participar en nuestros concursos<br>
            deportivos o hacerte socio, no dudes en contactarnos.
        </p>

        <div class="flex flex-col items-center text-center">
            <img src="{{ asset('svg/home/Tarjeta.svg') }}" alt="Icono 1" class="w-28 h-28">
            <h3 class="mt-4 text-lg w-60 ">HAZTE SOCIO y recibe más beneficios.</h3>
            <button class="mt-4 px-2 py-1 bg-[#C7CBC6] text-black hover:bg-[#616261] border-black border-2">
                <a href="{{ route('Socios') }}">MÁS INFO</a>
                
            </button>
        </div>

        <div class=" p-4 bg-MarronSecundario lg:mx-48 sm:mx-20 mx-8">
            <form action="" class="flex flex-col mx-auto">
                <ul class="">
                    <li class=" flex flex-row items-end">
                        <label for="nombre" class="text-lg font-semibold text-white">NOMBRES:</label>
                        <input type="text" name="Nombre" id="nombre"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                    </li>
                    <li class=" flex flex-row items-end">
                        <label for="nombre" class="text-lg font-semibold text-white">TEL:</label>
                        <input type="text" name="Nombre" id="nombre"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                    </li>
                    <li class=" flex flex-row items-end">
                        <label for="nombre" class="text-lg font-semibold text-white">CORREO:</label>
                        <input type="text" name="Nombre" id="nombre"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                    </li>
                    <li class=" flex flex-row items-end">
                        <label for="nombre" class="text-lg font-semibold text-white">MENSAJE:</label>
                        <input type="text" name="Nombre" id="nombre"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                    </li>
                </ul>
                <div class="flex justify-end">
                    <button class=" w-30 mt-4 px-4 py-2 bg-[#C7CBC6] text-black font-semibold hover:bg-[#616261] hover:text-white border-2 border-black transition-all duration-300" type="submit">Enviar</button>
                </div>
            </form>
        </div>

        
    </div>

    <div class="text-center p-3 bg-[#E8E6D9] text-MarronSecundario flex lg:flex-row justify-center flex-col items-center lg:gap-2 gap-4 mb-24">
        <p>
            info@pointerclubespana.es // secretariapointerclub@gmail.com
        </p>

        <div class=" flex flex-row gap-4">
            <a href="">
                <img src="{{ asset('svg/contacto/Recurso 23.svg') }}" alt="Instagram" class="w-7">
            </a>
            <a href="">
                <img src="{{ asset('svg/contacto/Recurso 22.svg') }}" alt="Facebook" class="w-7">
            </a>
            <a href="{{ route('login') }}">
                <img src="{{ asset('svg/contacto/Recurso 24.svg') }}" alt="Usuario" class="w-7">
            </a>
        </div>

        <p>
            +34 689 293 753
        </p>
    </div>
</x-layout>
