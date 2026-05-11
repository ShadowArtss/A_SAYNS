<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pagos PayPal
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Registro de pagos realizados mediante PayPal
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden">

                <!-- Encabezado -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-6 bg-gray-900">
                    <div>
                        <h3 class="text-lg font-bold text-white tracking-wide">
                            Listado de Pagos PayPal
                        </h3>
                        <p class="text-sm text-gray-300 mt-1">
                            Consulta y control de transacciones PayPal
                        </p>
                    </div>

                    <a href="{{ route('paypal_pagos.create') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                        <i class="fas fa-plus-circle mr-2"></i> Nuevo Pago
                    </a>
                </div>

                <!-- Buscador -->
                <div class="p-6 border-b border-gray-200 bg-gray-50">
                    <div class="flex flex-col md:flex-row gap-4 md:items-center md:justify-between">
                        <div class="w-full md:w-1/2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Buscar
                            </label>
                            <input type="text"
                                   placeholder="Buscar por referencia, email o estatus..."
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>

                        <div class="w-full md:w-1/4">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Filtrar Estatus
                            </label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                <option>Todos</option>
                                <option>COMPLETADO</option>
                                <option>PENDIENTE</option>
                                <option>RECHAZADO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tabla -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-bold">
                            <tr>
                                <th class="px-6 py-4">ID Pago</th>
                                <th class="px-6 py-4">Referencia</th>
                                <th class="px-6 py-4">Email PayPal</th>
                                <th class="px-6 py-4">Monto</th>
                                <th class="px-6 py-4">Fecha</th>
                                <th class="px-6 py-4">Método</th>
                                <th class="px-6 py-4">Estatus</th>
                                <th class="px-6 py-4 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-semibold text-gray-800">1</td>
                                <td class="px-6 py-4 text-blue-600 font-mono font-bold">PAY-98342</td>
                                <td class="px-6 py-4 text-gray-700">cliente@gmail.com</td>
                                <td class="px-6 py-4 font-bold text-gray-800">$1,500.00</td>
                                <td class="px-6 py-4 text-gray-600">2026-05-10</td>
                                <td class="px-6 py-4 text-gray-700">PayPal</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        COMPLETADO
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-gray-500 hover:text-blue-600 mx-2" title="Editar">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="text-gray-500 hover:text-red-600 mx-2" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-semibold text-gray-800">2</td>
                                <td class="px-6 py-4 text-blue-600 font-mono font-bold">PAY-12001</td>
                                <td class="px-6 py-4 text-gray-700">usuario@hotmail.com</td>
                                <td class="px-6 py-4 font-bold text-gray-800">$800.00</td>
                                <td class="px-6 py-4 text-gray-600">2026-05-09</td>
                                <td class="px-6 py-4 text-gray-700">PayPal</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                                        PENDIENTE
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-gray-500 hover:text-blue-600 mx-2" title="Editar">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="text-gray-500 hover:text-red-600 mx-2" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </a>
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