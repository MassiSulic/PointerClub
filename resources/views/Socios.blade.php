<x-layout>
    <div class="mt-48 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col space-y-6 lg:mx-72 sm:mx-24">
            <h1 class="text-left text-2xl px-4 py-1 border-b-4 border-MarronSecundario ">¿Quieres <strong>ser socio</strong> del club?</h1>
            <p>
                <strong>Completa el siguiente formulario</strong>; una vez recibida la solicitud el Pointer Club Español iniciará los trámites correspondientes y le comunicará la resolución de
                la misma en el momento en que ésta se produzca.
            </p>

            <div class=" w-full ">
                <form action="" class="flex flex-col space-y-6 p-4 mx-auto bg-MarronSecundario">
                    <ul class="space-y-4">
                        <li class=" flex flex-row items-center gap-4">
                            <label for="nombre" class="text-lg font-semibold text-white">NOMBRES:</label>
                            <input type="text" name="Nombre" id="nombre" class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                        </li>
                        <li class=" flex flex-row items-center gap-4">
                            <label for="telefono" class="block text-lg font-semibold text-white">TEL:</label>
                            <input type="tel" name="Telefono" id="telefono" class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                        </li>
                        <li class=" flex flex-row items-center gap-4">
                            <label for="email" class="block text-lg font-semibold text-white">CORREO:</label>
                            <input type="email" name="Email" id="email" class="w-full border-b-2 border-b-white border-transparent bg-transparent">
                        </li>
                        <li class="flex flex-row items-start gap-4">
                            <label for="mensaje" class="block text-lg font-semibold text-white">MENSAJE:</label>
                            <textarea 
                                name="Mensaje" 
                                id="mensaje" 
                                cols="30" 
                                rows="5" 
                                class="w-full border-2 border-white bg-transparent text-white focus:border-b-blue-500 focus:outline-none resize-none"
                            ></textarea>
                        </li>
                    </ul>
                    
                </form>
                <div class="flex justify-end">
                    <button class=" w-30 mt-4 px-4 py-2 bg-[#C7CBC6] text-black font-semibold hover:bg-[#616261] hover:text-white border-2 border-black transition-all duration-300" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <div class=" bg-[#E8E6D9] px-80 my-16 p-8 ">
        <h1 class="text-left text-2xl px-4 py-1 border-b-4 border-MarronSecundario ">¿Quieres <strong>ser socio</strong> del club?</h1>

        <p class=" pt-2">
            <strong>- Descuento en las inscripciones</strong> (entre 10 y 15%).<br>
            <strong>- Informe anual</strong> (digital y gráfico).<br>
            - Tarjetas de <strong>descuento en productos de patrocinadores.</strong>
            (ARION U OTRO, ROPA INDUMENTARIA)<br>
            - Participación en <strong>actividades formativas</strong> vinculadas a temas de conófilia.<br>
            <strong>- Publicitar camadas o ejemplares</strong> seleccionados cumpliendo requisitos.
        </p>
    </div>
</x-layout>
