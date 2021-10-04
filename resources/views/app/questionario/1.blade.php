@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="min-vh-90">
            <div class="col-md-6 offset-md-3">
                @isset($consulta)
                <div class="card-perguntas p-5 shadow-lg text-center">
                    <h2 class="text-grey mt-4">Que bom que você voltou, {{$consulta->nome}}!!</h2>
                    <p class="py-4 fw-normal">Vamos continuar a personalização do seu blend de chás?</p>
                    <form method="GET" action="{{route('site.step4', $consulta->id)}}">
                        <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar de onde parei">
                    </form>
                    <a href="{{route('site.step2')}}" class="btn btn-sm btn-continuar mb-4">Iniciar nova Consulta</a>
                </div>
                @endisset

                <?php
                if (!isset($consulta)) { ?>
                    <div class="card-perguntas p-5 shadow-lg text-center">
                        <h2 class="text-grey mt-4">Olá!!<br>Seja Bem Vindo!</h2>
                        <p class="py-4 fw-normal">Vamos criar o seu incrível blend de chás juntos?</p>
                        <a href="{{route('site.step2')}}" class="btn btn-sm btn-continuar mb-4">Continuar</a>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>

@endsection