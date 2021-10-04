@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
            <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step7" name="nextStep">
                      <div class="form-group">
                        <p class="py-4">Qual é sua altura?</p>
                        <input type="text" class="form-control input-largura-menor" id="basicInput" placeholder="Digite sua altura" name="altura" value="{{$consulta->altura}}">
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar" required>
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection