<?php

use App\Http\Controllers\profileController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/almacenar_usuario', [userController::class, 'store']);
Route::get('/listar_usuarios', [userController::class, 'index']);

Route::get('/listar_perfiles', [profileController::class, 'index']);


