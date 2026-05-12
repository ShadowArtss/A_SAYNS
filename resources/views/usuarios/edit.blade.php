<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar Usuario: {{ $usuario->usuario }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Actualización de credenciales y nivel de acceso
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
                            Modificar Perfil
                        </h3>
                        <p class="text-sm text-gray-500">Actualiza la información del usuario en el sistema</p>
                    </div>

                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-bold text-xs uppercase">
                        Modo Edición
                    </span>
                </div>

                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                    @csrf 
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nombre de Usuario</label>
                            <input type="text" name="usuario" required value="{{ old('usuario', $usuario->usuario) }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                            @error('usuario')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Correo Electrónico</label>
                            <input type="email" name="email" required value="{{ old('email', $usuario->email) }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Rol Asignado</label>
                            <select name="rol_id" required class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                @foreach($roles as $rol)
                                    <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                                        {{ $rol->nombre ?? 'Rol #'.$rol->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2 p-4 bg-gray-50 rounded-lg border border-gray-100">
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Actualizar Contraseña (Opcional)</label>
                            <input type="password" name="clave" placeholder="Dejar en blanco para conservar la actual"
                                   class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 shadow-sm bg-white">
                            <p class="text-xs text-gray-400 mt-2 italic">
                                Si el usuario olvidó su clave, ingresa una nueva. Mínimo 8 caracteres.
                            </p>
                            @error('clave')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('usuarios.index') }}" 
                           class="px-6 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200 transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                            <i class="fas fa-sync-alt mr-2"></i> Actualizar Usuario
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>