<?php

use App\Http\Controllers\ArmarioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('armarios.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/armarios', [ArmarioController::class, 'index'])->name('armarios.index');
    Route::get('/armarios/setor/{setor}', [ArmarioController::class, 'showPorSetor'])->name('armarios.por-setor');
    Route::get('/armarios/{id}', [ArmarioController::class, 'show'])->name('armarios.show');
    Route::patch('/armarios/{id}/alterar-status', [ArmarioController::class, 'alterarStatus'])->name('armarios.alterar-status');
});

require __DIR__.'/auth.php';
