<?php

use App\Http\Controllers\departmentsController;
use App\Http\Controllers\ethnicGroupsController;
use App\Http\Controllers\featuresController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\sampleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\populationsController;
use App\Http\Controllers\measureController;
use App\Http\Controllers\municipalitiesController;
use App\Http\Controllers\parametersController;
use App\Http\Controllers\populatedCentersController;
use App\Http\Controllers\sigInController;
use App\Http\Controllers\waterTypesController;
use App\Http\Controllers\analysisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// RUTAS USUARIO
Route::post('/almacenar_usuario', [userController::class, 'store']);
Route::get('/listar_usuarios', [userController::class, 'index']);
Route::put('/modificar_usuario/{id_user}', [userController::class, 'update']);
Route::get('/mostrar_usuario/{id_user}', [userController::class, 'show']);
Route::delete('/eliminar_usuario/{id_user}', [userController::class, 'destroy']);
//RUTAS PERFIL
Route::get('/listar_perfiles', [profileController::class, 'index']);

//MUESTRAS
Route::get('/listar_muestras/{id_analysis}', [sampleController::class, 'index']);
Route::post('/almacenar_muestras', [sampleController::class , 'store']);
Route::get('/lista_muestra/{id_sample}',[sampleController::class , 'show']);
Route::put('/actualizar_muestra/{id_sample}', [sampleController::class, 'update']);
Route::delete('/eliminar_muestra/{id_sample}', [sampleController::class, 'destroy']);

//POBLACIONES
Route::get('/listar_poblaciones', [populationsController::class, 'index']);
Route::post('/almacenar_poblaciones', [populationsController::class, 'store']);
Route::get('/lista_poblacion/{id_population}', [populationsController::class, 'show']);
Route::put('/actualizar_poblacion/{id_population}', [populationsController::class, 'update']);
Route::delete('/eliminar_poblacion/{id_population}', [populationsController::class, 'destroy']);


//MEDIDAS
Route::post('/almacenar_medidas', [measureController::class, 'store']);
Route::get('/lista_medida/{id_measure}', [measureController::class, 'show']);
Route::put('/actualizar_medida/{id_measure}',[measureController::class,'update']);
Route::delete('/eliminar_medida/{id_measure}',[measureController::class,'destroy']);

//ANALYSIS
Route::post('/almacenar_analisis', [analysisController::class, 'store']);
Route::get('/listar_analisis_poblacion/{id_population}', [analysisController::class, 'showByIdPopulation']);


//RUTAS DATOS PARAMETRIZADOS
Route::get('/listar_departments', [departmentsController::class, 'index']);
Route::get('/listar_caracteristicas', [featuresController::class, 'index']);
Route::get('/listar_municipios', [municipalitiesController::class, 'index']);
Route::get('/listar_municipios/{id_department}', [municipalitiesController::class, 'show']);
Route::get('/listar_parametros', [parametersController::class, 'index']);
Route::get('/listar_centros_poblados', [populatedCentersController::class, 'index']);
Route::get('/listar_centros_poblados/{id_municipality}', [populatedCentersController::class, 'show']);
Route::get('/listar_tipos_agua', [waterTypesController::class, 'index']);
Route::get('/listar_grupos_etnicos', [ethnicGroupsController ::class, 'index']);


Route::post('/iniciar_sesion', [sigInController::class, 'sesion']);

