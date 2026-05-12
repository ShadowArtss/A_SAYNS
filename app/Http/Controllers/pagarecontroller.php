<?php

namespace app\Http\Controllers;

use App\Models\pagare;
use App\Models\deudor;
use App\Models\aseguradora;
use App\Models\expediente;
use App\Models\seguimiento;
use Illuminate\Http\Request;
use App\Http\Requests\pagareRequest;

class pagarecontroller extends Controller
{
    public function index()
    {
        // Usamos la lógica de tu rama para listar todos los pagarés
        $pagares = pagare::all();
        return view('pagares.index', compact('pagares'));
    }

    public function create()
    {
        // Traemos los catálogos necesarios de la rama de Ian para los select del formulario
        $deudores = deudor::all();
        $aseguradoras = aseguradora::all();
        $seguimientos = seguimiento::all();

        return view('pagares.create', compact('deudores', 'aseguradoras', 'seguimientos'));
    }

    public function store(Request $request)
    {
        // 1. Validamos los datos asegurando que las tablas existan (deudors, direccions, etc.)
        $request->validate([
            'deudor_id' => 'required|exists:deudors,id',
            'aseguradora_id' => 'required|exists:aseguradoras,id',
            'seguimiento_id' => 'required|exists:seguimientos,id',
            'monto_original' => 'required|numeric|min:0',
            'monto_pagado' => 'nullable|numeric|min:0',
            'fecha_registro' => 'required|date',
            'fecha_prestamo' => 'required|date',
            'estatus' => 'required|string',
            'documento_pagare' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // Máximo 2MB
            'tiene_contrato' => 'required|boolean',
            'tiene_ine' => 'required|boolean',
        ]);

        // 2. Subimos el archivo y guardamos su ruta (se va a storage/app/public/documentos_pagares)
        $ruta_archivo = $request->file('documento_pagare')->store('documentos_pagares', 'public');

        // 3. Creamos el Expediente primero para obtener su ID (según pág. 7 del PDF)
        $nuevo_expediente = expediente::create([
            'contrato' => $request->tiene_contrato,
            'INE' => $request->tiene_ine,
            'ruta_documentos' => $ruta_archivo
        ]);

        // 4. Lógica de Cálculos (Monto original - Monto pagado)
        $monto_original = $request->monto_original;
        $monto_pagado = $request->monto_pagado ?? 0;
        $saldo_pendiente = $monto_original - $monto_pagado;

        // 5. Guardamos el Pagaré conectándolo con el nuevo expediente (según pág. 12 del PDF)
        pagare::create([
            'deudor_id' => $request->deudor_id,
            'aseguradora_id' => $request->aseguradora_id,
            'expediente_id' => $nuevo_expediente->id,
            'seguimiento_id' => $request->seguimiento_id,
            'monto_original' => $monto_original,
            'saldo' => $saldo_pendiente,
            'fecha_registro' => $request->fecha_registro,
            'fecha_prestamo' => $request->fecha_prestamo,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('pagares.index')->with('success', 'Pagaré y documento registrados correctamente. Saldo pendiente: $' . $saldo_pendiente);
    }

    public function show(string $id)
    {
        $pagare = pagare::findOrFail($id);
        return view('pagares.show', compact('pagare'));
    }

    public function edit(string $id)
    {
        $pagare = pagare::findOrFail($id);
        $deudores = deudor::all();
        $aseguradoras = aseguradora::all();
        $seguimientos = seguimiento::all();
        return view('pagares.edit', compact('pagare', 'deudores', 'aseguradoras', 'seguimientos'));
    }

    public function update(Request $request, string $id)
    {
        $pagare = pagare::findOrFail($id);
        // Aquí podrías añadir una validación similar a la de store si es necesario
        $pagare->update($request->all());
        return redirect()->route('pagares.index')->with('info', 'Pagaré actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $pagare = pagare::findOrFail($id);
        $pagare->delete();
        return redirect()->route('pagares.index')->with('danger', 'Pagaré eliminado del sistema');
    }
}
