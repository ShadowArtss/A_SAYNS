<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Editar Rol: {{ $role->rol }}</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('roles.update', $role->id) }}" method="POST" class="bg-white p-8 rounded-xl shadow border">
                @csrf @method('PUT')
                <div class="mb-6">
                    <label class="block text-xs font-bold uppercase mb-2">Nombre del Rol</label>
                    <input type="text" name="rol" value="{{ old('rol', $role->rol) }}" required class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500">
                    @error('rol') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="flex items-center justify-end gap-4 mt-8">
                    <!-- Botón Cancelar -->
                    <a href="{{ route('roles.index') }}"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all">
                        Cancelar
                    </a>

                    <!-- Botón Actualizar (Corregido) -->
                    <button type="submit"
                            class="px-6 py-2.5 bg-green-600 text-gray-700 font-bold rounded-xl shadow-md hover:bg-green-700 active:transform active:scale-95 transition-all flex items-center">
                        <i class="fas fa-sync-alt mr-2"></i>
                        <span>Actualizar Rol</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
