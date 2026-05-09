<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class deudor extends Model
{
    protected $fillable = ['nombres', 'apellido_p', 'apellido_m', 'celular', 'telefono_fijo','curp', 'email', 'estatus', 'direccion_id'];

public function direccion()
{
    return $this->belongsTo(Direccion::class);
}


public function pagares()
{
    return $this->hasMany(Pagare::class);
}
}
