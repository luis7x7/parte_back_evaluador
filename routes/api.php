<?php

use App\Http\Controllers\EvaluadorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/Form_especialista', [EvaluadorController::class, 'index_tipo_especialista'])->name('Form_especialista');

Route::post('/Form_especialistaw', [EvaluadorController::class, 'create_evaluador'])->name('Form_especialistaw');

Route::put('/Form_especialistae/{id}', [EvaluadorController::class, 'editar_evaluador'])->name('Form_especialistae');