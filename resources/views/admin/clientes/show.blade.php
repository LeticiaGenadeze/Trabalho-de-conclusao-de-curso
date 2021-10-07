@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Cliente</h3>
</div>


<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Criado em:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$cliente->id}}</th>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->email}}</td>
                <td></td>
                <td>{{$cliente->created_at}}</td>
            </tr>           
        </tbody>
    </table>
</div>




@endsection