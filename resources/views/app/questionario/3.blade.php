@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="GET" action="{{route('site.step4', $consulta->id)}}">
                    <div class="form-group">
                    <h2 class="text-grey">Prazer {{ $consulta->nome }}!</h2>
                        <p class="pt-4 fw-normal px-5">Para nos conhecermos melhor, faremos algumas perguntas sobre você e seu estilo de vida. Assim, conseguiremos oferecer a melhor combinação para seu blend de chás!</p>
                        <p class="fw-normal">Isso vai levar menos de 5 minutos.</p> 
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection