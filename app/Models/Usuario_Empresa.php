<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_Empresa extends Model
{
    use HasFactory;
    protected $table = 'usuario_empresa';
    protected $fillable = [
        'id',
        'usuario_id',
        'empresa_id',
    ];
}
