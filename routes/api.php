<?php

use App\Http\Controllers\EvaluadorController;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//      return $request->user();
//  });
 Route::get('/Form_especialista', [EvaluadorController::class, 'index_tipo_especialista'])->name('Form_especialista');

Route::post('/Form_especialistaw', [EvaluadorController::class, 'create_evaluador'])->name('Form_especialistaw');

Route::put('/Form_especialista_e/{id}', [EvaluadorController::class, 'desactivar'])->name('Form_especialista_e');

Route::put('/Form_especialistae/{id}', [EvaluadorController::class, 'editar_evaluador'])->name('Form_especialistae');

Route::get('/Form_especialista_mostra', [EvaluadorController::class, 'mostrar_evaluado'])->name('Form_especialista_mostra');

Route::get('/Form_especialista_mostrar/{id}', [EvaluadorController::class, 'mostrar_evaluador'])->name('Form_especialista_mostrar');


