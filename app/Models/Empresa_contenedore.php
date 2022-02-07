<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa_contenedore extends Model
{
    use HasFactory;
    protected $table = 'empresas_contenedores';
    protected $fillable = [
        'id',
        'empresa_id',
        'contenedor_id',
    ];
}
