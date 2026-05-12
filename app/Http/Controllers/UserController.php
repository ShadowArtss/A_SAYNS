<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\roles;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = user::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = roles::all(); 
    return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
                $request->validate([
                'usuario' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'clave' => 'required|string|min:8',
                'rol_id' => 'required|exists:roles,id',
            ]);

            User::create([
                'usuario' => $request->usuario,
                'email' => $request->email,
                'clave' => Hash::make($request->clave), // Encriptamos la clave
                'rol_id' => $request->rol_id,
            ]);

            return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $usuario = User::findOrFail($id);
        $roles = roles::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'id_rol' => 'required|exists:roles,id',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'id_rol' => $request->id_rol,
        ];

        if ($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $usuario = user::findOrFail($id);

        if ($usuario->id === auth()->id()) {
            return redirect()->route('usuarios.index')->with('error', 'No puedes eliminar tu propio usuario.');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
