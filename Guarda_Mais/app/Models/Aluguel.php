<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    protected $fillable = [
        'id_aluno',
        'id_armario',
        'data_inicio',
        'data_fim',
    ];
}
