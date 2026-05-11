<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fecha_notificacion',
        'fecha_embargo',
        'fecha_cierre'
    ];

    public function pagare()
    {
        return $this->hasOne(Pagare::class);
    }
}
