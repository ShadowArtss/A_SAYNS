<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagare extends Model
{
    // Apagamos timestamps según pág. 12 del PDF
    public $timestamps = false;

    // Forzamos el nombre de la tabla exacto
    protected $table = 'pagares';

    // Campos permitidos para guardar (Pág. 12 PDF)
    protected $fillable = [
        'deudor_id',
        'expediente_id',
        'seguimiento_id',
        'aseguradora_id',
        'monto_original',
        'saldo',
        'fecha_registro',
        'fecha_prestamo',
        'estatus'
    ];

    // Relación con el deudor (Pág. 5 y 12 PDF)
    public function deudor()
    {
        return $this->belongsTo(deudor::class, 'deudor_id');
    }

    // Relación con la aseguradora (Pág. 2 y 12 PDF)
    public function aseguradora()
    {
        return $this->belongsTo(aseguradora::class, 'aseguradora_id');
    }

    // Relación con expediente (Pág. 7 y 12 PDF)
    public function expediente()
    {
        return $this->belongsTo(expediente::class, 'expediente_id');
    }

    // Relación con seguimiento (Pág. 16 y 12 PDF)
    public function seguimiento()
    {
        return $this->belongsTo(seguimiento::class, 'seguimiento_id');
    }

    // Relación con los pagos (1:N) - (Pág. 13 PDF)
    public function pagos()
    {
        // Al escribirlo así, Laravel lo buscará solo cuando sea necesario
        return $this->hasMany('App\Models\pago', 'pagare_id');
    }

    public function getSaldoPendienteAttribute()
    {
        // Saldo = Monto Original - (la suma de todos los pagos realizados)
        return $this->monto_original - $this->pagos()->sum('monto_pago');
    }

}
