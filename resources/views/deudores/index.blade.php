<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Registro de Deudores
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Listado general de deudores registrados en el sistema
                </p>
            </div>

            <a href="{{ route('deudores.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Deudor
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
                            Tabla de Deudores
                        </h3>
                        <p class="text-sm text-gray-500">
                            Puedes buscar por nombre, CURP o correo
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
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Deudor</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nombres</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Apellido Paterno</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Apellido Materno</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Celular</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Teléfono Fijo</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Dirección</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">CURP</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Estatus</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach($deudores as $deudor)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-4 font-semibold text-gray-600">{{ $deudor->id }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->nombres }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->apellido_paterno }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->apellido_materno }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->celular }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->telefono_fijo }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->direccion_id }}</td>
                                    <td class="px-4 py-4 text-gray-700">{{ $deudor->email }}</td>
                                    <td class="px-4 py-4">
                                        <span class="px-3 py-1 rounded-md font-mono text-xs font-bold bg-blue-50 text-blue-600">
                                            {{ $deudor->curp ?? 'SIN CURP' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $deudor->estatus == 'Activo' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ $deudor->estatus ?? 'PENDIENTE' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex justify-center">
                                            <a href="{{ route('deudores.show', $deudor->id) }}" class="text-gray-400 hover:text-blue-600 mx-2">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('deudores.edit', $deudor->id) }}" class="text-gray-400 hover:text-gray-900 mx-2">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="{{ route('deudores.destroy', $deudor->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-600 mx-2" onclick="return confirm('¿Borrar deudor?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</x-app-layout>
