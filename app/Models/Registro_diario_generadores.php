<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro_diario_generadores extends Model
{
    use HasFactory;
    protected $table = 'registro_diario_generadores';
    protected $fillable = [
        'id',
        'contenedor_id',
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
