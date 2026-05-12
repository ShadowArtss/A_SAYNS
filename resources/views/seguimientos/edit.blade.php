<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Seguimiento #{{ $seguimiento->id }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Actualiza las fechas del proceso
                </p>
            </div>

            <a href="{{ route('seguimientos.index') }}"
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
                            Modificar Datos
                        </h3>
                        <p class="text-sm text-gray-500">Cambia la información necesaria y guarda los cambios</p>
                    </div>
                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">
                        EN PROCESO
                    </span>
                </div>

                <!-- Formulario de Actualización -->
                <form action="{{ route('seguimientos.update', $seguimiento->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Fecha Notificación</label>
                            <input type="date" name="fecha_notificacion"
                                   value="{{ old('fecha_notificacion', $seguimiento->fecha_notificacion) }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            @error('fecha_notificacion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Fecha Embargo</label>
                            <input type="date" name="fecha_embargo"
                                   value="{{ old('fecha_embargo', $seguimiento->fecha_embargo) }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            @error('fecha_embargo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Fecha Cierre</label>
                            <input type="date" name="fecha_cierre"
                                   value="{{ old('fecha_cierre', $seguimiento->fecha_cierre) }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            @error('fecha_cierre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('seguimientos.index') }}"
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-green-600 text-white font-bold hover:bg-green-700 transition shadow-lg">
                            <i class="fas fa-sync-alt mr-2"></i> Actualizar Seguimiento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>
