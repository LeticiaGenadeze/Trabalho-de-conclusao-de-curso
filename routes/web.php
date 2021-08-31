<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin'], function () {


    Route::get('/perguntas', function() {
        return view('admin.perguntas');
    });

    
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/clientes', [\App\Http\Controllers\Admin\ClientesController::class, 'index'])->name('admin.clientes');
    Route::get('/clientes/{id}', [\App\Http\Controllers\Admin\ClientesController::class, 'show'])->name('admin.clientes.show');
    Route::get('/clientes/{id}/editar', [\App\Http\Controllers\Admin\ClientesController::class, 'edit'])->name('admin.clientes.edit');
    Route::post('/clientes/{id}/salvar', [\App\Http\Controllers\Admin\ClientesController::class, 'update'])->name('admin.clientes.update');
    Route::post('/clientes/{id}/excluir', [\App\Http\Controllers\Admin\ClientesController::class, 'destroy'])->name('admin.clientes.destroy');

    Route::get('/sintomas', [\App\Http\Controllers\Admin\SintomasController::class, 'index'])->name('admin.sintomas');
    Route::get('/sintomas/cadastrar', [\App\Http\Controllers\Admin\SintomasController::class, 'create'])->name('admin.sintomas.create');
    Route::get('/sintomas/{id}/editar', [\App\Http\Controllers\Admin\SintomasController::class, 'edit'])->name('admin.sintomas.edit');
    Route::post('/sintomas/{id}/salvar', [\App\Http\Controllers\Admin\SintomasController::class, 'update'])->name('admin.sintomas.update');
    Route::post('/sintomas/{id}/excluir', [\App\Http\Controllers\Admin\SintomasController::class, 'destroy'])->name('admin.sintomas.destroy');
    Route::post('/sintomas/salvar', [\App\Http\Controllers\Admin\SintomasController::class, 'store'])->name('admin.sintomas.store');

    Route::get('/chas', [\App\Http\Controllers\Admin\ChasController::class, 'index'])->name('admin.chas');
    Route::get('/chas/cadastrar', [\App\Http\Controllers\Admin\ChasController::class, 'create'])->name('admin.chas.create');
    Route::get('/chas/{id}/editar', [\App\Http\Controllers\Admin\ChasController::class, 'edit'])->name('admin.chas.edit');
    Route::get('/chas/{id}', [\App\Http\Controllers\Admin\ChasController::class, 'show'])->name('admin.chas.show');
    Route::post('/chas/{id}/salvar', [\App\Http\Controllers\Admin\ChasController::class, 'update'])->name('admin.chas.update');
    Route::post('/chas/{id}/excluir', [\App\Http\Controllers\Admin\ChasController::class, 'destroy'])->name('admin.chas.destroy');
    Route::post('/chas/salvar', [\App\Http\Controllers\Admin\ChasController::class, 'store'])->name('admin.chas.store');
    Route::get('/chas/{id}/caracteristicas', [\App\Http\Controllers\Admin\ChasController::class, 'caracteristica'])->name('admin.chas.caracteristica');    
    Route::post('/chas/{id}/addcaracteristica/', [\App\Http\Controllers\Admin\ChasController::class, 'addCaracteristica'])->name('admin.chas.addCaracteristica');
    Route::post('/caracteristica/{id}/excluir', [\App\Http\Controllers\Admin\ChasController::class, 'deletarCaracteristica'])->name('admin.chas.deletarCaracteristica');
      

    Route::get('/caracteristicas', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'index'])->name('admin.caracteristicas');
    Route::get('/caracteristicas/cadastrar', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'create'])->name('admin.caracteristicas.create');
    Route::get('/caracteristicas/{id}/editar', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'edit'])->name('admin.caracteristicas.edit');
    Route::get('/caracteristicas/{id}', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'show'])->name('admin.caracteristicas.show');
    Route::post('/caracteristicas/{id}/salvar', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'update'])->name('admin.caracteristicas.update');
    Route::post('/caracteristicas/{id}/excluir', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'destroy'])->name('admin.caracteristicas.destroy');
    Route::post('/caracteristicas/salvar', [\App\Http\Controllers\Admin\CaracteristicasController::class, 'store'])->name('admin.caracteristicas.store');
   
});


