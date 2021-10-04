@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Lista de Consultas Pendentes</h3>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultas as $consulta)
                                <tr>
                                    <td>{{$consulta->id}}</td>
                                    <td class="text-bold-500">{{$consulta->nome}}</td>
                                    <td>{{$consulta->email}}</td>
                                    <td class="text-bold-500"></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-success me-1" href="{{route('admin.consultas.show', $consulta->id)}}"
                                                ><i class="bi bi-eye"></i>
                                            </a>                                          
                                            <form class="form form-horizontal" action="{{route('admin.consultas.destroy', $consulta->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>                                         
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>Nenhuma Consulta Encontrada!</tr>
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