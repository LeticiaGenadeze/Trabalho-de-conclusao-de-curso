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
                                    <th></th>
                                    <th>Nome</th>
                                    <th>E-mail</th>                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td class="text-bold-500">{{$cliente->name}}</td>
                                    <td>{{$cliente->email}}</td>                                    
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-sm btn-success me-1" href="{{route('admin.clientes.show', $cliente->id)}}"
                                                ><i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-info me-1" href="{{route('admin.clientes.edit', $cliente->id)}}">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            @if($cliente->id != 1)
                                            <form class="form form-horizontal" action="{{route('admin.clientes.destroy', $cliente->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
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