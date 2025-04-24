<x-layout>
    <div class="mt-48 px-4 sm:px-6 lg:px-64 mb-12">
        <h1 class="text-3xl font-bold mb-6">Política de Cookies</h1>

        <h2 class="text-xl font-semibold mb-4">¿Qué son las cookies?</h2>
        <p class="mb-6">
            Las cookies son pequeños archivos de datos que se reciben en la terminal desde el sitio web visitado y se usan para registrar ciertas interacciones de la navegación en un sitio web, almacenando datos que podrán ser actualizados y recuperados. Estos archivos se almacenan en el ordenador del usuario y contienen datos anónimos que no son perjudiciales para su equipo. Se utilizan para recordar las preferencias del usuario, como el idioma seleccionado, los datos de acceso o la personalización de la página.<br>
            Las cookies también pueden ser utilizadas para registrar información anónima sobre cómo utiliza el sitio el visitante, como desde qué página web ha accedido o si ha utilizado un banner publicitario para llegar a la misma.
        </p>

        <h2 class="text-xl font-semibold mb-4">¿Por qué POINTER utiliza cookies?</h2>
        <p class="mb-6">
            Utilizamos cookies estrictamente necesarias y esenciales para que usted navegue por nuestro sitio web y pueda moverse libremente, utilizar áreas seguras, configurar opciones personalizadas, etc.<br>
            También utilizamos cookies que recogen datos relativos al análisis de uso de la web. Estas se utilizan para ayudar a mejorar la experiencia de uso del usuario y el rendimiento de la página.<br>
            Esta web también puede tener enlaces de redes sociales (como Facebook, Instagram, Twitter, YouTube, Linkedin). POINTER no controla las cookies utilizadas por estos sitios externos. Para más información sobre las cookies de las redes sociales u otras webs ajenas, aconsejamos que revise sus propias políticas de cookies.
        </p>

        <h2 class="text-xl font-semibold mb-4">¿Qué uso damos a los diferentes tipos de cookies?</h2>

        <h3 class="text-lg font-semibold mb-2">Según su finalidad:</h3>

        <h4 class="text-md font-semibold mb-2">Cookies técnicas</h4>
        <p class="mb-6">
            Las cookies técnicas son aquellas imprescindibles y estrictamente necesarias para el correcto funcionamiento de un sitio web y la utilización de las diferentes opciones y servicios que ofrece.
        </p>

        <h4 class="text-md font-semibold mb-2">Cookies de personalización</h4>
        <p class="mb-6">
            Estas cookies permiten al usuario especificar o personalizar algunas características de las opciones generales de la página web.
        </p>

        <h4 class="text-md font-semibold mb-2">Cookies analíticas</h4>
        <p class="mb-6">
            Las cookies analíticas son utilizadas por nuestra web para elaborar perfiles de navegación y conocer las preferencias de los usuarios con el fin de mejorar la oferta de productos y servicios.
        </p>

        <h4 class="text-md font-semibold mb-2">Cookies publicitarias / de publicidad</h4>
        <p class="mb-6">
            Las cookies publicitarias permiten la gestión de los espacios publicitarios de acuerdo con criterios concretos, como la frecuencia de acceso o el contenido editado.
        </p>

        <h3 class="text-lg font-semibold mb-2">Según plazo:</h3>

        <h4 class="text-md font-semibold mb-2">Cookies de sesión</h4>
        <p class="mb-6">
            Las cookies de sesión son aquellas que duran el tiempo que el usuario está navegando por la página web y se borran cuando acaba de hacerlo.
        </p>

        <h4 class="text-md font-semibold mb-2">Cookies persistentes</h4>
        <p class="mb-6">
            Estas cookies quedan almacenadas en el terminal del usuario durante un tiempo más largo, facilitando así el control de las preferencias elegidas sin tener que repetir ciertos parámetros cada vez que se visite el sitio web.
        </p>

        <h2 class="text-xl font-semibold mb-4">¿Cómo administrar las cookies?</h2>
        <p class="mb-6">
            Para cumplir con la legislación vigente, debemos pedirle permiso para gestionar cookies. Si continúa navegando por nuestro sitio web implica que acepta el uso.<br>
            Tenga en cuenta que si rechaza o borra las cookies de navegación, no podremos mantener sus preferencias, y es posible que algunas características de las páginas no estén operativas, y cada vez que navegue por nuestra web deberemos solicitar de nuevo su autorización para el uso de cookies.
        </p>

        <ul class="list-disc pl-6 mb-6">
            <li>Configuración de cookies de Internet Explorer</li>
            <li>Configuración de cookies de Firefox</li>
            <li>Configuración de cookies de Google Chrome</li>
            <li>Configuración de cookies de Safari</li>
        </ul>

        <p class="mb-6">
            Estos navegadores están sometidos a actualizaciones o modificaciones, por lo que no podemos garantizar que se ajusten completamente a la versión de su navegador. También puede ser que utilice otro navegador minoritario no contemplado en estos enlaces.
        </p>

        <div class="container mx-auto">
            {{-- <h1 class="text-2xl font-bold mb-4">Política de Cookies</h1> --}}
            <div id="cookies-info"
                class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <p>Cookies aceptadas</p>
            </div>
            <div id="cookies-banner" class="bg-white shadow-lg p-4 rounded mb-6">
                <p class="mb-4">
                    Este sitio utiliza cookies para mejorar la experiencia de usuario. Al aceptar, consiente el uso de
                    cookies según nuestra
                    <a href="#" class="text-blue-500 underline">Política de Cookies</a>.
                </p>
                <button id="accept-cookies" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Aceptar
                </button>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cookiesBanner = document.getElementById('cookies-banner');
                const cookiesInfo = document.getElementById('cookies-info');
                const acceptCookiesButton = document.getElementById('accept-cookies');

                // Mostrar el banner si las cookies no han sido aceptadas
                if (!localStorage.getItem('cookiesAccepted')) {
                    cookiesBanner.classList.remove('hidden');
                }

                // Lógica para aceptar cookies
                acceptCookiesButton.addEventListener('click', function() {
                    localStorage.setItem('cookiesAccepted', true);
                    cookiesBanner.classList.add('hidden');
                    cookiesInfo.classList.remove('hidden');
                });
            });
        </script>

    </div>




</x-layout>
