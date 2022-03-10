<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenedor extends Model
{
    use HasFactory;
    protected $table = 'contenedores';
    protected $fillable = [
        'id',
        'nombre_contendor',
        'tipo',
        'encendido',
        'booking',
        'booking_temp',
    ];
}
