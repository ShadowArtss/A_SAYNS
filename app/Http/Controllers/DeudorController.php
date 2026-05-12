<?php

namespace App\Http\Controllers;

use App\Models\deudor;
use App\Http\Requests\DeudorRequest;
use Illuminate\Http\Request;

class DeudorController extends Controller
{
    public function index()
    {
        // Traemos todos los deudores
        $deudores = Deudor::all();
        return view('deudores.index', compact('deudores'));
    }

    public function create()
    {
        return view('deudores.create');
    }

    public function store(DeudorRequest $request)
    {
        Deudor::create($request->validated());
        return redirect()->route('deudores.index')->with('success', 'Deudor guardado');
    }

    public function show(string $id)
    {
        $deudor = Deudor::findOrFail($id);
        return view('deudores.show', compact('deudor'));
    }

    public function edit(string $id)
    {
        $deudor = Deudor::findOrFail($id);
        return view('deudores.edit', compact('deudor'));
    }

    public function update(Request $request, string $id)
    {
        $deudor = Deudor::findOrFail($id);

        $request->validate([
            'direccion_id'  => 'required',
            'nombres'       => 'required',
            'apellido_p'    => 'required',
            'apellido_m'    => 'nullable',
            'curp'          => 'required',
            'celular'       => 'required',
            'telefono_fijo' => 'nullable',
            'email'         => 'required|email',
            'estatus'       => 'required'
        ]);

        $deudor->update($request->all());

        return redirect()->route('deudores.index')->with('success', 'Deudor actualizado');
    }

    public function destroy(string $id)
    {
        $deudor = Deudor::findOrFail($id);
        $deudor->delete();

        return redirect()->route('deudores.index')->with('success', 'Deudor eliminado correctamente');
    }
}
