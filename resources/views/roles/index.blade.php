<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Roles
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Control de roles y permisos del sistema
                </p>
            </div>

            <a href="{{ route('roles.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Rol
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Roles
                        </h3>
                        <p class="text-sm text-gray-500">
                            Puedes buscar por nombre del rol
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
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Rol</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nombre</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($roles as $rol)
                            <tr class="hover:bg-gray-50 transition">
                                <!-- ID del Rol -->
                                <td class="px-4 py-4 font-semibold text-gray-600">
                                    {{ $rol->id }}
                                </td>

                                <!-- Nombre (Recuerda que en tu DB la columna se llama 'rol') -->
                                <td class="px-4 py-4 text-gray-700 font-medium">
                                    {{ $rol->rol }}
                                </td>

                                <!-- Acciones -->
                                <td class="px-4 py-4 text-center">

                                    <a href="{{ route('roles.edit', $rol->id) }}" class="text-gray-400 hover:text-gray-900 mx-2" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <!-- Botón Eliminar con formulario para que funcione el Resource -->
                                    <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600 mx-2" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este rol?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if($roles->isEmpty())
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                    No hay roles registrados actualmente.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>
