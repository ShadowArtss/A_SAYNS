<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    public $timestamps = false; // Apagamos timestamps porque tu migración no tiene created_at / updated_at
    
    protected $fillable = ['contrato', 'INE', 'ruta_documentos'];
}