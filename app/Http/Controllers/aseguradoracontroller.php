<?php

namespace App\Http\Controllers;
use App\Models\seguimiento;
use Illuminate\Http\Request;
use App\Models\aseguradora;

class aseguradoracontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aseguradoras = aseguradora::all();
        return view('aseguradoras.index', compact('aseguradoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aseguradoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { $validated =
        $request->validate([
            'nombre' => 'required|string|max:100|unique:aseguradoras,nombre',
        ]);

        aseguradora::create($request->all());

        return redirect()->route('aseguradoras.index')->with('success', 'Aseguradora creada exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $aseguradora = aseguradora::findOrFail($id);
        return view('aseguradoras.show', compact('aseguradora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $aseguradora = aseguradora::findOrFail($id);
        return view('aseguradoras.edit', compact('aseguradora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:100|unique:aseguradoras,nombre,' . $id,
        ]);

        $aseguradora = aseguradora::findOrFail($id);
        $aseguradora->update($request->all());

        return redirect()->route('aseguradoras.index')->with('success', 'Aseguradora actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $aseguradora = aseguradora::findOrFail($id);
        $aseguradora->delete();
        return redirect()->route('aseguradoras.index')->with('danger', 'Aseguradora eliminada correctamente.');
    }
}
