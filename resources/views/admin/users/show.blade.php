<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center gap-6 mb-6">
                    @if ($user->photo_url)
                        <img src="{{ $user->photo_url }}" alt="Foto"
                             class="h-28 w-28 rounded-full object-cover ring-4 ring-indigo-100" />
                    @else
                        <div class="h-28 w-28 rounded-full bg-indigo-100 flex items-center justify-center text-3xl font-bold text-indigo-600">
                            {{ Str::of($user->name)->substr(0, 1)->upper() }}
                        </div>
                    @endif
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        @if ($user->is_admin)
                            <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded bg-amber-100 text-amber-800">
                                Docente / Administrador
                            </span>
                        @else
                            <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded bg-emerald-100 text-emerald-800">
                                Alumno
                            </span>
                        @endif
                    </div>
                </div>

                <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                        <dd class="mt-1 text-gray-900">
                            @if ($user->whatsapp_url)
                                <a href="{{ $user->whatsapp_url }}" target="_blank" rel="noopener noreferrer"
                                   class="text-emerald-600 hover:text-emerald-700 underline">
                                    {{ $user->phone }} (WhatsApp)
                                </a>
                            @else
                                <span class="text-gray-400">No informado</span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Red profesional</dt>
                        <dd class="mt-1 text-gray-900">
                            @if ($user->professional_url)
                                <a href="{{ $user->professional_url }}" target="_blank" rel="noopener noreferrer"
                                   class="text-indigo-600 hover:text-indigo-700 underline">
                                    {{ $user->professional_url }}
                                </a>
                            @else
                                <span class="text-gray-400">No informado</span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Registrado</dt>
                        <dd class="mt-1 text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                </dl>

                <div class="mt-6">
                    <a href="{{ route('admin.users.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300">
                        ← Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>