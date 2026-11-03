<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Teléfono (opcional) -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Teléfono (opcional)')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="Ej: 1122334455" />
            <p class="mt-1 text-xs text-gray-500">
                {{ __('El prefijo de país se añade automáticamente al abrir WhatsApp.') }}
            </p>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Red profesional (opcional) -->
        <div class="mt-4">
            <x-input-label for="professional_url" :value="__('LinkedIn / GitHub (opcional)')" />
            <x-text-input id="professional_url" class="block mt-1 w-full" type="url" name="professional_url" :value="old('professional_url')" placeholder="https://linkedin.com/in/tu-perfil" />
            <x-input-error :messages="$errors->get('professional_url')" class="mt-2" />
        </div>

        <!-- Foto de perfil (obligatoria) -->
        <div class="mt-4">
            <x-input-label for="photo" :value="__('Foto de perfil (obligatoria)')" />
            <input id="photo" type="file" name="photo" accept="image/*" required
                   class="block mt-1 w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
            <p class="mt-1 text-xs text-gray-500">
                {{ __('Máximo 2 MB. Formatos: JPG, PNG o WebP.') }}
            </p>
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya tienes cuenta?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>