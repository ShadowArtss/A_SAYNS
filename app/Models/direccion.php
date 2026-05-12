<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    public $timestamps = false;
    protected $table = 'direccions';

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
        return $this->hasMany(Deudor::class, 'direccion_id', 'id');
    }
}
