<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'contrato',
        'INE',
        'ruta_documentos'
    ];
}
