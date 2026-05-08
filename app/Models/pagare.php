<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagare extends Model
{
    protected $fillable = [
    'deudor_id', 'expediente_id', 'seguimiento_id', 'aseguradora_id', 
    'monto_original', 'saldo', 'fecha_emision', 'fecha_compra'
];

// Relación con el deudor
public function deudor()
{
    return $this->belongsTo(Deudor::class);
}

// Relación con la aseguradora
public function aseguradora()
{
    return $this->belongsTo(Aseguradora::class);
}

// Relaciones 1:1 con expediente y seguimiento
public function expediente()
{
    return $this->hasOne(Expediente::class);
}

public function seguimiento()
{
    return $this->hasOne(Seguimiento::class);
}

// Relación con los pagos (1:N)
public function pagos()
{
    return $this->hasMany(Pago::class);
}
}
