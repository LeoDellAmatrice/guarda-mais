<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AluguelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('aluguels')->insert([
            ['armario_id' => 3, 'aluno_id' => 1, 'data_inicio' => '2023-01-01', 'data_fim' => '2023-06-01'],
            ['armario_id' => 5, 'aluno_id' => 4, 'data_inicio' => '2023-04-01', 'data_fim' => '2023-09-01'],
            ['armario_id' => 9, 'aluno_id' => 9, 'data_inicio' => '2023-08-01', 'data_fim' => '2023-12-01'],
            ['armario_id' => 7,'aluno_id' => 10, 'data_inicio' => '2023-08-01', 'data_fim' => '2023-12-01']
        ]);
    }
}
