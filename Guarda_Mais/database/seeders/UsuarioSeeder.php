<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('usuarios')->insert([
            ['nome' => 'Moises Olimpico', 'email' => 'thomasqueiroz06@gmail.com', 'senha' => '01000011 01101111 01101101 01101001 01100111 01101111 00100000 01101111 00100000 01100011 01110101 00100000 01100100 01100101 00100000 01110001 01110101 01100101 01101101 00100000 01110100 01100001 00100000 01101100 01100101 01101110 01100100 01101111'],
            ['nome' => 'Test User', 'email' => 'emailreserva@gmail.com', 'senha' => '1234']
        ]);
    }
}
