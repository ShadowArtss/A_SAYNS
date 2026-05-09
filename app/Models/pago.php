<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $fillable = [
        'pagare_id', 'usuario_id', 'monto_pago', 'fecha_pago',
        'metodo_pago', 'referencia_transaccion', 'estatus'
    ];

    // Relación con el pagare
    public function pagare()
    {
        return $this->belongsTo(Pagare::class);
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
