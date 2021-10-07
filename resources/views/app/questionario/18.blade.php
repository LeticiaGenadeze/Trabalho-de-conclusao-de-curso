@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step19" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Quando você pensa em consumir algum tipo de chá, você considera algum desses fatores?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->fatoresDoCha == 'amargo') checked @endif 
                                class="form-check-input" type="radio" name="fatoresDoCha" id="flexRadioDefault1" value="amargo" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sabor - Prefiro sabores mais amargos
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->fatoresDoCha == 'doce') checked @endif
                                class="form-check-input" type="radio" name="fatoresDoCha" id="flexRadioDefault1" value="doce" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sabor - Prefiro sabores mais adocicados
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->fatoresDoCha == 'pratico') checked @endif
                                class="form-check-input" type="radio" name="fatoresDoCha" id="flexRadioDefault1" value="pratico" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Praticidade - Prefiro os chás de "sachês" pela praticidade que proporcionam
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->fatoresDoCha == 'naopratico') checked @endif
                                class="form-check-input" type="radio" name="fatoresDoCha" id="flexRadioDefault1" value="naopratico" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Praticidade - Não é tão relevante, gosto de preparar o chá utilizando, muitas vezes, as ervas secas ou recém colhidas
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->fatoresDoCha == 'nenhumadasopcoes') checked @endif
                                class="form-check-input" type="radio" name="fatoresDoCha" id="flexRadioDefault1" value="nenhumadasopcoes" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nenhuma das opções
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection