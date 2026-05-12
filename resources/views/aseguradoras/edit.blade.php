<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Aseguradora: {{ $aseguradora->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                
                <form action="{{ route('aseguradoras.update', $aseguradora->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label for="nombre" class="block text-xs font-bold text-gray-600 uppercase mb-2">Nombre de la Aseguradora</label>
                        <input type="text" name="nombre" id="nombre" 
                            value="{{ $aseguradora->nombre }}" 
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" 
                            required>
                        @error('nombre')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-4 mt-6">
                        <a href="{{ route('aseguradoras.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition">
                            Cancelar
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                            Actualizar Cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>