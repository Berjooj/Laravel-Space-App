<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/comandos', [\App\Http\Controllers\ComandoController::class, 'index']);
Route::get('/comandos/{id}', [\App\Http\Controllers\ComandoController::class, 'show']);
Route::post('/comandos', [\App\Http\Controllers\RegistraComandoController::class, 'disparaComando']);

Route::get('/foguete', [\App\Http\Controllers\FogueteController::class, 'index']);
Route::get('/foguete/{id}', [\App\Http\Controllers\FogueteController::class, 'show']);
Route::patch('/foguete/{id}', [\App\Http\Controllers\FogueteController::class, 'update']);
Route::post('/foguete', [\App\Http\Controllers\FogueteController::class, 'store']);
Route::delete('/foguete/{id}', [\App\Http\Controllers\FogueteController::class, 'destroy']);

Route::get('/planetas', [\App\Http\Controllers\PlanetaController::class, 'index']);
Route::get('/planetas/{id}', [\App\Http\Controllers\PlanetaController::class, 'show']);
Route::patch('/planetas/{id}', [\App\Http\Controllers\PlanetaController::class, 'update']);
Route::post('/planetas', [\App\Http\Controllers\PlanetaController::class, 'store']);
Route::delete('/planetas/{id}', [\App\Http\Controllers\PlanetaController::class, 'destroy']);

Route::get('/usuario', [\App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [\App\Http\Controllers\UsuarioController::class, 'show']);
Route::patch('/usuario/{id}', [\App\Http\Controllers\UsuarioController::class, 'update']);
Route::post('/usuario', [\App\Http\Controllers\UsuarioController::class, 'store']);
Route::delete('/usuario/{id}', [\App\Http\Controllers\UsuarioController::class, 'destroy']);

Route::get('/missao', [\App\Http\Controllers\MissaoController::class, 'index']);
Route::get('/missao/{id}', [\App\Http\Controllers\MissaoController::class, 'show']);
Route::patch('/missao/{id}', [\App\Http\Controllers\MissaoController::class, 'update']);
Route::post('/missao', [\App\Http\Controllers\MissaoController::class, 'store']);
Route::delete('/missao/{id}', [\App\Http\Controllers\MissaoController::class, 'destroy']);

Route::get('/log', [\App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/foguete/{id}/log', [\App\Http\Controllers\UsuarioController::class, 'showByFogueteId']);
Route::get('/log/{id}', [\App\Http\Controllers\UsuarioController::class, 'show']);
Route::patch('/log/{id}', [\App\Http\Controllers\UsuarioController::class, 'update']);
Route::post('/log', [\App\Http\Controllers\UsuarioController::class, 'store']);
Route::delete('/log/{id}', [\App\Http\Controllers\UsuarioController::class, 'destroy']);
