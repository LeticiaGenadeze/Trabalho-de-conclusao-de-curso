<?php

use App\Models\Cha;
use App\Models\Consulta;
use App\Models\Sintoma;
use Illuminate\Http\Request;
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

Route::get('/', [\App\Http\Controllers\Site\ConsultasController::class, 'step1'])->name('site.step1');
Route::get('/passo2', [\App\Http\Controllers\Site\ConsultasController::class, 'step2'])->name('site.step2');
Route::get('/passo3/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step3'])->name('site.step3');
Route::get('/passo4/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step4'])->name('site.step4');
Route::get('/passo5/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step5'])->name('site.step5');
Route::get('/passo6/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step6'])->name('site.step6');
Route::get('/passo7/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step7'])->name('site.step7');
Route::get('/passo8/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step8'])->name('site.step8');
Route::get('/passo9/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step9'])->name('site.step9');
Route::get('/passo10/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step10'])->name('site.step10');
Route::get('/passo11/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step11'])->name('site.step11');
Route::get('/passo12/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step12'])->name('site.step12');
Route::get('/passo13/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step13'])->name('site.step13');
Route::get('/passo14/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step14'])->name('site.step14');
Route::get('/passo15/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step15'])->name('site.step15');
Route::get('/passo16/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step16'])->name('site.step16');
Route::get('/passo17/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step17'])->name('site.step17');
Route::get('/passo18/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step18'])->name('site.step18');
Route::get('/passo19/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step19'])->name('site.step19');
Route::get('/passo20/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'step20'])->name('site.step20');
Route::get('/blend/{id}', [\App\Http\Controllers\Site\ConsultasController::class, 'blend'])->name('site.blend');

Route::post('/consultas/salvar', [\App\Http\Controllers\Site\ConsultasController::class, 'store'])->name('site.consulta.store');
Route::post('/consultas/{id}/atualizar', [\App\Http\Controllers\Site\ConsultasController::class, 'update'])->name('site.consulta.update');
Route::post('/consultas/{id}/atualizarSexo', [\App\Http\Controllers\Site\ConsultasController::class, 'updateSexo'])->name('site.consulta.updateSexo');
Route::post('/consultas/{id}/vincularSintoma', [\App\Http\Controllers\Site\ConsultasController::class, 'addSintoma'])->name('site.consulta.addSintoma');
Route::get('/painelCliente', [\App\Http\Controllers\Cliente\DashboardController::class, 'index'])->name('cliente.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/perguntas', function () {
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

        Route::get('/consultas', [\App\Http\Controllers\Admin\ConsultaController::class, 'index'])->name('admin.consultas');
        Route::get('/consultas/{id}', [\App\Http\Controllers\Admin\ConsultaController::class, 'show'])->name('admin.consultas.show');
        Route::post('/consultas/{id}/excluir', [\App\Http\Controllers\Admin\ConsultaController::class, 'destroy'])->name('admin.consultas.destroy');
        Route::get('/pendentes', [\App\Http\Controllers\Admin\ConsultaController::class, 'rascunhos'])->name('admin.consultas.pendentes');
        Route::get('/pdf/{id}', [\App\Http\Controllers\Admin\ConsultaController::class, 'geraPdf'])->name('admin.consultas.pdf');
        
    });
});
