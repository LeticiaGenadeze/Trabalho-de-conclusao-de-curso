@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step17" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Você faz uso de medicamentos para algum problema de saúde?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->usoDeMedicamento == 'sim') checked @endif 
                                class="form-check-input" type="radio" name="usoDeMedicamento" id="flexRadioDefault1" value="sim" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->usoDeMedicamento == 'nao') checked @endif 
                                class="form-check-input" type="radio" name="usoDeMedicamento" id="flexRadioDefault1" value="nao">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Não
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar" required>
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection