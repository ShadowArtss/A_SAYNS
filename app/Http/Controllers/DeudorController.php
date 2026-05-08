<?php

namespace App\Http\Controllers;
use App\Models\deudor;
use Illuminate\Http\Request;

class DeudorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
$validated =
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido_p' => 'required|string|max:100',
            'apellido_m' => 'nullable|string|max:100',
            'direccion' => 'required|string|max:255',
            'celular' => 'required|numeric|max:20',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:deudores,email',
            'curp' => 'required|string|max:18|unique:deudores,curp',
            'estatus' => 'required|boolean',
            'calle' => 'required|string|max:255',
            'numero_exterior' => 'required|string|max:20',
            'numero_interior' => 'nullable|string|max:20',
            'colonia' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10',
            'lote' => 'nullable|string|max:50',
            'referencia' => 'nullable|string|max:255',
        ]);

        // Crear un nuevo deudor con los datos validados
            Deudor::create($validated);

        // Redirigir o retornar una respuesta según sea necesario
        return redirect()->route('deudores.index')->with('success', 'Deudor creado exitosamente.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
