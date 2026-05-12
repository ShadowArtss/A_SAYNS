<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pago;
use App\Models\pagare;

class pagocontroller extends Controller
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
            'pagare_id' => 'required|exists:pagares,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'monto_pago' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'referencia_transaccion' => 'required|string|max:100',
            'metodo_pago' => 'required|string|max:50',
            'estatus' => 'required|boolean',
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
