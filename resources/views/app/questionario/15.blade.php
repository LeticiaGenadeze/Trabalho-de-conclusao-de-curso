@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-6">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step16" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Como está o seu consumo de água diário?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->consumoDeAgua == 'ruim') checked @endif 
                                class="form-check-input" type="radio" name="consumoDeAgua" id="flexRadioDefault1" value="ruim" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                Menos de 1 litro por dia
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->consumoDeAgua == 'medio') checked @endif 
                                class="form-check-input" type="radio" name="consumoDeAgua" id="flexRadioDefault1" value="medio">
                                <label class="form-check-label" for="flexRadioDefault1">
                                Entre 1 e 2 litros por dia
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->consumoDeAgua == 'bom') checked @endif 
                                class="form-check-input" type="radio" name="consumoDeAgua" id="flexRadioDefault1" value="bom">
                                <label class="form-check-label" for="flexRadioDefault1">
                                Entre 2 e 3 litros por dia
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->consumoDeAgua == 'excelente') checked @endif 
                                class="form-check-input" type="radio" name="consumoDeAgua" id="flexRadioDefault1" value="excelente">
                                <label class="form-check-label" for="flexRadioDefault1">
                                3 litros ou mais
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 77%" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection