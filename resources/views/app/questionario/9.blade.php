@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.addSintoma', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step10" name="nextStep">
                    <div class="form-group">
                        <p class="py-4">Assinale os sintomas que você apresenta, se for o caso:</p>
                        <ul class="list-unstyled mb-0">
                            <li class="d-inline-block me-2 mb-1">
                                @forelse($sintomas as $sintoma)
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" class="form-check-input" name="sintoma[]" value="{{$sintoma->id}}">
                                        <label for="checkbox1">{{$sintoma->name}}</label>
                                    </div>
                                </div>
                                @empty
                                <p>Nenhuma Sintoma Encontrada!</p>
                                @endforelse
                            </li>
                        </ul>
                     

                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar" required>
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection