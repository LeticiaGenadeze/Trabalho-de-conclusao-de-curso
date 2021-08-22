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

});


