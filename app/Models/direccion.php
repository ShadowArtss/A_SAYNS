<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'calle',
        'numero_interior',
        'numero_exterior',
        'colonia',
        'lote',
        'CP',
        'referencias'
    ];

    public function deudors()
    {
        return $this->hasOne(Deudor::class);
    }
}
