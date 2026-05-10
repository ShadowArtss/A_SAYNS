<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagare extends Model
{
    public $timestamps = false;

    // Aquí le decimos a Laravel qué campos nos va a dejar guardar desde el formulario
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

    // Relación con el deudor
    public function deudor()
    {
        return $this->belongsTo(deudor::class);
    }

    // Relación con la aseguradora
    public function aseguradora()
    {
        return $this->belongsTo(aseguradora::class);
    }

    // Relaciones 1:1 con expediente y seguimiento
    public function expediente()
    {
        return $this->belongsTo(expediente::class); // Corregido a belongsTo porque la llave foránea está en esta tabla
    }

    public function seguimiento()
    {
        return $this->belongsTo(seguimiento::class); // Corregido a belongsTo
    }

    // Relación con los pagos (1:N)
    public function pagos()
    {
        return $this->hasMany(pago::class);
    }
}