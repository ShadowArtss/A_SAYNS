<?php

namespace App\Http\Controllers;

use App\Models\seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function index()
    {
        $seguimientos = seguimiento::all();
        return view('seguimientos.index', compact('seguimientos'));
    }

    public function create()
    {
        return view('seguimientos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_notificacion' => 'nullable|date',
            'fecha_embargo'      => 'nullable|date',
            'fecha_cierre'       => 'nullable|date',
        ]);

        seguimiento::create($request->all());

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento registrado.');
    }

    public function edit($id)
    {
        $seguimiento = seguimiento::findOrFail($id);
        return view('seguimientos.edit', compact('seguimiento'));
    }

    public function update(Request $request, $id)
    {
        $seguimiento = seguimiento::findOrFail($id);

        $request->validate([
            'fecha_notificacion' => 'nullable|date',
            'fecha_embargo'      => 'nullable|date',
            'fecha_cierre'       => 'nullable|date',
        ]);

        $seguimiento->update($request->all());

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento actualizado.');
    }

    public function destroy($id)
    {
        $seguimiento = seguimiento::findOrFail($id);

        if ($seguimiento->pagare) {
            return redirect()->back()->with('error', 'No se puede eliminar: Este seguimiento tiene un pagaré activo.');
        }

        $seguimiento->delete();
        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento eliminado.');
    }
}
