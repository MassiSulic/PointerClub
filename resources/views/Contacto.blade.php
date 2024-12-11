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
                MÁS INFO
            </button>
        </div>

        <div class=" p-4 bg-MarronSecundario lg:mx-48 sm:mx-20 mx-8">
            <form action="" class="flex flex-col space-y-6 mx-auto">
                <ul class="space-y-4">
                    <li class=" flex flex-row items-center gap-4">
                        <label for="nombre" class="text-lg font-semibold text-white">NOMBRES:</label>
                        <input type="text" name="Nombre" id="nombre" class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                    </li>
                    <li>
                        <label for="telefono" class="block text-lg font-semibold text-gray-700">TEL:</label>
                        <input type="tel" name="Telefono" id="telefono" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                    </li>
                    <li>
                        <label for="email" class="block text-lg font-semibold text-gray-700">CORREO:</label>
                        <input type="email" name="Email" id="email" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                    </li>
                    <li>
                        <label for="mensaje" class="block text-lg font-semibold text-gray-700">MENSAJE:</label>
                        <textarea name="Mensale" id="mensaje" cols="30" rows="10" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"></textarea>
                    </li>
                </ul>
                <button class="mt-4 px-6 py-2 bg-[#C7CBC6] text-black font-semibold hover:bg-[#616261] border-2 border-black rounded-lg transition-all duration-300" type="submit">Enviar</button>
            </form>
            
        </div>
    </div>
</x-layout>
