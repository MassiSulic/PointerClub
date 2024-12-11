<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-bold text-center mb-6">
        {{ isset($propietario) ? 'Editar Propietario' : 'Registrar Propietario' }}
    </h1>
    <form action="{{ isset($propietario) ? route('propietarios.update', $propietario) : route('propietarios.store') }}" method="POST">
        @csrf
        @if(isset($propietario))
            @method('PUT')
        @endif

        <!-- Identificación -->
        <div class="mb-4">
            <label for="identificacion" class="block text-gray-700 font-medium">Identificación</label>
            <input type="text" id="identificacion" name="identificacion" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300" maxlength="12" value="{{ $propietario->identificacion ?? old('identificacion') }}" required>
        </div>

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300" maxlength="50" value="{{ $propietario->nombre ?? old('nombre') }}" required>
        </div>

        <!-- Apellido -->
        <div class="mb-4">
            <label for="apellido" class="block text-gray-700 font-medium">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300" maxlength="50" value="{{ $propietario->apellido ?? old('apellido') }}" required>
        </div>

        <!-- Más campos... -->
        <!-- Reutiliza los demás campos como en el ejemplo anterior -->

        <!-- Botón de enviar -->
        <div class="text-center">
            <button type="submit" class="bg-indigo-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300">
                {{ isset($propietario) ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
</div>
