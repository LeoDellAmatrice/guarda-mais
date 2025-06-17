<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::get('/alunos', [AlunoController::class, 'getAlunos']);

