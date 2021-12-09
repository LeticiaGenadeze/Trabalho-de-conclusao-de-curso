@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <h3>Lista de Consultas Efetivadas</h3>
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
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>Data da Consulta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultas as $consulta)
                                <tr>
                                    <td>{{$consulta->id}}</td>
                                    <td class="text-bold-500">{{$consulta->nome}}</td>
                                    <td class="text-bold-500">{{ \Carbon\Carbon::parse($consulta->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-sm btn-success me-1" href="{{route('admin.consultas.show', $consulta->id)}}">
                                                <i class="bi bi-eye"></i>
                                            </a>                                          
                                            <form class="form form-horizontal" action="{{route('admin.consultas.destroy', $consulta->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-sm btn-danger me-1">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                            <a class="btn btn-sm btn-info" target="blank" href="{{route('admin.consultas.pdf', $consulta->id)}}">
                                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                            </a>                                            
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