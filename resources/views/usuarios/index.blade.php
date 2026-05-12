<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Usuarios del Sistema
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Gestión de accesos y cuentas
                </p>
            </div>

            <a href="{{ route('usuarios.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-user-plus mr-2"></i> Nuevo Usuario
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">
                
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Directorio
                        </h3>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nombre</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Correo (Login)</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Fecha Registro</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse($usuarios as $usuario)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-4 font-semibold text-gray-600 text-sm">
                                        {{ $usuario->id }}
                                    </td>
                                    <td class="px-4 py-4 text-gray-700 text-sm font-medium">
                                        {{ $usuario->name }}
                                        @if($usuario->id == 1)
                                            <span class="ml-2 px-2 py-0.5 rounded text-[10px] font-bold bg-purple-100 text-purple-700">ADMIN</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-blue-600 text-sm">
                                        {{ $usuario->email }}
                                    </td>
                                    
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" 
                                               class="text-gray-400 hover:text-gray-900 transition" title="Editar">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            
                                            @if($usuario->id != 1)
                                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-gray-400 hover:text-red-600 transition" 
                                                            onclick="return confirm('¿Seguro que deseas eliminar el acceso de este usuario?')" 
                                                            title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500 italic">
                                        No hay usuarios registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>