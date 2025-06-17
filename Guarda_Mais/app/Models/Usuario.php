<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
    ];

}
