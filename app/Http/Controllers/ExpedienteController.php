<?php

namespace App\Http\Controllers;
use App\Models\expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Traemos todos los datos de la base de datos
    $expedientes = expediente::all(); 

    // 2. Se los pasamos a la vista. 
    return view('expedientes.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('expedientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ruta_documentos' => 'required|file|mimes:pdf|max:5000',
        ]);
        // Aquí iría la lógica para guardar el expediente y el archivo
        $ruta = $request->file('ruta_documentos')->store('expedientes', 'public');

        expediente::create([
            'contrato' => $request->has('contrato') ? 1 : 0,
            'INE' => $request->has('INE') ? 1 : 0,
            'ruta_documentos' => $ruta,
        ]);

        return redirect()->route('expedientes.index')->with('success', 'Expediente creado exitosamente.');
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
        $expediente = expediente::findOrFail($id);
        return view('expedientes.edit', compact('expediente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $expediente = expediente::findOrFail($id);

        $data = [
            'contrato' => $request->has('contrato') ? 1 : 0,
            'INE' => $request->has('INE') ? 1 : 0,
        ];

        if ($request->hasFile('ruta_documentos')) {
            Storage::disk('public')->delete($expediente->ruta_documentos); // Elimina el archivo anterior
            $data['ruta_documentos'] = $request->file('ruta_documentos')->store('expedientes', 'public');
        }
        $expediente->update($data);
        return redirect()->route('expedientes.index')->with('success', 'Expediente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $expediente = expediente::findOrFail($id);
        Storage::disk('public')->delete($expediente->ruta_documentos); // Elimina el archivo asociado
        $expediente->delete();
        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado exitosamente.');
    }
}
