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
        \DB::table('alunos')->insert([
            ['armario_numero' => 1, 'aluno_nome' => 'Leonando del a matrix', 'data_inicio' => '2023-01-01', 'data_fim' => '2023-06-01'],
            ['armario_numero' => 2, 'aluno_nome' => 'Maria Fernanda Silva', 'data_inicio' => '2023-02-01', 'data_fim' => '2023-07-01'],
            ['armario_numero' => 3, 'aluno_nome' => 'João Pedro Oliveira', 'data_inicio' => '2023-03-01', 'data_fim' => '2023-08-01'],
            ['armario_numero' => 4, 'aluno_nome' => 'Otávio Esboriol', 'data_inicio' => '2023-04-01', 'data_fim' => '2023-09-01'],
            ['armario_numero' => 5, 'aluno_nome' => 'Carlos Eduardo Lima', 'data_inicio' => '2023-05-01', 'data_fim' => '2023-10-01'],
            ['armario_numero' => 6, 'aluno_nome' => 'Fernanda Souza Rocha', 'data_inicio' => '2023-06-01', 'data_fim' => '2023-11-01'],
            ['armario_numero' => 7, 'aluno_nome' => 'Guilherme Colete da Silva', 'data_inicio' => '2023-07-01', 'data_fim' => '2023-12-01'],
            ['armario_numero' => 8, 'aluno_nome' => 'Beatriz Menezes', 'data_inicio' => '2023-08-01', 'data_fim' => '2023-12-01'],
            ['armario_numero' => 9, 'aluno_nome' => 'Lucas Almeida',   'data_inicio' => '2023-08-01',      'data_fim' => '2023-12-01'],
            ['armario_numero' => 10,'aluno_nome' => 'Thomas Turbano Opinto',   'data_inicio' => '2023-08-01',      'data_fim' => '2023-12-01']
        ]);
    }
}
