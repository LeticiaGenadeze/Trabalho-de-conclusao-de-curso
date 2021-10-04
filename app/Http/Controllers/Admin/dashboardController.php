<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cha;
use App\Models\Consulta;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $clientes = User::all();
        $clientes = $clientes->count();      

        $chasCadastrados = Cha::all();
        $chasCadastrados = $chasCadastrados->count();
      
        $totalConsultas = Consulta::all();
        $consultasEfetivadas = $totalConsultas->where('status', 1)->count();
        $consultasPendentes = $totalConsultas->where('status', 0)->count();
          
        $consultaSexoMasculino = $totalConsultas->where('sexo', 'masculino')->count();
        $consultaSexoFeminino = $totalConsultas->where('sexo', 'feminino')->count();
      
        $totalConsultas = $totalConsultas->count();
        $porcentagemMasculino = ($consultaSexoMasculino / $totalConsultas) *  100;
        $porcentagemFeminino = ($consultaSexoFeminino / $totalConsultas) *  100;

        return view('admin.dashboard', compact('clientes', 'consultasPendentes', 'consultasEfetivadas', 'chasCadastrados', 'porcentagemMasculino', 'porcentagemFeminino'));  
    }
}
