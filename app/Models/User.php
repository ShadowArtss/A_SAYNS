<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Apagamos los timestamps para evitar el error que te salió
    public $timestamps = false;

    // 2. Definimos exactamente qué columnas tienes en tu tabla
    protected $fillable = [
        'usuario',
        'email',
        'clave',
        'rol_id',
    ];

    public function rol()
    {
        return $this->belongsTo(roles::class);
    }

    // 3. Ocultamos 'clave' en lugar de 'password'
    protected $hidden = [
        'clave',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'clave' => 'hashed', // Hasheamos tu columna 'clave'
        ];
    }

    // 4. Le decimos al sistema de Login de Laravel cuál es tu columna de contraseña
    public function getAuthPasswordName()
    {
        return 'clave';
    }
}