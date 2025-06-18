<?php

namespace App\Models;

use Hamcrest\Core\Set;
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

    public function run(): void
    {
        Setor::factory()->count(10)->create();
    }

    public function getArmariosDisponiveisAttribute()
    {
        return $this->armarios()->where('status', 'disponível')->count();
    }

    public function getArmariosOcupadosAttribute()
    {
        return $this->armarios()->where('status', 'ocupado')->count();
    }

}
