<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nuevo Pagaré
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro de pagaré y captura de expediente físico
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
                            Datos del Pagaré
                        </h3>
                        <p class="text-sm text-gray-500">Completa los campos para generar el registro</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">
                        NUEVO REGISTRO
                    </span>
                </div>

                <!-- Mostrar errores de validación -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- El formulario con enctype para soportar archivos -->
                <form action="{{ route('pagares.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Relaciones -->
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Deudor</label>
                            <select name="deudor_id" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="" selected disabled>Seleccione un deudor...</option>
                                @foreach($deudores as $deudor)
                                    <option value="{{ $deudor->id }}">{{ $deudor->nombres }} {{ $deudor->apellido_p }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Aseguradora</label>
                            <select name="aseguradora_id" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="" selected disabled>Seleccione una aseguradora...</option>
                                @foreach($aseguradoras as $aseguradora)
                                    <option value="{{ $aseguradora->id }}">{{ $aseguradora->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">ID Seguimiento</label>
                            <select name="seguimiento_id" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="" selected disabled>Seleccione un seguimiento...</option>
                                @foreach($seguimientos as $seguimiento)
                                    <option value="{{ $seguimiento->id }}">Seguimiento #{{ $seguimiento->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Estatus</label>
                            <select name="estatus" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="Pendiente" selected>Pendiente</option>
                                <option value="Activo">Activo</option>
                            </select>
                        </div>

                        <!-- Sección de Expediente (Documentos) -->
                        <div class="md:col-span-2 border-t border-gray-200 mt-2 pt-4">
                            <h4 class="text-sm font-bold text-gray-700 uppercase mb-4">Expediente Físico</h4>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Subir Pagaré (PDF/Img)</label>
                            <input type="file" name="documento_pagare" accept=".pdf, .jpg, .jpeg, .png" required
                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-2">¿Entregó Contrato?</label>
                                <select name="tiene_contrato" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-2">¿Entregó INE?</label>
                                <select name="tiene_ine" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Sección de Montos y Fechas -->
                        <div class="md:col-span-2 border-t border-gray-200 mt-2 pt-4">
                            <h4 class="text-sm font-bold text-gray-700 uppercase mb-4">Finanzas y Fechas</h4>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Monto Original (MXN)</label>
                            <input type="number" step="0.01" name="monto_original" id="monto_original" placeholder="Ej: 15000" required
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Monto Pagado Inicial (MXN)</label>
                            <input type="number" step="0.01" name="monto_pagado" id="monto_pagado" value="0" placeholder="Ej: 2000"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Saldo Pendiente</label>
                            <!-- readonly para que el usuario no lo modifique a mano, solo por JS -->
                            <input type="number" id="saldo_visual" readonly placeholder="0.00"
                                   class="w-full rounded-lg border-gray-200 bg-gray-100 text-gray-600 font-bold focus:ring-0">
                        </div>

                        <div>
                            <!-- Espacio vacío para cuadrar el grid -->
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Fecha Préstamo</label>
                            <input type="date" name="fecha_prestamo" required
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Fecha Registro</label>
                            <input type="date" name="fecha_registro" required value="{{ date('Y-m-d') }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('pagares.index') }}"
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar Pagaré
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <!-- Script para calcular el saldo en tiempo real -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputOriginal = document.getElementById('monto_original');
            const inputPagado = document.getElementById('monto_pagado');
            const saldoVisual = document.getElementById('saldo_visual');

            function calcularSaldo() {
                let original = parseFloat(inputOriginal.value) || 0;
                let pagado = parseFloat(inputPagado.value) || 0;
                let saldo = original - pagado;
                
                // Evitamos saldos negativos visualmente si el pago es mayor
                saldoVisual.value = saldo >= 0 ? saldo.toFixed(2) : 0.00;
            }

            inputOriginal.addEventListener('input', calcularSaldo);
            inputPagado.addEventListener('input', calcularSaldo);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>