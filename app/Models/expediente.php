<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    // Apagamos timestamps porque tu tabla no tiene created_at / updated_at (Pág. 7 PDF)
    public $timestamps = false;

    // Forzamos el nombre de la tabla exacto del PDF (Pág. 7 y 19)
    protected $table = 'expedientes';

    protected $fillable = [
        'contrato',
        'INE',
        'ruta_documentos'
    ];

    // Relación: Un expediente pertenece a un pagaré (Pág. 12 PDF)
    public function pagare()
    {
        return $this->hasOne(pagare::class, 'expediente_id');
    }
}
