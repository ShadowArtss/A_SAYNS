<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Pagaré #{{ $pagare->id }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Actualización de montos, relaciones y estatus
                </p>
            </div>

            <a href="{{ route('pagares.index') }}"
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
                            Detalles del Pagaré
                        </h3>
                        <p class="text-sm text-gray-500">Modifica los datos necesarios</p>
                    </div>
                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">
                        EDITANDO
                    </span>
                </div>

                <form action="{{ route('pagares.update', $pagare->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Deudor Asignado</label>
                            <select name="id_deudor" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecciona un deudor...</option>
                                @foreach($deudores as $deudor)
                                    <option value="{{ $deudor->id }}" {{ $pagare->id_deudor == $deudor->id ? 'selected' : '' }}>
                                        {{ $deudor->nombre }} {{ $deudor->apellido_p }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Aseguradora</label>
                            <select name="id_aseguradora" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Selecciona aseguradora...</option>
                                @foreach($aseguradoras as $aseguradora)
                                    <option value="{{ $aseguradora->id }}" {{ $pagare->id_aseguradora == $aseguradora->id ? 'selected' : '' }}>
                                        {{ $aseguradora->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Monto Original ($)</label>
                            <input type="number" step="0.01" name="monto_original" value="{{ $pagare->monto_original }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Saldo Actual ($)</label>
                            <input type="number" step="0.01" name="saldo_pendiente" value="{{ $pagare->saldo_pendiente }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Estatus</label>
                            <select name="estatus" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="PENDIENTE" {{ $pagare->estatus == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
                                <option value="PAGADO" {{ $pagare->estatus == 'PAGADO' ? 'selected' : '' }}>PAGADO</option>
                            </select>
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('pagares.index') }}" 
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                            <i class="fas fa-sync-alt mr-2"></i> Actualizar Pagaré
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>