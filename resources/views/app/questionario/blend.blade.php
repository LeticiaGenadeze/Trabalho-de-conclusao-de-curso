@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card-perguntas card-alimentacao py-3 px-5 shadow-lg text-center">
                <h2 class="text-grey mt-2">Feito para você, {{ $consulta->nome }}!</h2>
                <p class="pb-3">Montamos a melhor combinação de chás para seu blend de acordo com o seu perfil.</p>
                <div class="row">
                    @forelse($blendPersonalizado as $cha)
                    <div class="col-md-4 mb-3">
                        <div class="card_image shadow flip">
                            <div class="front">
                                <div class="row h-100">
                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                        <img class="img-fluid" src="{{asset('storage')}}/chas/{{$cha->cha->cover}}">
                                    </div>
                                    <div class="col-md-6 text-start d-flex align-items-center justify-content-center">
                                        <p>{{$cha->cha->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="back p-2">
                                <div class="row h-100 d-flex justify-content-center align-items-center">
                                    <div class="detalhesCha">
                                        <p>Nome Científico: {{$cha->cha->nomeCientifico}}</p>
                                        <p>Indicações: {{$cha->cha->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Nenhum Chá Encontrado!</p>
                    @endforelse
                </div>
                <div class="row mb-4 d-flex align-items-center justify-content-center">
                    <a class="btn btn-lg btn-continuar m-3" target="_blank" style="width: 200px;" 
                    href="https://api.whatsapp.com/send?phone=5549991494572&text=Ol%C3%A1!%0AMeu%20nome%20%C3%A9%20{{ $consulta->nome }}
                    .%0AGostaria%20de%20fazer%20o%20pedido%20do%20blend%20de%20ch%C3%A1s%20com%20o%20c%C3%B3digo%20{{ $consulta->id }}.
                    %0AObrigado!">
                        Faça seu pedido!
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .detalhesCha p {
        font-size: 11px !important;
        text-align: justify;
        margin-top: 5px;
        margin-bottom: 0px;
        line-height: 13px;
    }

    .card_image {
        transition: 0.4s;
        float: left;
        min-height: 130px;
        border-radius: 10px;
    }

    .card_image:hover {
        transform: scale(0.9, 0.9);
        box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.15);
    }

    .flip {
        position: relative;
        display: inline-block;
        width: 100%;
    }


    .flip>.front {
        transform: rotateY(0deg);
        display: block;
        transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transition-duration: 0.5s;
        transition-property: transform, opacity;
        display: block;
        color: black;
        width: inherit;
        background-size: cover !important;
        background-position: center !important;
        padding: 1em 2em;
        background-color: white;
        border-radius: 10px;
        height: 130px;
    }

    .flip>.back {
        position: absolute;
        opacity: 0;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        transform: rotateY(-180deg);
        display: block;
        transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transition-duration: 0.5s;
        transition-property: transform, opacity;
        color: black;
        width: inherit;
        background-size: cover !important;
        background-position: center !important;
        padding: 1em 2em;
        background-color: #eeeef8;
        border-radius: 10px;
        height: 130px;
    }

    .flip:hover>.front {
        transform: rotateY(180deg);
    }

    .flip:hover>.back {
        opacity: 1;
        transform: rotateY(0deg);
    }

    .flip.flip-vertical>.back {
        transform: rotateX(-180deg);
    }

    .flip.flip-vertical:hover>.front {
        transform: rotateX(180deg);
    }

    .flip.flip-vertical:hover>.back {
        transform: rotateX(0deg);
    }
</style>

@endsection