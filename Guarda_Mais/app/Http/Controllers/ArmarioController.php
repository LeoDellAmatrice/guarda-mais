<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armarios;

class ArmarioController extends Controller
{
    public function index() {
        $setor_id = 1; // Setor padrão ao abrir a página (Bloco A)
        $armarios = Armarios::where('setor_id', $setor_id)->get();
        return view('welcome', compact('armarios', 'setor_id'));
    }

    public function getByBloco($bloco) {
        // Busca setor com o nome do bloco
        $setor = Setor::where('nome', 'Bloco ' . $bloco)->first();

        if (!$setor) {
            return response()->json(['erro' => 'Setor não encontrado'], 404);
        }

        // Pega todos os armários desse setor
        $armarios = Armarios::where('setor_id', $setor->id)->get();

        return response()->json($armarios);
    }

    public function getBySetor($id)
        {
            $armarios = Armarios::where('setor_id', $id)->get();
            return response()->json($armarios);
        }
}
