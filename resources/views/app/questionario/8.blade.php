@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step9" name="nextStep">
                    <div class="form-group">
                        <p class="py-4">Você está grávida e amamentando?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->gravidezAmamentacao == 'gravida') checked @endif
                                class="form-check-input" type="radio" name="gravidezAmamentacao" id="flexRadioDefault1" value="gravida" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim, estou grávida
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->gravidezAmamentacao == 'amamentando') checked @endif
                                class="form-check-input" type="radio" name="gravidezAmamentacao" id="flexRadioDefault2" value="amamentando">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Sim, estou amamentando
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->gravidezAmamentacao == 'gravidaeamamentando') checked @endif
                                class="form-check-input" type="radio" name="gravidezAmamentacao" id="flexRadioDefault1" value="gravidaeamamentando">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim, estou grávida e amamentando
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->gravidezAmamentacao == 'nenhumadasopcoes') checked @endif  
                                class="form-check-input" type="radio" name="gravidezAmamentacao" id="flexRadioDefault2" value="nenhumadasopcoes">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Nenhuma das Opções
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar" required>
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection