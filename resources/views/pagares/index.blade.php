<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Pagarés
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Control y consulta de pagarés registrados
                </p>
            </div>

            <a href="{{ route('pagares.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Pagaré
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Pagarés
                        </h3>
                        <p class="text-sm text-gray-500">
                            Mostrando {{ $pagares->count() }} registros
                        </p>
                    </div>

                    <div class="w-full md:w-96">
                        <input type="text" placeholder="Buscar..." class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Deudor</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Aseguradora</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Monto Original</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Saldo Actual</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Registro</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Estatus</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse($pagares as $pagare)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-4 font-semibold text-gray-600 text-sm">
                                        {{ $pagare->id }}
                                    </td>
                                    
                                    <td class="px-4 py-4 text-gray-700 text-sm">
                                        {{ $pagare->deudor->nombre ?? 'N/A' }}
                                    </td>
                                    
                                    <td class="px-4 py-4 text-gray-600 text-sm">
                                        {{ $pagare->aseguradora->nombre ?? 'N/A' }}
                                    </td>
                                    
                                    <td class="px-4 py-4 text-gray-700 font-medium text-sm">
                                        ${{ number_format($pagare->monto_original, 2) }}
                                    </td>
                                    
                                    <td class="px-4 py-4 text-blue-600 font-bold text-sm">
                                        ${{ number_format($pagare->saldo_pendiente, 2) }}
                                    </td>
                                    
                                    <td class="px-4 py-4 text-gray-500 text-sm">
                                        {{ $pagare->fecha_registro }}
                                    </td>
                                    
                                    <td class="px-4 py-4">
                                        @php
                                            $color = $pagare->estatus == 'PAGADO' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $color }}">
                                            {{ $pagare->estatus }}
                                        </span>
                                    </td>
                                    
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('pagares.edit', $pagare->id) }}" 
                                            class="text-gray-400 hover:text-gray-900 transition" title="Editar">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            
                                            <form action="{{ route('pagares.destroy', $pagare->id) }}" method="POST" class="inline">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-gray-400 hover:text-red-600 transition" 
                                                        onclick="return confirm('¿Seguro que deseas eliminar este pagaré?')" 
                                                        title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-8 text-center text-gray-500 italic">
                                        No hay pagarés registrados todavía.
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
