<?php

namespace App\Http\Controllers;

use App\Models\pagare;
use App\Http\Requests\pagareRequest;
use Illuminate\Http\Request;

class pagarecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagares = pagare::all();
        return view('pagares.index', compact('pagares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pagares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        pagare::create($request->validated());
        return redirect()->back()->with('success', 'Pagare creado exitosamente.');
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
    public function update(PagareRequest $request, pagare $pagare)
    {
        $pagare->update($request->validated());
        return redirect()->back()->with('info', 'Pagaré actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagare $pagare)
    {
        $pagare->delete();
        return redirect()->back()->with('danger', 'Pagaré eliminado del sistema');
    }
}
