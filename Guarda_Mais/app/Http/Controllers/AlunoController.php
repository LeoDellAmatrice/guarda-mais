<?php

namespace App\Http\Controllers;


use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function getAlunos() {
        $alunos = Aluno::where('nome_aluno', 'Leonardo')->get();
        return view('home', compact('alunos'));
    }
}
