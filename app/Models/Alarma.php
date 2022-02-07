<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarma extends Model
{
    use HasFactory;
    protected $table = 'alarmas';
    protected $fillable = [
        'id',
        'nombre_alarma',
        'nombre_alarma_ingles',
    ];
}
