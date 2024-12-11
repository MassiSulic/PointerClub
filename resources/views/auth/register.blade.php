<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Identificación -->
        <div class="mt-4">
            <x-input-label for="identificacion" :value="__('Identificación')" />
            <x-text-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion')" required />
            <x-input-error :messages="$errors->get('identificacion')" class="mt-2" />
        </div>

        <!-- Número de Socio -->
        <div class="mt-4">
            <x-input-label for="numero_socio" :value="__('Número de Socio')" />
            <x-text-input id="numero_socio" class="block mt-1 w-full" type="text" name="numero_socio" :value="old('numero_socio')" />
            <x-input-error :messages="$errors->get('numero_socio')" class="mt-2" />
        </div>

        <!-- Dirección -->
        <div class="mt-4">
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Región -->
        <div class="mt-4">
            <x-input-label for="region" :value="__('Región')" />
            <x-text-input id="region" class="block mt-1 w-full" type="text" name="region" :value="old('region')" required />
            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

        <!-- País -->
        <div class="mt-4">
            <x-input-label for="pais" :value="__('País')" />
            <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais')" required />
            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
