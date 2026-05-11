<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aseguradora extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];

    public function pagares()
    {
        return $this->hasMany(Pagare::class);
    }
}
