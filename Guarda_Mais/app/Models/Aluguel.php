<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    protected $fillable = ['armario_numero', 'aluno_nome', 'data_inicio', 'data_fim'];

    public function armario()
    {
        return $this->belongsTo(Armario::class, 'armario_numero');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_nome');
    }
}
