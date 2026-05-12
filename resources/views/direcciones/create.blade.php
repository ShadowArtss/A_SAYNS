<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nueva Dirección
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro de dirección en el sistema
                </p>
            </div>

            <a href="{{ route('direcciones.index') }}"
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
                            Datos de Dirección
                        </h3>
                        <p class="text-sm text-gray-500">Campos para rellenar</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">
                        NUEVO REGISTRO
                    </span>
                </div>

                <form action="{{ route('direcciones.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">ID Dirección</label>
                            <input type="text" placeholder="Autogenerado" disabled
                                   class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-400">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Calle</label>
                            <input type="text" name="calle" value="{{ old('calle') }}" placeholder="Ej: Av. Reforma" required
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            @error('calle') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">No. Interior</label>
                            <input type="text" name="numero_interior" value="{{ old('numero_interior') }}" placeholder="Ej: 12B"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">No. Exterior</label>
                            <input type="text" name="numero_exterior" value="{{ old('numero_exterior') }}" placeholder="Ej: 35" required
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            @error('numero_exterior') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Colonia</label>
                            <input type="text" name="colonia" value="{{ old('colonia') }}" placeholder="Ej: Centro" required
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Lote</label>
                            <input type="text" name="lote" value="{{ old('lote') }}" placeholder="Ej: Lote 5"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Código Postal</label>
                            <input type="text" name="CP" value="{{ old('CP') }}" placeholder="Ej: 56600" required
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            @error('CP') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Referencias</label>
                            <input type="text" name="referencias" value="{{ old('referencias') }}" placeholder="Ej: Cerca del parque"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('direcciones.index') }}"
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition text-center">
                           Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>
