<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Expedientes
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Control y consulta de expedientes registrados
                </p>
            </div>

            <a href="{{ route('expedientes.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Expediente
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Expedientes
                        </h3>
                        <p class="text-sm text-gray-500">
                            Puedes buscar por ID o contrato
                        </p>
                    </div>

                    <div class="w-full md:w-96">
                        <input type="text"
                               placeholder="Buscar..."
                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Expediente</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Contrato</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">INE</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Ruta Documentos</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
    @forelse ($expedientes as $expediente)
        <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-4 font-semibold text-gray-600 text-sm">{{ $expediente->id }}</td>
            <td class="px-4 py-4 text-sm">{{ $expediente->contrato ? 'SÍ' : 'NO' }}</td>
            <td class="px-4 py-4 text-sm">{{ $expediente->ine ? 'SÍ' : 'NO' }}</td>
            <td class="px-4 py-4 text-sm">
                <a href="{{ asset('storage/' . $expediente->ruta_documentos) }}" target="_blank" class="text-blue-600">Ver PDF</a>
            </td>
            <td class="px-4 py-4 text-center">
                <a href="{{ route('expedientes.edit', $expediente->id) }}" class="mx-2"><i class="fas fa-pen"></i></a>
                <form action="{{ route('expedientes.destroy', $expediente->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-gray-500 italic">
                No hay expedientes registrados aún.
            </td>
        </tr>
    @endforelse
</tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>