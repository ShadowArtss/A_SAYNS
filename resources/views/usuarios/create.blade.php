<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nuevo Usuario
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro de nuevo cajero o administrador
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
                            Datos de Acceso
                        </h3>
                        <p class="text-sm text-gray-500">Credenciales para iniciar sesión en el sistema</p>
                    </div>
                </div>

                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf 

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nombre de Usuario</label>
                            <input type="text" name="usuario" required placeholder="Ej: admin" value="{{ old('usuario') }}"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Correo (Login)</label>
                            <input type="email" name="email" required placeholder="Ej: usuario@empresa.com" value="{{ old('email') }}"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Clave Temporal</label>
                            <input type="password" name="clave" required placeholder="Mínimo 8 caracteres"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Rol del Sistema</label>
                            <select name="rol_id" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="" selected disabled>Selecciona un rol...</option>
                                @foreach($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->nombre ?? 'Rol #'.$rol->id }}</option> 
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('usuarios.index') }}" class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">Cancelar</a>
                        <button type="submit" class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition">
                            <i class="fas fa-save mr-2"></i> Crear Usuario
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>