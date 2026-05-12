<?php

namespace Database\Seeders;

use App\Models\pagare;
use App\Models\Deudor;
use App\Models\aseguradora;
use App\Models\seguimiento;
use App\Models\Expediente;
use App\Models\User;
use App\Models\direccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dir = direccion::create([
            'calle' => 'Calle Falsa',
            'numero_interior' => '123',
            'numero_exterior' => 'A',
            'colonia' => 'Colonia Inventada',
            'lote' => 'Lote 1',
            'CP' => '56530',
            'referencias' => 'Frente a la plaza'
        ]);

        $deudor = Deudor::create([
            'nombres' => 'Evelyn Itzel',
            'apellido_p' => 'Luna',
            'apellido_m' => 'Alvarez',
            'curp' => 'LUAEXXXXXXXXXXXXXX',
            'celular' => '5512345678',
            'telefono_fijo' => '5587654321',
            'direccion_id' => $dir->id,
            'email' => 'evelyn@example.com',
            'estatus' => 'activo'
        ]);

        $aseguradora = aseguradora::create(['nombre' => 'Aseguradora Prueba',]);
        $expediente = Expediente::create(['contrato' => 1, 'INE' => 1, 'ruta_documentos' => 'docs/test.pdf']);
        $seguimiento = Seguimiento::create([
            'fecha_notificacion' => now(),
            'fecha_embargo' => now(), // Agregamos esto para cumplir con la DB
            'fecha_cierre' => now()   // Agregamos esto para cumplir con la DB
        ]);

        $pagare = Pagare::create([
            'deudor_id' => $deudor->id,
            'aseguradora_id' => $aseguradora->id,
            'expediente_id' => $expediente->id,
            'seguimiento_id' => $seguimiento->id,
            'monto_original' => 10000.00,
            'saldo' => 10000.00,
            'fecha_registro' => now(), //
            'fecha_prestamo' => now(), //
            'estatus' => 'activo'
        ]);
    }
}
