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
        $pago = pago::create($request->validated());
        $pagare = pagare::findorfail($request->pagare_id);
        $pagare->saldo -= $pagare->saldo - $request->monto_pago;

        if($pagare->saldo <= 0){
            $pagare->saldo = 0;
            $pagare->estatus = 'pagado';
        }
        $pagare->save();
        return redirect()->back()->with('success', 'Pago registrado. EL nuevo saldo del pagare es: ' . $pagare->saldo);
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
