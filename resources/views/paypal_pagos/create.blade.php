<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo Pago PayPal
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Registro manual de una transacción PayPal
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 shadow-sm rounded-xl overflow-hidden">

                <!-- Header -->
                <div class="p-6 bg-gray-900 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-white tracking-wide">
                            Formulario de Pago PayPal
                        </h3>
                        <p class="text-sm text-gray-300 mt-1">
                            Captura la información de la transacción
                        </p>
                    </div>

                    <a href="{{ route('paypal_pagos.index') }}"
                       class="px-4 py-2 rounded-lg bg-gray-700 text-white font-semibold hover:bg-gray-600 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Volver
                    </a>
                </div>

                <!-- Formulario -->
                <div class="p-8 bg-white">
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                ID Pago
                            </label>
                            <input type="text"
                                   placeholder="Ej: 1"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Referencia PayPal
                            </label>
                            <input type="text"
                                   placeholder="Ej: PAY-12345"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Email PayPal
                            </label>
                            <input type="email"
                                   placeholder="Ej: cliente@gmail.com"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Monto Pagado
                            </label>
                            <input type="number"
                                   step="0.01"
                                   placeholder="Ej: 1500.00"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Fecha de Pago
                            </label>
                            <input type="date"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Método de Pago
                            </label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                <option>PayPal</option>
                                <option>Tarjeta</option>
                                <option>Transferencia</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                Estatus
                            </label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                <option>COMPLETADO</option>
                                <option>PENDIENTE</option>
                                <option>RECHAZADO</option>
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="md:col-span-2 flex justify-end gap-4 mt-6">
                            <button type="reset"
                                    class="px-6 py-2 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">
                                Limpiar
                            </button>

                            <button type="button"
                                    class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                                Guardar Pago
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>