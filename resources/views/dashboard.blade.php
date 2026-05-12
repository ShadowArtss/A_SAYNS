<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Panel principal de control del sistema de cobranza
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Cards estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                <!-- Deudores -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Deudores Totales
                            </p>
                            <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                                0
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                registrados
                            </p>
                        </div>

                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Pagos pendientes -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Pagos Pendientes
                            </p>
                            <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                                0
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                por confirmar
                            </p>
                        </div>

                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-yellow-100 text-yellow-700">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Pagarés -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Pagarés Activos
                            </p>
                            <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                                0
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                en proceso
                            </p>
                        </div>

                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-100 text-green-700">
                            <i class="fas fa-file-invoice-dollar text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Aseguradoras -->
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">
                                Aseguradoras
                            </p>
                            <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                                0
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                registradas
                            </p>
                        </div>

                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-purple-100 text-purple-700">
                            <i class="fas fa-building text-xl"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Accesos rápidos -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-8">

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Accesos Rápidos
                        </h3>
                        <p class="text-sm text-gray-500">
                            Navega rápidamente entre los módulos del sistema
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                    <!-- Deudores -->
                    <a href="{{ route('deudores.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Deudores</h4>
                                <p class="text-sm text-gray-500">Tabla y registro</p>
                            </div>
                        </div>
                    </a>

                    <!-- Direcciones -->
                    <a href="{{ route('direcciones.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Direcciones</h4>
                                <p class="text-sm text-gray-500">Control de domicilios</p>
                            </div>
                        </div>
                    </a>

                    <!-- Expedientes -->
                    <a href="{{ route('expedientes.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-folder-open text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Expedientes</h4>
                                <p class="text-sm text-gray-500">Documentos y contratos</p>
                            </div>
                        </div>
                    </a>

                    <!-- Seguimientos -->
                    <a href="{{ route('seguimientos.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-calendar-check text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Seguimientos</h4>
                                <p class="text-sm text-gray-500">Fechas y control</p>
                            </div>
                        </div>
                    </a>

                    <!-- Aseguradoras -->
                    <a href="{{ route('aseguradoras.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-building text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Aseguradoras</h4>
                                <p class="text-sm text-gray-500">Registro de aseguradoras</p>
                            </div>
                        </div>
                    </a>

                    <!-- Pagarés -->
                    <a href="{{ route('pagares.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-file-invoice-dollar text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Pagarés</h4>
                                <p class="text-sm text-gray-500">Control de montos</p>
                            </div>
                        </div>
                    </a>

                    <!-- Pagos -->
                    <a href="{{ route('pagos.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-credit-card text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Pagos</h4>
                                <p class="text-sm text-gray-500">Registro de pagos</p>
                            </div>
                        </div>
                    </a>

                    <!-- Usuarios -->
                    <a href="{{ route('usuarios.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-user-shield text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Usuarios</h4>
                                <p class="text-sm text-gray-500">Administración</p>
                            </div>
                        </div>
                    </a>

                    <!-- Roles -->
                    <a href="{{ route('roles.index') }}"
                       class="p-6 rounded-xl border border-gray-200 bg-gray-50 hover:bg-blue-50 hover:border-blue-300 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-user-tag text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-extrabold text-gray-800">Roles</h4>
                                <p class="text-sm text-gray-500">Permisos del sistema</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>