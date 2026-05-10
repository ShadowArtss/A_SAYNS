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

                <!-- Buscador -->
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Direcciones
                        </h3>
                        <p class="text-sm text-gray-500">
                            Puedes buscar por calle, colonia o código postal
                        </p>
                    </div>

                    <div class="w-full md:w-96">
                        <input type="text"
                               placeholder="Buscar..."
                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Tabla -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Dirección</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Calle</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. Int</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">No. Ext</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Colonia</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Lote</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">CP</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Referencias</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 font-semibold text-gray-600">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>

                                <td class="px-4 py-4 text-center">
                                    <button class="text-gray-400 hover:text-blue-600 mx-2" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-gray-900 mx-2" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 mx-2" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 font-semibold text-gray-600">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>

                                <td class="px-4 py-4 text-center">
                                    <button class="text-gray-400 hover:text-blue-600 mx-2" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-gray-900 mx-2" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 mx-2" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>