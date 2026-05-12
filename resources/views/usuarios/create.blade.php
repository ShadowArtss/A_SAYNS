<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nuevo Usuario
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro de usuario (solo frontend)
                </p>
            </div>

            <a href="{{ route('usuarios.index') }}"
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
                            Datos del Usuario
                        </h3>
                        <p class="text-sm text-gray-500">Campos para rellenar</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-bold text-xs">
                        PENDIENTE
                    </span>
                </div>

                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">ID Usuario</label>
                            <input type="text" placeholder="Ej: USR-001"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nombre Completo</label>
                            <input type="text" placeholder="Ej: Juan Pérez"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Email</label>
                            <input type="email" placeholder="Ej: usuario@gmail.com"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Teléfono</label>
                            <input type="text" placeholder="Ej: 5512345678"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Rol</label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option selected disabled>Selecciona rol</option>
                                <option>Administrador</option>
                                <option>Gestor</option>
                                <option>Supervisor</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Estatus</label>
                            <select class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option selected disabled>Selecciona estatus</option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <button type="button"
                                class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            <i class="fas fa-eye mr-2"></i> Ver
                        </button>

                        <button type="button"
                                class="px-6 py-2 rounded-xl bg-gray-900 text-white font-bold hover:bg-gray-800 transition">
                            <i class="fas fa-pen mr-2"></i> Editar
                        </button>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>