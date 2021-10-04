@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Lista de Características</h3>
    <a  href="{{route('admin.caracteristicas.create')}}">Cadastrar Característica</a>
</div>


<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <!-- table hover -->
                    <div class="table-responsive">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th> 
                                    <th>Slug</th>
                                    <th>Tipo</th>                              
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($caracteristicas as $caracteristica)
                                <tr>
                                    <td>{{$caracteristica->id}}</td>
                                    <td class="text-bold-500">{{$caracteristica->name}}</td>
                                    <td class="text-bold-500">{{$caracteristica->description}}</td>
                                    <td class="text-bold-500">{{$caracteristica->type}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-success me-1" href="{{route('admin.caracteristicas.show', $caracteristica->id)}}">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-info me-1" href="{{route('admin.caracteristicas.edit', $caracteristica->id)}}">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form class="form form-horizontal" action="{{route('admin.caracteristicas.destroy', $caracteristica->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>Nenhuma Característica Encontrada!</tr>
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