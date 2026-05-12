<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Pagos
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro general de pagos realizados
                </p>
            </div>

            <a href="{{ route('pagos.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Pago
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Pagos
                        </h3>
                        <p class="text-sm text-gray-500">
                            Puedes buscar por ID pago o ID pagaré
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
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Pago</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Pagaré</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Usuario</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Monto Pago</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Fecha Pago</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Método Pago</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Referencia</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Estatus</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 font-semibold text-gray-600">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">$ ---</td>
                                <td class="px-4 py-4 text-gray-500 italic">--/--/----</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                                        PENDIENTE
                                    </span>
                                </td>

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
                                <td class="px-4 py-4 text-gray-500 italic">$ ---</td>
                                <td class="px-4 py-4 text-gray-500 italic">--/--/----</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>
                                <td class="px-4 py-4 text-gray-500 italic">---</td>

                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        PAGADO
                                    </span>
                                </td>

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