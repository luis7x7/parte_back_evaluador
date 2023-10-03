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

<<<<<<< HEAD
Route::put('/Form_especialista_e/{id}', [EvaluadorController::class, 'desactivar'])->name('Form_especialista_e');
// Route::put('medicina_general/evaluacionmedica/update/{id}', 'MedicinaGeneral\MedEvaluacionMedicaController@update');
Route::put('evaluador/desactivar/{id}', 'EvaluadorController@desactivar');

Route::get('evaluador/get', 'EvaluadorController@index_tipo_especialista');
Route::get('evaluador/get/{id}', 'EvaluadorController@show');


Route::post('evaluador/post', 'EvaluadorController@create_evaluador');



=======
Route::put('/Form_especialistae/{id}', [EvaluadorController::class, 'editar_evaluador'])->name('Form_especialistae');
>>>>>>> b8706936789ae4fb1b190adfeb7d85aa47d07036
