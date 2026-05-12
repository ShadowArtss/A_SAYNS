<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Apagamos los timestamps porque tu tabla no los tiene
    public $timestamps = false;

    // 2. Forzamos el nombre de la tabla (ajustar si en tu DB es 'users' o 'usuarios')
    protected $table = 'users';

    // 3. Definimos las columnas exactas de tu base de datos
    protected $fillable = [
        'usuario',
        'email',
        'clave',
        'rol_id',
    ];

    // Relación con la tabla de roles
    public function rol()
    {
        return $this->belongsTo(roles::class, 'rol_id');
    }

    // 4. Ocultamos la 'clave' para que no se filtre en consultas JSON
    protected $hidden = [
        'clave',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'clave' => 'hashed', // Hasheamos automáticamente al guardar
        ];
    }

    /**
     * 5. IMPORTANTE: Le decimos a Laravel que tu columna de contraseña
     * se llama 'clave' y no 'password'.
     */
    public function getAuthPasswordName()
    {
        return $this->clave;
    }
}
