<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Direcciones
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro general de direcciones en el sistema
                </p>
            </div>

            <a href="{{ route('direcciones.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nueva Dirección
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('warning'))
                    <div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded shadow-sm flex items-center">
                        <i class="fas fa-exclamation-triangle mr-3"></i>
                        {{ session('warning') }}
                    </div>
                @endif

                @if(session('danger'))
                    <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded shadow-sm flex items-center">
                        <i class="fas fa-times-circle mr-3"></i>
                        {{ session('danger') }}
                    </div>
                @endif

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Direcciones
                        </h3>
                        <p class="text-sm text-gray-500">
                            Filtros activos para búsqueda rápida
                        </p>
                    </div>

                    <div class="w-full md:w-96 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" placeholder="Buscar dirección..."
                               class="w-full pl-10 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Calle</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. Int</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. Ext</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Colonia</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">CP</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Referencias</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($direcciones as $direccion)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 font-semibold text-gray-600">{{ $direccion->id }}</td>
                                <td class="px-4 py-4 text-gray-700 font-medium">{{ $direccion->calle }}</td>

                                <td class="px-4 py-4 text-gray-600">{{ $direccion->numero_interior ?: 'N/A' }}</td>
                                <td class="px-4 py-4 text-gray-800 font-bold">{{ $direccion->numero_exterior }}</td>
                                <td class="px-4 py-4 text-gray-600">{{ $direccion->colonia }}</td>
                                <td class="px-4 py-4 text-gray-600">{{ $direccion->CP }}</td>

                                <td class="px-4 py-4 text-gray-500 italic text-sm">
                                    {{ Str::limit($direccion->referencias, 30) ?: 'Sin referencias' }}
                                </td>

                                <td class="px-4 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">

                                        <a href="{{ route('direcciones.edit', $direccion->id) }}"
                                           class="p-2 rounded-full bg-yellow-50 text-yellow-600 hover:bg-yellow-500 hover:text-white transition shadow-sm"
                                           title="Editar">
                                            <i class="fas fa-pen text-sm"></i>
                                        </a>

                                        <form action="{{ route('direcciones.destroy', $direccion->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('¿Seguro que deseas eliminar esta dirección?')"
                                                    class="p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition shadow-sm"
                                                    title="Eliminar">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @if($direcciones->isEmpty())
                    <div class="text-center py-10">
                        <p class="text-gray-500">No hay direcciones registradas aún.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>
