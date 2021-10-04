<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blend;
use App\Models\Caracteristica;
use App\Models\Cha;
use App\Models\ChaCaracteristica;
use App\Models\Consulta;
use App\Models\ConsultaSintoma;
use App\Models\Sintoma;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $consulta = new Consulta();
        $consulta['nome'] = $request['name'];
        if ($consulta->save()) {
            setcookie("consulta", $consulta->id, (time() + 24 * 3600));

            return redirect()->route('site.step3', $consulta);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $consulta = Consulta::find($id);
        $data = $request->all();

        //dd($data);

        $next = 'site.' . $data['nextStep'];
        if ($consulta->update($data)) {
            return redirect()->route($next, $consulta);
        }
    }

    public function updateSexo(Request $request, $id)
    {

        $consulta = Consulta::find($id);
        $data = $request->all();

        if ($data['sexo'] == 'feminino') {
            $next = 'site.step8';
        }

        if ($data['sexo'] == 'masculino') {
            $next = 'site.step9';
        }

        if ($consulta->update($data)) {
            return redirect()->route($next, $consulta);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addSintoma(Request $request, $idConsulta)
    {
        $sintomas  = $request['sintoma'];

        $SistomasCadastrados = ConsultaSintoma::query()->where('consulta_id', $idConsulta)->pluck('sintoma_id')->toArray();
        // dd($SistomasCadastrados);
        //  dd($sintomas);
        if ($sintomas) {
            //   $qtd = count($sintomas);

            foreach ($sintomas as $sintoma) {
                if (!in_array($sintoma, $SistomasCadastrados)) {
                    $sintomaConsulta = new ConsultaSintoma();
                    $sintomaConsulta['consulta_id'] = $idConsulta;
                    $sintomaConsulta['sintoma_id'] = $sintoma;
                    $sintomaConsulta->save();
                }
            }

            //     for ($i = 0; $i < $qtd; $i++) {
            //         $idSintoma = $sintomas[$i];
            //         $sintomaConsulta = new ConsultaSintoma();
            //         $sintomaConsulta['consulta_id'] = $idConsulta;
            //        $sintomaConsulta['sintoma_id'] = $idSintoma;

            //        $sintomaConsulta->save();
            //    }

            return redirect()->route('site.step10', $idConsulta);
        }

        if (!$sintomas) {
            return redirect()->route('site.step10', $idConsulta);
        }
    }

    public function step1()
    {
        if (isset($_COOKIE['consulta'])) {
            $id = $_COOKIE["consulta"];
            if ($id) {
                $consulta = Consulta::find($id);
                return view('app.questionario.1', compact('consulta'));
            }
        }

        return view('app.questionario.1');
    }

    public function step2()
    {
        return view('app.questionario.2');
    }

    public function step3($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.3', compact('consulta'));
    }

    public function step4($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.4', compact('consulta'));
    }

    public function step5($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.5', compact('consulta'));
    }

    public function step6($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.6', compact('consulta'));
    }

    public function step7($id)
    {

        $consulta = Consulta::find($id);
        return view('app.questionario.7', compact('consulta'));
    }

    public function step8($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.8', compact('consulta'));
    }

    public function step9($id)
    {
        $consulta = Consulta::find($id);
        $sintomas = Sintoma::all();
        return view('app.questionario.9', compact('consulta', 'sintomas'));
    }

    public function step10($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.10', compact('consulta'));
    }

    public function step11($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.11', compact('consulta'));
    }

    public function step12($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.12', compact('consulta'));
    }

    public function step13($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.13', compact('consulta'));
    }

    public function step14($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.14', compact('consulta'));
    }
    public function step15($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.15', compact('consulta'));
    }
    public function step16($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.16', compact('consulta'));
    }
    public function step17($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.17', compact('consulta'));
    }
    public function step18($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.18', compact('consulta'));
    }
    public function step19($id)
    {
        $consulta = Consulta::find($id);
        return view('app.questionario.19', compact('consulta'));
    }
    public function step20($id)
    {
        $consulta = Consulta::find($id);
        $tags = [];

        //valida amamentacao e gravidez, gravidez e lactantes (gravida, amamentando, gravidaeamamentando, nenhumadasopcoes)
        if ($consulta->gravidezAmamentacao == 'gravida') {
            array_push($tags, 'gravidez');
        }
        if ($consulta->gravidezAmamentacao == 'amamentando') {
            array_push($tags, 'lactante');
        }
        if ($consulta->gravidezAmamentacao == 'gravidaeamamentando') {
            array_push($tags, 'gravidez');
            array_push($tags, 'lactante');
        }

        //validar se existem sintomas, se existirem adicionar  chá
        $sintomaDaConsulta = [];

        if ($consulta->sintomas) {

            foreach ($consulta->sintomas as $sintoma) {
                array_push($tags, $sintoma->sintoma->description);
                array_push($sintomaDaConsulta, $sintoma->sintoma->description);

                /* if($sintoma->sintoma->description == 'ansiedade'){
                    array_push( $tags, 'ansiedade'); 
                };*/
            }
        }

        //Validar dor cronica, se existirem add chá
        if ($consulta->tempoDorCronica == '6-12' || $consulta->tempoDorCronica == '12-24' || $consulta->tempoDorCronica == '+24') {
            array_push($tags, 'dorCronica');
        }

        //Validar intolerancia alimentar, se existirem add chá
        if ($consulta->intoleranciaAlimentar == 'intoleranciaLactose' || $consulta->intoleranciaAlimentar == 'intoleranciaGluten') {
            array_push($tags, 'intoleranciaAlimentar');
        }

        //Validar alimentacao, se existirem adicionar chá
        if ($consulta->habitosAlimentares == 'medio' || $consulta->habitosAlimentares == 'ruim') {
            array_push($tags, 'digestivo');
        }

        //validar exercicio fisico, se não faz exercicio add chá 
        if ($consulta->praticaExercicioFisico == 'nao' || $consulta->praticaExercicioFisico == 'pouco') {
            array_push($tags, 'calmante');
        }

        //validar consumo de agua, se beber menos de 1 l., sugerir cha diuretico
        if ($consulta->consumoDeAgua == 'ruim' || $consulta->consumoDeAgua == 'medio') {
            array_push($tags, 'diuretico');
        }

        //validar sabor e praticidade
        if ($consulta->fatoresDoCha == 'amargo') {
            array_push($tags, 'amargo');
        }
        if ($consulta->fatoresDoCha == 'doce') {
            array_push($tags, 'doce');
        }
        if ($consulta->fatoresDoCha == 'pratico') {
            array_push($tags, 'pratico');
        }
        if ($consulta->fatoresDoCha == 'naopratico') {
            array_push($tags, 'naopratico');
        }

        $caracteristicasBoas =  Caracteristica::query()->whereIn('description', $tags)->where('type', 'beneficio')->pluck('description', 'id')->toArray();

        $caracteristicasRuins =  Caracteristica::query()->whereIn('description', $tags)->where('type', 'maleficio')->pluck('description', 'id')->toArray();

        $caracteristicasBoasCha = ChaCaracteristica::query()->whereIn('caracteristica_id', array_keys($caracteristicasBoas))->distinct('cha_id')->pluck('cha_id', 'cha_id')->toArray();

        $caracteristicasRuinsCha = ChaCaracteristica::query()->whereIn('caracteristica_id', array_keys($caracteristicasRuins))->distinct('cha_id')->pluck('cha_id', 'cha_id')->toArray();

        $chas = Cha::query()->whereIn('id', $caracteristicasBoasCha)->whereNotIn('id', $caracteristicasRuinsCha)->paginate('6');

        $chas =  $chas->sortBy(function ($item) {
            return rand();
        });

        $consulta->update(array('status' => 1));

        $blends = Blend::query()->where('consulta_id', $consulta->id)->get();
        if ($blends) {
            foreach ($blends as $blend) {
                $blend->delete();
            }
        }

        foreach ($chas as $cha) {
            $blend =  new Blend();
            $blend['consulta_id'] = $consulta->id;
            $blend['cha_id'] = $cha->id;

            $blend->save();
        }

        return redirect()->route('site.blend', $consulta->id);

        //return view('app.questionario.20', compact('consulta', 'blendPersonalizado'));
    }

    public function blend($id)
    {
        $blendPersonalizado = Blend::query()->where('consulta_id', $id)->get();
        $consulta = Consulta::find($id);
        return view('app.questionario.blend', compact('consulta','blendPersonalizado'));
    }
}
