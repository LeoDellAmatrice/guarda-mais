<?php

use App\Models\Setor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmarioController;

// Route::get('/', [ArmarioController::class, 'index'])->name('armarios.index');


Route::get('/armarios', [ArmarioController::class, 'index'])->name('armarios.index');
Route::get('/armarios/setor/{setor}', [ArmarioController::class, 'showPorSetor'])->name('armarios.por-setor');
Route::get('/armarios/{id}', [ArmarioController::class, 'show'])->name('armarios.show');
Route::patch('/armarios/{id}/alterar-status', [ArmarioController::class, 'alterarStatus'])->name('armarios.alterar-status');
