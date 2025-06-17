<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComentarioArmario extends Model
{
    protected $fillable = [
        'id_armario',
        'id_usuario',
        'comentario',
    ];
}
