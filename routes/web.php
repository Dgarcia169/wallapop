<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);


Route::get('palog', [App\Http\Controllers\ProductoController::class, 'palog'])->name('palog');

// BÁSICAS
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('product/{id}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('addproduct', [App\Http\Controllers\HomeController::class, 'addproduct'])->name('addproduct');
Route::get('deseados', [App\Http\Controllers\HomeController::class, 'deseados'])->name('deseados');
Route::get('mensajes', [App\Http\Controllers\HomeController::class, 'mensajes'])->name('mensajes');


Route::post('comprar/{id}/{idwanted}', [App\Http\Controllers\HomeController::class, 'comprar'])->name('comprar');
Route::post('contacto', [App\Http\Controllers\HomeController::class, 'store'])->name('product.store');
Route::post('storeproduct', [App\Http\Controllers\HomeController::class, 'storeproduct'])->name('storeproduct.store');
Route::post('adddeseados', [App\Http\Controllers\HomeController::class, 'adddeseados'])->name('adddeseados');

// USERS
Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change')->middleware('verified');
Route::post('user/change', [UserController::class, 'changeUser'])->name('user.change')->middleware('verified');
Route::get('email/restore/{id}/{email}', [UserController::class, 'restoreEmail'])->name('email.restore')->middleware('signed');
Route::post('email/restore/{id}/{email}', [UserController::class, 'restorePreviousEmail'])->name('email.restore')->middleware('signed');

// ADMIN ZONE
Route::group(['middleware' => ['checkIsAdmin']], function () {
    Route::group(['prefix' => 'backend'], function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::get('/usuarios'  , [App\Http\Controllers\Admin\UsuariosController::class  , 'view']);
        Route::get('/productos' , [App\Http\Controllers\Admin\ProductosController::class , 'view']);
        Route::get('/categorias', [App\Http\Controllers\Admin\CategoriasController::class, 'view']);
    });
});

