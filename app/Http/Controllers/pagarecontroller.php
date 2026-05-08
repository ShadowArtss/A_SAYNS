<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagarecontroller extends Controller
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
            'deudor_id' => 'required|exists:deudores,id',
            'aseguradora_id' => 'required|exists:aseguradoras,id',
            'monto_original' => 'required|numeric',
            'fecha_registro' => 'required|date',
            'estatus' => 'required|boolean',
            'fecha_prestamo' => 'required|date',
            'expediente_id' => 'required|exists:expedientes,id',
            'seguimiento_id' => 'required|exists:seguimientos,id', 
            'saldo' => 'required|numeric',
        ]);
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
