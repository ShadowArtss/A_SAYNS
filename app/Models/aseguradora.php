<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aseguradora extends Model
{
    // Desactivamos timestamps porque la tabla no tiene 'created_at' ni 'updated_at' (Pág. 2 PDF)
    public $timestamps = false;

    // Nombre de la tabla exacto como aparece en la base de datos (Pág. 2 PDF)
    protected $table = 'aseguradoras';

    protected $fillable = ['nombre'];

    // Relación: Una aseguradora tiene muchos pagarés (Pág. 12 PDF)
    public function pagares()
    {
        return $this->hasMany(pagare::class, 'aseguradora_id');
    }
}
