<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_diario_reefers extends Model
{
    use HasFactory;
    protected $table = 'registro_diario_reefers';
    protected $fillable = [
        'id',
        'contenedor_id',
        'nombre_contenedor',
        'set_point',
        'temp_supply',
        'temp_return',
        're_hume',
        'fuel_level',
        'vdc',
        'rpm',
        'freq',
        'vac',
        'latitud',
        'longitud',
        'temp_motor',
        'status',
        'speed',
        'ecopower',
        'horometro',
        'alamra_id',
        'evento_id',
        'modelo',
        
    ];
}
