<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armarios extends Model
{
    protected $fillable = ['numero', 'setor_id', 'status'];

    public function setor()
{
    return $this->belongsTo(Setor::class);
}
}
