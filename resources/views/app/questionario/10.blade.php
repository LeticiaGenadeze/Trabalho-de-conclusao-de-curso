@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step11" name="nextStep">
                    <div class="form-group">
                        <p class="py-4">Em caso de dor inflamatória (ocasionada por algum trauma ou impacto recente), você sabe o que ocasionou?</p>
                        <input type="text" class="form-control" id="basicInput" placeholder="Digite sua resposta" name="dorInflamatoria"  value="{{$consulta->dorInflamatoria}}" required>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection