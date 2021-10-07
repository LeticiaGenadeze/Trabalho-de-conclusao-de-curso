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

@endsection