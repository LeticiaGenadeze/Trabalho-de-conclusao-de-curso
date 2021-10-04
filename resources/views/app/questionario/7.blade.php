@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.updateSexo', $consulta->id)}}">
                    @csrf
                    <!--<input type="hidden" value="step8" name="nextStep">-->
                    <div class="form-group">
                        <p class="py-4">Com qual sexo você nasceu?</p>
                        <div class="d-flex align-itens-center justify-content-center">
                            <div class="form-check">
                                <input 
                                @if ($consulta->sexo == 'feminino') checked @endif
                                class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="feminino" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Feminino
                                </label>
                            </div>
                            <div class="form-check ms-3">
                                <input 
                                @if ($consulta->sexo == 'masculino') checked @endif
                                class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="masculino">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Masculino
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection