<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nuevo Rol
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro de rol (solo frontend)
                </p>
            </div>

            <a href="{{ route('roles.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition">
                <i class="fas fa-arrow-left mr-2"></i> Volver
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-xl p-8 border border-gray-200">

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Datos del Rol
                        </h3>
                        <p class="text-sm text-gray-500">Campos para rellenar</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-bold text-xs">
                        PENDIENTE
                    </span>
                </div>

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf <!-- ¡No olvides esto! Es el pase de seguridad de Laravel -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- ID Rol (Ojo: Si tu ID es autoincremental en la DB, puedes dejarlo como readonly o quitarlo) -->
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">ID Rol</label>
                            <input type="text" placeholder="Autogenerado" disabled
                                class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-400 cursor-not-allowed">
                        </div>

                        <!-- Nombre del Rol -->
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nombre del Rol</label>
                            <!-- El name="rol" es vital porque así lo definimos en el Modelo y Tinker -->
                            <input type="text" name="rol" placeholder="Ej: Administrador" required
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('rol') border-red-500 @enderror">
                            @error('rol')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <!-- El botón Guardar ahora es el único que hace el 'submit' -->
                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar Rol
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>
