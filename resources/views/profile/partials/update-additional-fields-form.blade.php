<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <h3 class="text-lg font-medium text-gray-900">
        {{ __('Datos del propietario') }}
    </h3>

    <form method="POST" action="{{ route('profile.update-additional-fields') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <!-- Identificación -->
        <div>
            <x-input-label for="identificacion" :value="__('Identificación')" />
            <x-text-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion', auth()->user()->identificacion)" required />
            <x-input-error :messages="$errors->get('identificacion')" class="mt-2" />
        </div>

        <!-- Número de Socio -->
        <div>
            <x-input-label for="numero_socio" :value="__('Número de socio')" />
            <x-text-input id="numero_socio" class="block mt-1 w-full" type="text" name="numero_socio" :value="old('numero_socio', auth()->user()->numero_socio)" />
            <x-input-error :messages="$errors->get('numero_socio')" class="mt-2" />
        </div>

        <!-- Dirección -->
        <div>
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion', auth()->user()->direccion)" required />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Región -->
        <div>
            <x-input-label for="region" :value="__('Región')" />
            <x-text-input id="region" class="block mt-1 w-full" type="text" name="region" :value="old('region', auth()->user()->region)" required />
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

        <!-- País -->
        <div>
            <x-input-label for="pais" :value="__('País')" />
            <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais', auth()->user()->pais)" required />
            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono', auth()->user()->telefono)" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Botón para guardar -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        </div>
    </form>
</div>
