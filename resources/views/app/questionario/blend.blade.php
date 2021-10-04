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
                    <div class="col-md-4">
                        <div class="row d-flex align-items-center justify-content-center mb-4">
                            <div class="col-md-6">
                                <div class="card_image shadow p-3 rounded">
                                    <img class="img-fluid" src="{{asset('storage')}}/chas/{{$cha->cha->cover}}">
                                </div>
                            </div>
                            <div class="col-md-6 text-start">
                                <p>{{$cha->cha->name}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Nenhum Chá Encontrado!</p>
                    @endforelse
                </div>
                <div class="row mb-4 d-flex align-items-center justify-content-center">
                    <a class="btn btn-lg btn-continuar m-3" target="_blank" style="width: 200px;" href="https://api.whatsapp.com/send?phone=5549991494572&text=Ol%C3%A1!%0AMeu%20nome%20%C3%A9%20{{ $consulta->nome }}.%0AGostaria%20de%20fazer%20o%20pedido%20do%20blend%20de%20ch%C3%A1s%20com%20o%20c%C3%B3digo%20{{ $consulta->id }}.%0AObrigado!">
                        Faça seu pedido!
                    </a>
                </div>             
            </div>
        </div>
    </div>
</div>

<style>
    .card_image {
        transition: 0.4s;
        float: left;
        min-height: 100px;
    }

    .card_image:hover {
        transform: scale(0.9, 0.9);
        box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.15);
    }
</style>

@endsection