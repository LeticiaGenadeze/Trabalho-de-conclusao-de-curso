@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step12" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Em caso de dor crônica (dor que se repete por meses ou anos), há quanto tempo sente?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->tempoDorCronica == '6-12') checked @endif 
                                class="form-check-input" type="radio" name="tempoDorCronica" id="flexRadioDefault1" value="6-12" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    De seis meses a um ano
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->tempoDorCronica == '12-24') checked @endif 
                                class="form-check-input" type="radio" name="tempoDorCronica" id="flexRadioDefault1" value="12-24">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Entre um e dois anos
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->tempoDorCronica == '+24') checked @endif
                                 class="form-check-input" type="radio" name="tempoDorCronica" id="flexRadioDefault1" value="+24">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mais de dois anos
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->tempoDorCronica == 'nenhumadasopcoes') checked @endif
                                class="form-check-input" type="radio" name="tempoDorCronica" id="flexRadioDefault1" value="nenhumadasopcoes">
                                <label class="form-check-label" for="flexRadioDefault1">
                                   Nenhuma das Opções
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection