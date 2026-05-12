<?php

namespace App\Http\Controllers;

use App\Models\deudor;
use App\Http\Requests\DeudorRequest;
use Illuminate\Http\Request;

class DeudorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deudores = Deudor::all();

        return view('deudores.index', compact('deudores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deudores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeudorRequest $request)
    {
        // Esto guarda TODO lo que venga del formulario de golpe
        // Solo asegúrate de que los 'name' del HTML coincidan con la DB
        Deudor::create($request->all());

        return redirect()->route('deudores.index')->with('success', 'Deudor guardado');
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
    public function update(DeudorRequest $request, deudor $deudor)
    {
        $deudor->update($request->validated());

        return redirect()->route('deudores.index')->with('info', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(deudor $deudor)
    {
        $deudor->delete();
        return redirect()->route('deudores.index')->with('danger', 'Deudor eliminado del sistema');
    }
}
