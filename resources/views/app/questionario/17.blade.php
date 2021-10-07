@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{route('site.consulta.update', $consulta->id)}}">
                    @csrf
                    <input type="hidden" value="step18" name="nextStep">
                    <div class="form-group">
                        <p class="px-4 pb-4">Você já faz o uso de algum tipo de chá?</p>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->consumoDeCha == 'sim') checked @endif 
                                class="form-check-input" type="radio" name="consumoDeCha" id="flexRadioDefault1" value="sim" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sim
                                </label>
                            </div>
                        </div>
                        <div class="border px-3 radius20 mb-2">
                            <div class="form-check">
                                <input @if ($consulta->consumoDeCha == 'nao') checked @endif 
                                class="form-check-input" type="radio" name="consumoDeCha" id="flexRadioDefault1" value="nao">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Não
                                </label>
                            </div>
                        </div>           
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>

@endsection