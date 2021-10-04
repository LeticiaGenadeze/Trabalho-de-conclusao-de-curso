@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="GET" action="">
                    <div class="form-group">
                        <p class="pt-4">Questionário completo!</p>
                        <p>Aguarde!</p>
                        <p>Estamos personalizando o seu blend!</p>
                        <img class="img-fluid" src="{{ asset('themes/site/image/anima.gif') }}">                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  setTimeout(function () {
    window.open('<?php echo route('site.step20', $consulta->id) ?>', '_self');
}, 5000);
</script>

<!--<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-perguntas p-5 shadow-lg text-center">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <p class="py-4">Está quase {{$consulta->nome}}, precisamos apenas dos dados abaixo para criarmos sua conta.</p>
                        <input type="hidden" name="consulta_id" value="{{$consulta->id}}">
                        <input type="hidden" name="name" value="{{$consulta->nome}}">
                        <input type="text" name="email" class="form-control mb-2" id="basicInput" placeholder="Digite seu e-mail">
                        <input type="password" name="password" class="form-control mb-2" id="basicInput" placeholder="Digite sua senha">
                    </div>
                    <input type="submit" class="btn btn-sm btn-continuar m-4" value="Continuar">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>-->

@endsection