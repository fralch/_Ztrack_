<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madurador_points extends Model
{
    use HasFactory;
    protected $table = 'madurador_control';
    protected $fillable = [
        'id',
        'contenedor_id',
        'temperatura',
        'co2',
        'humedad',
        'etileno',
        'tiempo_proceso',
        'etileno_minimo',
        'tiempo_inyeccion',
        'estado',  
    ];
}
