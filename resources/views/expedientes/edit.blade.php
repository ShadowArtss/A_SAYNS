<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Expediente #{{ $expediente->id }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Actualización de documentación y archivos
                </p>
            </div>

            <a href="{{ route('expedientes.index') }}"
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
                        <p class="text-sm text-gray-500">Si subes un nuevo PDF, el anterior se eliminará automáticamente</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">
                        EDITANDO
                    </span>
                </div>

                <form action="{{ route('expedientes.update', $expediente->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">ID del Registro</label>
                            <input type="text" value="{{ $expediente->id }}" disabled
                                   class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Reemplazar PDF (Opcional)</label>
                            <input type="file" name="ruta_documentos" accept=".pdf"
                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg">
                            <p class="text-xs text-gray-400 mt-1 italic">Dejar vacío para conservar el archivo actual.</p>
                        </div>

                        <div class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <input type="checkbox" name="contrato" id="contrato" value="1" 
                                   {{ $expediente->contrato ? 'checked' : '' }}
                                   class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="contrato" class="ml-3 block text-sm font-bold text-gray-700 uppercase cursor-pointer">
                                ¿Incluye Contrato firmado?
                            </label>
                        </div>

                        <div class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                            <input type="checkbox" name="ine" id="ine" value="1" 
                                   {{ $expediente->ine ? 'checked' : '' }}
                                   class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="ine" class="ml-3 block text-sm font-bold text-gray-700 uppercase cursor-pointer">
                                ¿Incluye Copia de INE?
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('expedientes.index') }}" 
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                            <i class="fas fa-sync-alt mr-2"></i> Actualizar Expediente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>