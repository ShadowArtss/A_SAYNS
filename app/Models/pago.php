<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    public $timestamps = false;
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

    protected static function booted()
    {
        static::created(function ($pago) {
            // Solo si el pago está completado
            if ($pago->estatus == 'completado') {
                $pagare = $pago->pagare; // Relación con el pagaré
                if ($pagare) {
                    $pagare->decrement('saldo', $pago->monto_pago);

                    // Si el saldo llega a 0, lo marcamos como liquidado
                    if ($pagare->saldo <= 0) {
                        $pagare->update(['estatus' => 'liquidado', 'saldo' => 0]);
                    }
                }
            }
        });
    }
}
