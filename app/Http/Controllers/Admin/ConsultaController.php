<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blend;
use App\Models\Consulta;
use App\Models\ConsultaSintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::query()->where('status', 1)->orderBy('id', 'DESC')->get();

        return view('admin.consultas.index', compact('consultas'));
    }

    public function rascunhos()
    {
        $consultas = Consulta::query()->where('status', 0)->orderBy('id', 'DESC')->get();

        return view('admin.consultas.pendentes', compact('consultas'));
    }

    public function geraPdf($id)
    {

        $consulta = Consulta::query()->where('id', $id)->first();
        $sintomas = ConsultaSintoma::query()->where('consulta_id', $consulta->id)->get();

        $anoAtual = date('Y');
        $year = date('Y', strtotime($consulta->dataDeNascimento));
        $idade = $anoAtual - $year;

        if ($consulta->peso != '' && $consulta->altura != '') {
            $imc = ($consulta->peso / ($consulta->altura * $consulta->altura));
            $imc = number_format($imc, 2);

            if ($imc < '18.5') {
                $imc = $imc . " - Magreza";
            }
            if ($imc > '18.5' && $imc <= '24.9') {
                $imc = $imc . " - Normal";
            }
            if ($imc >= '24.9' && $imc <= '30') {
                $imc = $imc . " - Sobrepeso";
            }
            if ($imc > '30') {
                $imc = $imc . " - Obesidade";
            }
        } else {
            $imc = 'Não foi possível calcular o imc';
        }


        if ($consulta->sexo == 'feminino') {
            $consulta->sexo = 'Feminino';
        }
        if ($consulta->sexo == 'masculino') {
            $consulta->sexo = 'Masculino';
        }

        if ($consulta->gravidezAmamentacao == 'amamentando') {
            $consulta->gravidezAmamentacao = 'Amamentando';
        }
        if ($consulta->gravidezAmamentacao == 'gravida') {
            $consulta->gravidezAmamentacao = 'Grávida';
        }
        if ($consulta->gravidezAmamentacao == 'gravidaeamamentando') {
            $consulta->gravidezAmamentacao = 'Grávida e Amamentando';
        }
        if ($consulta->gravidezAmamentacao == 'nenhumadasopcoes') {
            $consulta->gravidezAmamentacao = 'Nenhuma das Opções';
        }

        if ($consulta->intoleranciaAlimentar == 'intoleranciaLactose') {
            $consulta->intoleranciaAlimentar = 'Intolerância a Lactose';
        }
        if ($consulta->intoleranciaAlimentar == 'intoleranciaGluten') {
            $consulta->intoleranciaAlimentar = 'Intolerância a Glúten';
        }
        if ($consulta->intoleranciaAlimentar == 'nao') {
            $consulta->intoleranciaAlimentar = 'Nenhuma intolerância alimentar';
        }

        if ($consulta->tempoDorCronica == '6-12') {
            $consulta->tempoDorCronica = 'De seis meses a um ano';
        }
        if ($consulta->tempoDorCronica == '12-24') {
            $consulta->tempoDorCronica = 'Entre um e dois anos';
        }
        if ($consulta->tempoDorCronica == '+24') {
            $consulta->tempoDorCronica = 'Mais de dois anos';
        }
        if ($consulta->tempoDorCronica == 'nenhumadasopcoes') {
            $consulta->tempoDorCronica = 'Não possui dor crônica';
        }

        if ($consulta->habitosAlimentares == 'bom') {
            $consulta->habitosAlimentares = 'Me alimento com frutas, verduras, proteínas e carboidratos de forma regrada';
        }
        if ($consulta->habitosAlimentares == 'medio') {
            $consulta->habitosAlimentares = 'Me alimento de forma balanceada, com frutas, verduras, proteínas, carboidratos e gorduras, em maiores ou menores quantidades';
        }
        if ($consulta->habitosAlimentares == 'ruim') {
            $consulta->habitosAlimentares = 'Me alimento com grandes quantidades de carboidratos e gorduras, e dificilmente frutas e saladas';
        }

        if ($consulta->praticaExercicioFisico == 'nao') {
            $consulta->praticaExercicioFisico = 'Não pratico exercícios físicos';
        }
        if ($consulta->praticaExercicioFisico == 'pouco') {
            $consulta->praticaExercicioFisico = ' Sim, uma vez por semana';
        }
        if ($consulta->praticaExercicioFisico == 'medio') {
            $consulta->praticaExercicioFisico = 'Sim, de duas a três vezes por semana';
        }
        if ($consulta->praticaExercicioFisico == 'sempre') {
            $consulta->praticaExercicioFisico = ' Sim, quatro vezes ou mais por semana';
        }

        if ($consulta->consumoDeAgua == 'ruim') {
            $consulta->consumoDeAgua = 'Menos de 1 litro por dia';
        }
        if ($consulta->consumoDeAgua == 'medio') {
            $consulta->consumoDeAgua = 'Entre 1 e 2 litros por dia';
        }
        if ($consulta->consumoDeAgua == 'bom') {
            $consulta->consumoDeAgua = 'Entre 2 e 3 litros por dia';
        }
        if ($consulta->consumoDeAgua == 'excelente') {
            $consulta->consumoDeAgua = '3 litros ou mais';
        }

        if ($consulta->usoDeMedicamento == 'sim') {
            $consulta->usoDeMedicamento = 'Sim';
        }
        if ($consulta->usoDeMedicamento == 'nao') {
            $consulta->usoDeMedicamento = 'Não';
        }

        if ($consulta->consumoDeCha == 'sim') {
            $consulta->consumoDeCha = 'Sim';
        }
        if ($consulta->consumoDeCha == 'nao') {
            $consulta->consumoDeCha = 'Não';
        }

        if ($consulta->fatoresDoCha == 'amargo') {
            $consulta->fatoresDoCha = 'Sabor - Prefiro sabores mais amargos';
        }
        if ($consulta->fatoresDoCha == 'doce') {
            $consulta->fatoresDoCha = 'Sabor - Prefiro sabores mais adocicados';
        }
        if ($consulta->fatoresDoCha == 'pratico') {
            $consulta->fatoresDoCha = 'Praticidade - Prefiro os chás de "sachês" pela praticidade que proporcionam';
        }
        if ($consulta->fatoresDoCha == 'naopratico') {
            $consulta->fatoresDoCha = 'Praticidade - Não é tão relevante, gosto de preparar o chá utilizando, muitas vezes, as ervas secas ou recém colhidas';
        }
        if ($consulta->fatoresDoCha == 'nenhumadasopcoes') {
            $consulta->fatoresDoCha = 'Não';
        }

        $blends = Blend::query()->where('consulta_id', $consulta->id)->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf->loadView('admin.consultas.pdf', compact('consulta', 'imc', 'idade', 'sintomas', 'blends'));

        return $pdf->setPaper('a4')->stream('Consulta.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$consulta = Consulta::find($id)) {
            return redirect()->back();
        }

        $sintomas = ConsultaSintoma::query()->where('consulta_id', $consulta->id)->get();
        //dd($sintomas);

        $anoAtual = date('Y');
        $year = date('Y', strtotime($consulta->dataDeNascimento));
        $idade = $anoAtual - $year;


        if ($consulta->peso != '' && $consulta->altura != '') {
            $imc = ($consulta->peso / ($consulta->altura * $consulta->altura));
            $imc = number_format($imc, 2);

            if ($imc < '18.5') {
                $imc = $imc . " - Magreza";
            }
            if ($imc > '18.5' && $imc <= '24.9') {
                $imc = $imc . " - Normal";
            }
            if ($imc >= '24.9' && $imc <= '30') {
                $imc = $imc . " - Sobrepeso";
            }
            if ($imc > '30') {
                $imc = $imc . " - Obesidade";
            }
        } else {
            $imc = 'Não foi possível calcular o imc';
        }

        if ($consulta->sexo == 'feminino') {
            $consulta->sexo = 'Feminino';
        }
        if ($consulta->sexo == 'masculino') {
            $consulta->sexo = 'Masculino';
        }

        if ($consulta->gravidezAmamentacao == 'amamentando') {
            $consulta->gravidezAmamentacao = 'Amamentando';
        }
        if ($consulta->gravidezAmamentacao == 'gravida') {
            $consulta->gravidezAmamentacao = 'Grávida';
        }
        if ($consulta->gravidezAmamentacao == 'gravidaeamamentando') {
            $consulta->gravidezAmamentacao = 'Grávida e Amamentando';
        }
        if ($consulta->gravidezAmamentacao == 'nenhumadasopcoes') {
            $consulta->gravidezAmamentacao = 'Nenhuma das Opções';
        }

        if ($consulta->intoleranciaAlimentar == 'intoleranciaLactose') {
            $consulta->intoleranciaAlimentar = 'Intolerância a Lactose';
        }
        if ($consulta->intoleranciaAlimentar == 'intoleranciaGluten') {
            $consulta->intoleranciaAlimentar = 'Intolerância a Glúten';
        }
        if ($consulta->intoleranciaAlimentar == 'nao') {
            $consulta->intoleranciaAlimentar = 'Nenhuma intolerância alimentar';
        }

        if ($consulta->tempoDorCronica == '6-12') {
            $consulta->tempoDorCronica = 'De seis meses a um ano';
        }
        if ($consulta->tempoDorCronica == '12-24') {
            $consulta->tempoDorCronica = 'Entre um e dois anos';
        }
        if ($consulta->tempoDorCronica == '+24') {
            $consulta->tempoDorCronica = 'Mais de dois anos';
        }
        if ($consulta->tempoDorCronica == 'nenhumadasopcoes') {
            $consulta->tempoDorCronica = 'Não possui dor crônica';
        }

        if ($consulta->habitosAlimentares == 'bom') {
            $consulta->habitosAlimentares = 'Me alimento com frutas, verduras, proteínas e carboidratos de forma regrada';
        }
        if ($consulta->habitosAlimentares == 'medio') {
            $consulta->habitosAlimentares = 'Me alimento de forma balanceada, com frutas, verduras, proteínas, carboidratos e gorduras, em maiores ou menores quantidades';
        }
        if ($consulta->habitosAlimentares == 'ruim') {
            $consulta->habitosAlimentares = 'Me alimento com grandes quantidades de carboidratos e gorduras, e dificilmente frutas e saladas';
        }

        if ($consulta->praticaExercicioFisico == 'nao') {
            $consulta->praticaExercicioFisico = 'Não pratico exercícios físicos';
        }
        if ($consulta->praticaExercicioFisico == 'pouco') {
            $consulta->praticaExercicioFisico = ' Sim, uma vez por semana';
        }
        if ($consulta->praticaExercicioFisico == 'medio') {
            $consulta->praticaExercicioFisico = 'Sim, de duas a três vezes por semana';
        }
        if ($consulta->praticaExercicioFisico == 'sempre') {
            $consulta->praticaExercicioFisico = ' Sim, quatro vezes ou mais por semana';
        }

        if ($consulta->consumoDeAgua == 'ruim') {
            $consulta->consumoDeAgua = 'Menos de 1 litro por dia';
        }
        if ($consulta->consumoDeAgua == 'medio') {
            $consulta->consumoDeAgua = 'Entre 1 e 2 litros por dia';
        }
        if ($consulta->consumoDeAgua == 'bom') {
            $consulta->consumoDeAgua = 'Entre 2 e 3 litros por dia';
        }
        if ($consulta->consumoDeAgua == 'excelente') {
            $consulta->consumoDeAgua = '3 litros ou mais';
        }

        if ($consulta->usoDeMedicamento == 'sim') {
            $consulta->usoDeMedicamento = 'Sim';
        }
        if ($consulta->usoDeMedicamento == 'nao') {
            $consulta->usoDeMedicamento = 'Não';
        }

        if ($consulta->consumoDeCha == 'sim') {
            $consulta->consumoDeCha = 'Sim';
        }
        if ($consulta->consumoDeCha == 'nao') {
            $consulta->consumoDeCha = 'Não';
        }

        if ($consulta->fatoresDoCha == 'amargo') {
            $consulta->fatoresDoCha = 'Sabor - Prefiro sabores mais amargos';
        }
        if ($consulta->fatoresDoCha == 'doce') {
            $consulta->fatoresDoCha = 'Sabor - Prefiro sabores mais adocicados';
        }
        if ($consulta->fatoresDoCha == 'pratico') {
            $consulta->fatoresDoCha = 'Praticidade - Prefiro os chás de "sachês" pela praticidade que proporcionam';
        }
        if ($consulta->fatoresDoCha == 'naopratico') {
            $consulta->fatoresDoCha = 'Praticidade - Não é tão relevante, gosto de preparar o chá utilizando, muitas vezes, as ervas secas ou recém colhidas';
        }
        if ($consulta->fatoresDoCha == 'nenhumadasopcoes') {
            $consulta->fatoresDoCha = 'Não';
        }

        $blends = Blend::query()->where('consulta_id', $consulta->id)->get();

        return view('admin.consultas.show', compact('consulta', 'idade', 'imc', 'sintomas', 'blends'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$consulta = Consulta::find($id)) {
            return redirect()->back();
        }
        $blends = Blend::where('consulta_id', $consulta->id)->get();
     //   dd($blends);

        if($blends){
            foreach($blends as $blend){
                $blend->delete();
            }
        }

        $consultaSintomas = ConsultaSintoma::where('consulta_id', $consulta->id)->get();
      // dd($consultaSintomas);

        if($consultaSintomas){
            foreach($consultaSintomas as $consultaSintoma){
                $consultaSintoma->delete();
            }
        }

        $consulta->delete();
        return redirect()->back();
    }
}
