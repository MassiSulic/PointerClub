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

        <div class="p-4 bg-MarronSecundario lg:mx-48 sm:mx-20 mx-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contacto.enviar') }}" method="POST" class="flex flex-col mx-auto">
                @csrf
                <ul class="space-y-4">
                    <li class="flex flex-row items-end">
                        <label for="nombre" class="text-lg font-semibold text-white mr-2">NOMBRES:</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                    </li>
                    <li class="flex flex-row items-end">
                        <label for="tel" class="text-lg font-semibold text-white mr-2">TEL:</label>
                        <input type="text" name="tel" id="tel" value="{{ old('tel') }}"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                    </li>
                    <li class="flex flex-row items-end">
                        <label for="correo" class="text-lg font-semibold text-white mr-2">CORREO:</label>
                        <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                    </li>
                    <li class="flex flex-row items-end">
                        <label for="mensaje" class="text-lg font-semibold text-white mr-2">MENSAJE:</label>
                        <textarea name="mensaje" id="mensaje"
                            class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">{{ old('mensaje') }}</textarea>
                    </li>
                </ul>
                <div class="flex justify-end">
                    <button class="w-30 mt-4 px-4 py-2 bg-[#C7CBC6] text-black font-semibold hover:bg-[#616261] hover:text-white border-2 border-black transition-all duration-300" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center p-3 bg-[#E8E6D9] text-MarronSecundario flex lg:flex-row justify-center flex-col items-center lg:gap-2 gap-4 mb-24">
        <p>
            info@pointerclubespana.es // secretariapointerclub@gmail.com
        </p>

        <div class="flex flex-row gap-4">
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