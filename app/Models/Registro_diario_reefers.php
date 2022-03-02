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
        're_c_o2',
        're_o2',
        'alv',
        'latitud',
        'longitud',
        'status',
        'modelo',
        
    ];
}
