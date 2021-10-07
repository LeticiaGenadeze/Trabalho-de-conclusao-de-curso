@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-6">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step15" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Você pratica exercícios físicos?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->praticaExercicioFisico == 'nao') checked @endif  
                                class="form-check-input" type="radio" name="praticaExercicioFisico" id="flexRadioDefault1" value="nao" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Não pratico exercício físico
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->praticaExercicioFisico == 'pouco') checked @endif  
                                class="form-check-input" type="radio" name="praticaExercicioFisico" id="flexRadioDefault1" value="pouco">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim, uma vez por semana
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->praticaExercicioFisico == 'medio') checked @endif 
                                class="form-check-input" type="radio" name="praticaExercicioFisico" id="flexRadioDefault1" value="medio">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim, de duas a três vezes por semana
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->praticaExercicioFisico == 'sempre') checked @endif 
                                class="form-check-input" type="radio" name="praticaExercicioFisico" id="flexRadioDefault1" value="sempre">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim, quatro vezes ou mais por semana
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection