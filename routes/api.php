<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/* ===================================================================================================================
================================================ ADMIN SECTION ======================================================
=================================================================================================================== */

Route::group(['middleware' => ['checkIsAdmin']], function () {
        
    Route::group(['prefix' => 'usuarios'], function () {
        Route::get('/'     , [App\Http\Controllers\Admin\UsuariosController::class    , 'getDatatable']);
        Route::put('/edit' , [App\Http\Controllers\Admin\UsuariosController::class    , 'put']);
        Route::post('/create' , [App\Http\Controllers\Admin\UsuariosController::class , 'post']);
        Route::get('/get/{id_usuario?}', [App\Http\Controllers\Admin\UsuariosController::class , 'get']);
    });

    Route::group(['prefix' => 'productos'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductosController::class, 'getDatatable']); 
        Route::put('/edit' , [App\Http\Controllers\Admin\ProductosController::class    , 'put']);
        Route::post('/create' , [App\Http\Controllers\Admin\ProductosController::class , 'post']);
    });
    
    Route::group(['prefix' => 'categorias'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriasController::class, 'getDatatable']); 
        Route::put('/edit' , [App\Http\Controllers\Admin\CategoriasController::class, 'put']);
        Route::post('/create' , [App\Http\Controllers\Admin\CategoriasController::class , 'post']);
        Route::get('/get/{id_categoria?}', [App\Http\Controllers\Admin\CategoriasController::class , 'get']);
    });

});

