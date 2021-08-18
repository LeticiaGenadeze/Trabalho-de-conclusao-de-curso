@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Lista de Clientes</h3>
</div>

<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                    <th>Criado em</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td class="text-bold-500">{{$cliente->name}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td class="text-bold-500"></td>
                                    <td>{{$cliente->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.clientes.show', $cliente->id)}}">Ver</a>
                                        <a href="{{route('admin.clientes.edit', $cliente->id)}}">Editar</a>             
                                        @if($cliente->id != 1)                         
                                        <form class="form form-horizontal" action="{{route('admin.clientes.destroy', $cliente->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Deletar</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>Nenhum Cliente Encontrato!</tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hoverable rows end -->

@endsection