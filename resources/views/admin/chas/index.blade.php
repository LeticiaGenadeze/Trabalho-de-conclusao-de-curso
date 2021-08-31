@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Lista de Chás</h3>
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
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($chas as $cha)
                                <tr>
                                    <td> <img src="{{asset('storage')}}/chas/{{$cha->cover}}" width="80"></td>
                                    <td class="text-bold-500">{{$cha->name}}</td>
                                    <td>{{$cha->description}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-primary me-1" href="{{route('admin.chas.caracteristica', $cha->id)}}">
                                                <i class="bi bi-list-check"></i>
                                            </a>
                                            <a class="btn btn-sm btn-success me-1" href="{{route('admin.chas.show', $cha->id)}}">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-info me-1" href="{{route('admin.chas.edit', $cha->id)}}">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form class="form form-horizontal me-1" action="{{route('admin.chas.destroy', $cha->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>Nenhum Chá Encontrato!</tr>
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