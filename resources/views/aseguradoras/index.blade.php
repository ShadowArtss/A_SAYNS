<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Aseguradoras
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro general de aseguradoras
                </p>
            </div>

            <a href="{{ route('aseguradoras.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus-circle mr-2"></i> Nueva Aseguradora
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-xl p-6 border border-gray-200">

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wide">
                            Tabla de Aseguradoras
                        </h3>
                        <p class="text-sm text-gray-500">
                            Puedes buscar por nombre
                        </p>
                    </div>

                    <div class="w-full md:w-96">
                        <input type="text"
                               placeholder="Buscar..."
                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('info'))
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4 rounded shadow-sm">
                    {{ session('info') }}
                </div>
            @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">ID Aseguradora</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nombre</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($aseguradoras as $aseguradora)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-4 font-semibold text-gray-600">
                                        {{ $aseguradora->id }}
                                    </td>
                                    <td class="px-4 py-4 text-gray-700">
                                        {{ $aseguradora->nombre }}
                                    </td>

                                    <td class="px-4 py-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            

                                            <a href="{{ route('aseguradoras.edit', $aseguradora->id) }}" 
                                            class="text-gray-400 hover:text-yellow-600 transition" title="Editar">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <form action="{{ route('aseguradoras.destroy', $aseguradora->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE') 
                                                <button type="submit" 
                                                        class="text-gray-400 hover:text-red-600 transition mx-2" 
                                                        title="Eliminar"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta aseguradora? Esta acción no se puede deshacer.')">
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