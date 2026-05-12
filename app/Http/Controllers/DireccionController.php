<?php

namespace App\Http\Controllers;

use App\Models\direccion; // Verifica si es 'Direccion' o 'direccion'
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function index()
    {
        $direcciones = direccion::all();
        return view('direcciones.index', compact('direcciones'));
    }

    public function create()
    {
        return view('direcciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'calle'           => 'required|string|max:255',
            'numero_exterior' => 'required|string|max:255',
            'colonia'         => 'required|string|max:255',
            'CP'              => 'required|string|max:255',
        ]);

        // Creamos el registro pero forzamos que los nulos sean strings vacíos
        // para que MySQL no se queje del "Integrity constraint violation"
        direccion::create([
            'calle'           => $request->calle,
            'numero_interior' => $request->numero_interior ?? '', // Si es nulo, manda cadena vacía
            'numero_exterior' => $request->numero_exterior,
            'colonia'         => $request->colonia,
            'lote'            => $request->lote ?? '',            // Si es nulo, manda cadena vacía
            'CP'              => $request->CP,
            'referencias'     => $request->referencias ?? '',     // Si es nulo, manda cadena vacía
        ]);

        return redirect()->route('direcciones.index')->with('success', 'Dirección guardada');
    }

    public function edit($id)
    {
        $direccion = direccion::findOrFail($id);
        return view('direcciones.edit', compact('direccion'));
    }

    public function update(Request $request, $id)
    {
        $direccion = direccion::findOrFail($id);

        $request->validate([
            'calle'           => 'required',
            'numero_exterior' => 'required',
            'colonia'         => 'required',
            'CP'              => 'required',
        ]);

        $direccion->update($request->all());

        return redirect()->route('direcciones.index')->with('info', 'Dirección actualizada');
    }

    public function destroy($id)
    {
        try {
            $direccion = direccion::findOrFail($id);
            $direccion->delete();

            return redirect()->route('direcciones.index')->with('danger', 'Dirección eliminada correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            // El código 23000 es el de violación de integridad (llave foránea)
            if ($e->getCode() == "23000") {
                return redirect()->route('direcciones.index')->with('warning', 'No se puede eliminar: Esta dirección está asignada a uno o más deudores.');
            }

            return redirect()->route('direcciones.index')->with('danger', 'Ocurrió un error inesperado.');
        }
    }
}
