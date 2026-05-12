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
        $pagos = pago::all();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pagares = pagare::where('estatus', '!=', 'liquidado')->get();
        return view('pagos.create', compact('pagares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pagare_id' => 'required|exists:pagares,id',
            'monto_pago' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string',
        ]);

        pago::create([
            'pagare_id' => $request->pagare_id,
            'usuario_id' => auth()->id(),
            'monto_pago' => $request->monto_pago,
            'fecha_pago' => now(),
            'metodo_pago' => $request->metodo_pago,
            'estatus' => 'completado',
            'referencia_transaccion' => 'SIMULADO-' . uniqid(),
        ]);

        $pagare = pagare::findOrFail($request->pagare_id);
        $nuevo_saldo = $pagare->saldo_pendiente - $request->monto_pago;

        $nuevoEstatus = $nuevo_saldo <= 0 ? 'liquidado' : 'pendiente';

        $pagare->update([
            'saldo_pendiente' => max($nuevo_saldo, 0),
            'estatus' => $nuevoEstatus,
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');
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
