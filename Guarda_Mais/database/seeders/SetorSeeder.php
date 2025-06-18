<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setor;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('setores')->insert([
        [
            'nome' => 'Bloco D',
            'descricao' => 'Setor localizado no Bloco A',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nome' => 'Bloco B',
            'descricao' => 'Setor localizado no Bloco B',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
