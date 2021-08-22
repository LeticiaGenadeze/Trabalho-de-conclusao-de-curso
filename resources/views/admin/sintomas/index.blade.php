@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Lista de Sintomas</h3>
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
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sintomas as $sintoma)
                                <tr>
                                    <td>{{$sintoma->id}}</td>
                                    <td class="text-bold-500">{{$sintoma->name}}</td>
                                    <td>{{$sintoma->description}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-info me-1" href="{{route('admin.sintomas.edit', $sintoma->id)}}">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form class="form form-horizontal" action="{{route('admin.sintomas.destroy', $sintoma->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>Nenhum Sintoma Encontrato!</tr>
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