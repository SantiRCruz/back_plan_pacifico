<?php

use App\Http\Controllers\profileController;
use App\Http\Controllers\sampleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PopulationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/almacenar_usuario', [userController::class, 'store']);
Route::get('/listar_usuarios', [userController::class, 'index']);

Route::get('/listar_perfiles', [profileController::class, 'index']);


Route::get('/listar_muestras', [sampleController::class, 'index']);
Route::post('/almacenar_muestras', [sampleController::class , 'store']);
Route::get('/lista_muestra/{id_sample}',[sampleController::class , 'show']);
Route::put('/actualizar_muestra/{id_sample}', [sampleController::class, 'update']);
Route::delete('/eliminar_muestra/{id_sample}', [sampleController::class, 'destroy']);


Route::get('/listar_poblaciones', [PopulationsController::class, 'index']);
Route::post('/almacenar_poblaciones', [populationsController::class, 'store']);
Route::get('/lista_poblacion/{id_population}', [populationsController::class, 'show']);
Route::post('/actualizar_poblacion', [populationsController::class, 'update']);
Route::delete('/eliminar_poblacion', [populationsController::class, 'destroy']);


