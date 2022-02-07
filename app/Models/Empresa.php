<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        'id',
        'usuario_id',
        'nombre_empresa',
        'descripcion_booking',
        'temp_contratada',
    ];
}
