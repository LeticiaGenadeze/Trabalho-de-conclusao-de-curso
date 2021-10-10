@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Chá {{$cha->name}}</h3>
</div>

<div class="row">
    <div class="col-md-3">
        <img class="img-fluid" src="{{asset('storage')}}/chas/{{$cha->cover}}">
    </div>
    <div class="col-md-9">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$cha->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome Científico</th>
                    <td>{{$cha->nomeCientifico}}</td>
                </tr>
                <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$cha->description}}</td>
                </tr>
                <tr>
                    <th scope="row">Criado em</th>
                    <td>{{ \Carbon\Carbon::parse($cha->created_at)->format('d/m/Y')}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection