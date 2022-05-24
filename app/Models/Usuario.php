<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = [
        'id',
        'usuario',
        'apellidos',
        'nombres',
        'activo',
        'admin',
        'admin_madurador',
        'correo',
        'contraseña',
    ];
    protected $hidden = [
        'contraseña',
    ];

}
