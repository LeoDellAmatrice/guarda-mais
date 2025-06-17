<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armario extends Model
{
    protected $fillable = [
        'id_setor',
        'id_usuario',
        'numero_armario',
        'status_armario',
    ];
}
