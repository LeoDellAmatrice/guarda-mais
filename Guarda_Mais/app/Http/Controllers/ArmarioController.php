<?php

namespace App\Http\Controllers;

use App\Models\Armarios;
use App\Models\Setor;
use Illuminate\Http\Request;

class ArmarioController extends Controller
{
    public function index()
    {
        $setores = Setor::withCount([
            'armarios as armarios_disponiveis' => function ($query) {
                $query->where('status', 'disponível');
            },
            'armarios as armarios_ocupados' => function ($query) {
                $query->where('status', 'ocupado');
            }
        ])->get();

        if ($setores->isEmpty()) {
            abort(404, 'Nenhum setor cadastrado');
        }

        return redirect()->route('armarios.por-setor', $setores->first()->id);
    }

    public function showPorSetor($setorId)
    {
        // Busca o setor ativo com contagem CORRETA de armários
        $setorAtual = Setor::withCount([
            'armarios as armarios_disponiveis' => function($query) {
                $query->where('status', 'disponível');
            },
            'armarios as armarios_ocupados' => function($query) {
                $query->where('status', 'ocupado');
            }
        ])->findOrFail($setorId);

        // Busca todos os setores para o menu lateral com contagem CORRETA
        $setores = Setor::withCount([
            'armarios as armarios_disponiveis' => function($query) {
                $query->where('status', 'disponível');
            },
            'armarios as armarios_ocupados' => function($query) {
                $query->where('status', 'ocupado');
            }
        ])->get();

        // Busca os armários do setor selecionado
        $armarios = Armarios::where('setor_id', $setorId)
            ->orderBy('numero')
            ->get();

        return view('armarios.index', [
            'setores' => $setores,
            'setorAtivo' => $setorId,
            'setorAtual' => $setorAtual,
            'armarios' => $armarios
        ]);
    }

    public function show($id)
    {
        $armarioDetalhado = Armarios::with('setor')->findOrFail($id);

        $setores = Setor::withCount([
            'armarios as armarios_disponiveis' => function ($query) {
                $query->where('status', 'disponível');
            },
            'armarios as armarios_ocupados' => function ($query) {
                $query->where('status', 'ocupado');
            }
        ])->get();

        $armarios = Armarios::where('setor_id', $armarioDetalhado->setor_id)
            ->orderBy('numero')
            ->get();

        return view('armarios.index', [
            'setores' => $setores,
            'setorAtivo' => $armarioDetalhado->setor_id,
            'setorAtual' => $armarioDetalhado->setor,
            'armarios' => $armarios,
            'armarioDetalhado' => $armarioDetalhado
        ]);
    }

    public function alterarStatus(Request $request, $id)
    {
        $armario = Armarios::findOrFail($id);

        $request->validate([
            'novo_status' => 'required|in:disponível,ocupado'
        ]);

        $armario->status = $request->novo_status;
        $armario->save();

        return redirect()->route('armarios.show', $armario->id)
            ->with('success', 'Status do armário atualizado com sucesso!');
    }
}
