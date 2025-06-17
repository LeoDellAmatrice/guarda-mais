<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario_armario extends Model
{
    protected $fillable = ['comentario', 'armario_id', 'data_comentario', 'usuario_nome'];

    public function armario()
    {
        return $this->belongsTo(Armario::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
