<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    //
    protected $fillable = ['nome', 'descricao'];
    protected $table = 'setores';

    public function armarios()
{
    return $this->hasMany(Armarios::class);
}

}
