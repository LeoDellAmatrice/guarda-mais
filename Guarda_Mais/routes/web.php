<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmarioController;

Route::get('/', [ArmarioController::class, 'index'])->name('armarios.index');
Route::get('/armarios/bloco/{nome}', function ($nome) {
    $setor = Setor::where('nome', 'like', "%$nome%")->first();

    if (!$setor) {
        return response()->json([], 404);
    }

    return response()->json($setor->armarios);
});
Route::get('/armarios/bloco/{bloco}', [ArmarioController::class, 'getByBloco']);
Route::get('/armarios/por-setor/{id}', [ArmarioController::class, 'getBySetor']);