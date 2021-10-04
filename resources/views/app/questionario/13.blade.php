@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas card-alimentacao py-3 px-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step14" name="nextStep">
                    <div class="form-group">
                        <p class="py-4">Como são seus hábitos alimentares?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->habitosAlimentares == 'bom') checked @endif  
                                class="form-check-input" type="radio" name="habitosAlimentares" id="flexRadioDefault1" value="bom" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Me alimento com frutas, verduras, proteínas e carboidratos de forma regrada
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->habitosAlimentares == 'medio') checked @endif  
                                 class="form-check-input" type="radio" name="habitosAlimentares" id="flexRadioDefault1" value="medio">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Me alimento de forma balanceada, com frutas, verduras, proteínas, carboidratos e gorduras, em maiores ou menores quantidades
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->habitosAlimentares == 'ruim') checked @endif  
                                 class="form-check-input" type="radio" name="habitosAlimentares" id="flexRadioDefault1" value="ruim">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Me alimento com grandes quantidades de carboidratos e gorduras, e dificilmente frutas e saladas
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection