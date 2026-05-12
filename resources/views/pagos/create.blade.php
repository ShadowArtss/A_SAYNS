<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nuevo Pago
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro de abono a pagaré
                </p>
            </div>

            <a href="{{ route('pagos.index') }}"
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
                            Datos del Abono
                        </h3>
                        <p class="text-sm text-gray-500">El sistema generará la fecha y la referencia automáticamente</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">
                        NUEVO INGRESO
                    </span>
                </div>

                <form action="{{ route('pagos.store') }}" method="POST">
                    @csrf 

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Seleccionar Pagaré</label>
                            <select name="id_pagare" required
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="" selected disabled>Elige un pagaré con saldo pendiente...</option>
                                @foreach($pagares as $pagare)
                                    <option value="{{ $pagare->id }}">
                                        Pagaré #{{ $pagare->id }} - {{ $pagare->deudor->nombre ?? 'Deudor Desconocido' }} (Saldo: ${{ number_format($pagare->saldo_pendiente, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Monto a Pagar (MXN)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500 font-bold">$</span>
                                <input type="number" step="0.01" name="monto_pago" id="monto_pago" required placeholder="Ej: 2000.00"
                                       class="w-full pl-8 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Método de Pago</label>
                            <select name="metodo_pago" id="metodo_pago" required
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="" selected disabled>Selecciona método</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="PayPal">PayPal (Generar QR)</option>
                            </select>
                        </div>

                    </div>

                    <div id="qr_container" class="hidden mt-8 p-6 bg-blue-50 border border-blue-200 rounded-xl text-center">
                        <h4 class="text-blue-800 font-bold mb-2"><i class="fab fa-paypal mr-2"></i>Cobro con PayPal</h4>
                        <p class="text-sm text-blue-600 mb-4">Escanea este código desde la app para completar el pago.</p>
                        <div class="flex justify-center">
                            <img id="qr_image" src="" alt="Código QR de PayPal" class="border border-gray-300 rounded shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('pagos.index') }}" 
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                            <i class="fas fa-save mr-2"></i> Registrar Pago
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectMetodo = document.getElementById('metodo_pago');
            const inputMonto = document.getElementById('monto_pago');
            const qrContainer = document.getElementById('qr_container');
            const qrImage = document.getElementById('qr_image');

            function actualizarQR() {
                const metodo = selectMetodo.value;
                const monto = inputMonto.value;

                if (metodo === 'PayPal' && monto > 0) {
                    // Genera un QR dinámico usando una API gratuita
                    const textoQR = encodeURIComponent(`Pago a Sistema de Deudores. Monto: $${monto} MXN`);
                    qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${textoQR}`;
                    qrContainer.classList.remove('hidden');
                } else {
                    qrContainer.classList.add('hidden');
                }
            }

            selectMetodo.addEventListener('change', actualizarQR);
            inputMonto.addEventListener('input', actualizarQR);
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>