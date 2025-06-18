<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('alunos')->insert([
            ['nome' => 'Leonando del a matrix', 'telefone' => '1999999999', 'turma' => '2DEV'],
            ['nome' => 'Maria Fernanda Silva', 'telefone' => '11988887777', 'turma' => '1ADM'],
            ['nome' => 'João Pedro Oliveira', 'telefone' => '21977776666', 'turma' => '3INF'],
            ['nome' => 'Otávio Esboriol', 'telefone' => '31966665555', 'turma' => '2DEV'],
            ['nome' => 'Carlos Eduardo Lima', 'telefone' => '41955554444', 'turma' => '1ADM'],
            ['nome' => 'Fernanda Souza Rocha', 'telefone' => '51944443333', 'turma' => '3INF'],
            ['nome' => 'Guilherme Colete da Silva', 'telefone' => '61933332222', 'turma' => '2DEV'],
            ['nome' => 'Beatriz Menezes', 'telefone' => '71922221111', 'turma' => '1ADM'],
            ['nome' => 'Lucas Almeida', 'telefone' => '81911110000', 'turma' => '3INF'],
            ['nome' => 'Thomas Turbano Opinto', 'telefone' => '91900009999', 'turma' => '2DEV']
        ]);
    }
}
