<?php

namespace App\Http\Controllers;

use App\Models\roles; // Tu modelo que ya probamos en Tinker
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Muestra la lista de roles (index)
     */
    public function index()
    {
        $roles = roles::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Muestra el formulario para crear un nuevo rol (create)
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Guarda el nuevo rol en la base de datos (store)
     */
    public function store(Request $request)
    {
        // Validamos el campo 'rol' (que es el nombre real en tu DB)
        $request->validate([
            'rol' => 'required|unique:roles,rol|max:255',
        ]);

        // Guardamos
        roles::create([
            'rol' => $request->rol
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    // En RolController.php

    public function edit($id)
    {
        $role = roles::findOrFail($id); // Buscamos el rol por su ID
        return view('roles.edit', compact('role')); // Pasamos la variable 'role' a la vista
    }

    public function update(Request $request, $id)
    {
        $role = roles::findOrFail($id);

        $request->validate([
            'rol' => 'required|max:255|unique:roles,rol,' . $id, // El unique ignora el ID actual
        ]);

        $role->update([
            'rol' => $request->rol
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito');
    }

    // En RolController.php

    public function destroy($id)
    {
        // Buscamos el rol por su ID
        $role = roles::findOrFail($id);

        // Lo eliminamos de la base de datos
        $role->delete();

        // Redirigimos al index con un mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }

}
