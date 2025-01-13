<x-layout>
    <div class="mt-48 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col space-y-6 lg:mx-64 sm:mx-24">
            <h1 class="text-left text-2xl px-4 py-1 border-b-4 border-MarronSecundario ">¿Quieres <strong>ser socio</strong> del club?</h1>
            <p>
                <strong>Completa el siguiente formulario</strong>; una vez recibida la solicitud el Pointer Club Español iniciará los trámites correspondientes y le comunicará la resolución de
                la misma en el momento en que ésta se produzca.
            </p>

            <div class=" w-full ">
                <form action="{{ route('socios.enviar') }}" method="POST" class="flex flex-col p-6 pt-0 mx-auto bg-MarronSecundario">
                    @csrf
                    <ul class="space-y-4">
                        <li class="flex flex-row items-end">
                            <label for="nombre" class="text-lg font-semibold text-white mr-2">NOMBRES:</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                        </li>
                        <li class="flex flex-row items-end">
                            <label for="apellido" class="text-lg font-semibold text-white mr-2">APELLIDO/s:</label>
                            <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}"
                                class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                        </li>
                        <div class="flex flex-row space-x-4">
                            <li class="flex flex-row items-end w-full">
                                <label for="pais" class="text-lg font-semibold text-white mr-2">PAÍS:</label>
                                <input type="text" name="pais" id="pais" value="{{ old('pais') }}"
                                    class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                            </li>
                            <li class="flex flex-row items-end w-full">
                                <label for="provincia" class="text-lg font-semibold text-white mr-2">PROVINCIA:</label>
                                <input type="text" name="provincia" id="provincia" value="{{ old('provincia') }}"
                                    class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                            </li>
                        </div>
                        <li class="flex flex-row items-end">
                            <label for="ciudad" class="text-lg font-semibold text-white mr-2">CIUDAD:</label>
                            <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad') }}"
                                class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                        </li>
                        <div class="flex flex-row space-x-4">
                            <li class="flex flex-row items-end w-full">
                                <label for="cp" class="text-lg font-semibold text-white mr-2">CP:</label>
                                <input type="text" name="cp" id="cp" value="{{ old('cp') }}"
                                    class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                            </li>
                            <li class="flex flex-row items-end w-full">
                                <label for="tel" class="text-lg font-semibold text-white mr-2">TEL:</label>
                                <input type="text" name="tel" id="tel" value="{{ old('tel') }}"
                                    class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                            </li>
                        </div>
                        <li class="flex flex-row items-end">
                            <label for="correo" class="text-lg font-semibold text-white mr-2">CORREO:</label>
                            <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                                class="w-full border-b-2 border-b-white border-transparent bg-transparent text-white focus:outline-none focus:border-white">
                        </li>
                    </ul>
                    <div class="flex justify-end">
                        <button class="w-30 mt-4 px-4 py-2 bg-[#C7CBC6] text-black font-semibold hover:bg-[#616261] hover:text-white border-2 border-black transition-all duration-300" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=" bg-[#E8E6D9] px-80 my-16 p-8 ">
        <h1 class="text-left text-2xl px-4 py-1 border-b-4 border-MarronSecundario ">¿Quieres <strong>ser socio</strong> del club?</h1>

        <p class=" pt-2">
            <strong>- Descuento en las inscripciones</strong> (5€).<br>
            <strong>- Informe anual</strong> (digital y gráfico).<br>
            - Tarjetas de <strong>descuento en productos de patrocinadores.</strong>
            (ARION U OTRO, ROPA INDUMENTARIA)<br>
            - Participación en <strong>actividades formativas</strong> vinculadas a temas de conófilia.<br>
            <strong>- Publicitar camadas o ejemplares</strong> seleccionados cumpliendo requisitos.
        </p>
    </div>
</x-layout>
