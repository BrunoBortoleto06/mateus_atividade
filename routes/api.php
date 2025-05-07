<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuncionarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('departamentos', DepartamentoController::class);
Route::apiResource('funcionarios', FuncionarioController::class);


Route::get('funcionarios/{id}/departamento', [FuncionarioController::class, 'getDepartamento']);
Route::get('departamentos/{id}/funcionarios', [DepartamentoController::class, 'getFuncionarios']);
Route::get('funcionarios-com-departamentos', [FuncionarioController::class, 'indexComDepartamento']);
Route::get('departamentos-com-funcionarios', [DepartamentoController::class, 'indexComFuncionarios']);
