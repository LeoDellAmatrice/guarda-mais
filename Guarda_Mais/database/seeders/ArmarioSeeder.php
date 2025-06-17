<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Armarios;

class ArmarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('armarios')->insert([
        ['numero' => 1, 'setor_id' => 1, 'status' => 'disponível', 'created_at' => now(), 'updated_at' => now()],
        ['numero' => 2, 'setor_id' => 1, 'status' => 'disponível', 'created_at' => now(), 'updated_at' => now()],
        ['numero' => 3, 'setor_id' => 1, 'status' => 'ocupado',    'created_at' => now(), 'updated_at' => now()],
        ['numero' => 4, 'setor_id' => 1, 'status' => 'disponível', 'created_at' => now(), 'updated_at' => now()],
        ['numero' => 5, 'setor_id' => 1, 'status' => 'ocupado',    'created_at' => now(), 'updated_at' => now()],
        ['numero' => 6, 'setor_id' => 2, 'status' => 'disponível', 'created_at' => now(), 'updated_at' => now()],
        ['numero' => 7, 'setor_id' => 2, 'status' => 'ocupado',    'created_at' => now(), 'updated_at' => now()],
        ['numero' => 8, 'setor_id' => 2, 'status' => 'disponível', 'created_at' => now(), 'updated_at' => now()],
        ['numero' => 9, 'setor_id' => 2, 'status' => 'ocupado',    'created_at' => now(), 'updated_at' => now()],
        ['numero' => 10,'setor_id' => 2, 'status' => 'disponível', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
